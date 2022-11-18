<?php
class Registrations extends Controller
{

  public function __construct()
  {
    $this->registrationsModel = $this->model('Registration');
  }

  public function index()
  {
    // Load the view
    $this->view('registrations/index');
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $this->view('registrations/login');
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
      try {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Check if the user exists
        $user = $this->registrationsModel->getUserByUsername($_POST['username']);

        // Check if $user is empty
        if (empty($user)) {
          // Show the error message
          $data = ['error' =>  'Gebruikersnaam of wachtwoord is onjuist'];
          $this->view('registrations/login', $data);
        } else {
          // Check if the password is correct
          if (password_verify($_POST['password'], $user->password)) {
            // Set the session
            $_SESSION['user_id'] = $user->id;

            // Get the role
            $role = $this->registrationsModel->getRole();

            // Check if the role is admin
            if ($role->role == 'admin') {
              // Show success message and redirect to the index page after 3 seconds
              $data = ['success' => 'U bent ingelogd als admin :)'];
              $this->view('registrations/login', $data);
              header('Refresh: 3; url=' . URLROOT . '/index');
            } else {
              // Show success message and redirect to the index page after 3 seconds
              $data = ['success' => 'U bent ingelogd :)'];
              $this->view('registrations/login', $data);
              header('Refresh: 3; url=' . URLROOT . '/index');
            }
          } else {
            // Show the error message
            $data = ['error' =>  'Gebruikersnaam of wachtwoord is onjuist'];
            $this->view('registrations/login', $data);
          }
        }
      } catch (PDOException $e) {
        // Show the error message
        echo 'Er is iets misgegaan tijdens het inloggen';
        header('Refresh: 2; url=' . URLROOT . '/registrations/login');
      }
    }
  }

  // public function register()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     try {
  //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  //       $this->countryModel->createCountry($_POST);

  //       header('Location: ' . URLROOT . '/countries/index');
  //     } catch (PDOException $e) {
  //       echo 'Er is iets misgegaan tijdens het aanmaken van het land';
  //       header('Refresh: 2; url=' . URLROOT . '/countries/index');
  //     }
  //   } else {
  //     $data = [
  //       'title' => '<h1>Voeg een land toe</h1>',
  //       'name' => '',
  //       'capital' => '',
  //       'population' => '',
  //       'area' => '',
  //       'nameError' => '',
  //       'capitalError' => '',
  //       'populationError' => '',
  //       'areaError' => ''
  //     ];

  //     $this->view('countries/create', $data);
  //   }
  // }

  public function logout()
  {
    // Destroy the session
    session_destroy();

    // Show the logout message
    $data = ['logoutStatus' => 'U bent uitgelogd'];

    $this->view('registrations/logout', $data);

    // Redirect to the index page after 2 seconds
    header('Refresh: 2; URL=' . URLROOT . '/index');
  }
}
