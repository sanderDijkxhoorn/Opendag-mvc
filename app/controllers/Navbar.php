<?php
class Navbars extends Controller
{

    public function __construct()
    {
        $this->navbarModel = $this->model('Navbar');
    }

    public function index()
    {
        // Get countries
        $navbar_role = $this->navbarModel->getRole();

        $data = [
            'role' => $navbar_role
        ];
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Update the data with the form data
                $this->countryModel->updateCountry($_POST);

                // Redirect to the index page
                header('Location: ' . URLROOT . '/countries/index');
            } catch (PDOException $e) {
                // Show the error message
                echo 'Er is iets misgegaan tijdens het bewerken van een land';
                header('Refresh: 2; url=' . URLROOT . '/countries/index');
            }
        } else {
            $row = $this->countryModel->getSingleCountry($id);

            $data = [
                'title' => '<h1>Update landenoverzicht</h1>',
                'row' => $row
            ];

            $this->view('countries/update', $data);
        }
    }

    public function delete($id)
    {
        $this->countryModel->deleteCountry($id);

        $data = ['deleteStatus' => "Het land met id $id is verwijderd"];

        $this->view('countries/delete', $data);

        header('Refresh: 2; URL=' . URLROOT . '/countries/index');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $this->countryModel->createCountry($_POST);

                header('Location: ' . URLROOT . '/countries/index');
            } catch (PDOException $e) {
                echo 'Er is iets misgegaan tijdens het aanmaken van het land';
                header('Refresh: 2; url=' . URLROOT . '/countries/index');
            }
        } else {
            $data = [
                'title' => '<h1>Nieuw land toevoegen</h1>'
            ];

            $this->view('countries/create', $data);
        }
    }
}
