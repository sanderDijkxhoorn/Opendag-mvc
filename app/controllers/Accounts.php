<?php
class Accounts extends Controller
{

    public function __construct()
    {
        $this->accountModel = $this->model('Account');
    }

    public function index()
    {
        // Get accounts
        $data = ['accounts' => $this->accountModel->getAccounts()];

        // Load the view
        $this->view('accounts/index', $data);
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Update the data with the form data
                $UpdatedAccount = $this->accountModel->updateAccount($_POST);

                // Get accounts
                $accounts = $this->accountModel->getAccounts();

                // If the account is updated successfully go to the index with a success message
                if ($UpdatedAccount) {
                    $data = [
                        'success' => 'Het account is succesvol gewijzigd',
                        'accounts' => $accounts
                    ];

                    // Load the view
                    $this->view('accounts/index', $data);
                } else {
                    $data = [
                        'error' => 'Er is een fout opgetreden tijdens het account bewerken. Het account is niet gewijzigd',
                        'accounts' => $accounts
                    ];

                    // Load the view
                    $this->view('accounts/index', $data);
                }
            } catch (PDOException $e) {
                // Show the error message
                echo 'Er is iets misgegaan tijdens het bewerken van een account (PDOException)';
                header('Refresh: 2; url=' . URLROOT . '/accounts/index');
            }
        } else {
            $row = $this->accountModel->getSingleAccount($id);

            $data = ['row' => $row];

            $this->view('accounts/update', $data);
        }
    }

    public function delete($id)
    {
        // Delete the account
        $this->accountModel->deleteAccount($id);

        $data = [
            'deleteStatus' => "Het account met id $id is verwijderd",
            'accounts' => $this->accountModel->getAccounts()
        ];

        $this->view('accounts/index', $data);
    }
}
