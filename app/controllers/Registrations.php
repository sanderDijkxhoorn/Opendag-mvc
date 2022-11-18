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

  // public function login($id = null)
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //     try {
  //       // Sanitize POST array
  //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  //       // Update the data with the form data
  //       $this->countryModel->updateCountry($_POST);

  //       // Redirect to the index page
  //       header('Location: ' . URLROOT . '/countries/index');
  //     } catch (PDOException $e) {
  //       // Show the error message
  //       echo 'Er is iets misgegaan tijdens het bewerken van een land';
  //       header('Refresh: 2; url=' . URLROOT . '/countries/index');
  //     }
  //   } else {
  //     $row = $this->countryModel->getSingleCountry($id);

  //     $data = [
  //       'title' => '<h1>Update landenoverzicht</h1>',
  //       'row' => $row
  //     ];

  //     $this->view('countries/update', $data);
  //   }
  // }

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
