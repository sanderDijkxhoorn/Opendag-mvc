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
        $accounts = $this->accountModel->getAccounts();

        // Make the data available in the view
        $rows = '';
        foreach ($accounts as $value) {
            $rows .= "
                <tr>
                  <td>" . htmlentities($value->username, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->email, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->role, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td><a href='" . URLROOT . "/accounts/update/$value->id'>update</a></td>
                  <td><a href='" . URLROOT . "/accounts/delete/$value->id'>delete</a></td>
                </tr>";
        }

        $data = ['accounts' => $rows];

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
                        'rows' => $accounts
                    ];

                    // Load the view
                    $this->view('accounts/index', $data);
                } else {
                    $data = [
                        'error' => 'Er is een fout opgetreden tijdens het account bewerken. Het account is niet gewijzigd',
                        'rows' => $accounts
                    ];

                    // Load the view
                    $this->view('accounts/index', $data);
                }
            } catch (PDOException $e) {
                // Show the error message
                echo 'Er is iets misgegaan tijdens het bewerken van een account (PDOException)';
                header('Refresh: 2; url=' . URLROOT . '/countries/index');
            }
        } else {
            $row = $this->accountModel->getSingleAccount($id);

            $data = ['row' => $row];

            $this->view('countries/update', $data);
        }
    }

    public function delete($id)
    {
        $this->accountModel->deleteAccount($id);

        $data = ['deleteStatus' => "Het land met id $id is verwijderd"];

        $this->view('countries/delete', $data);

        header('Refresh: 2; URL=' . URLROOT . '/countries/index');
    }
}
