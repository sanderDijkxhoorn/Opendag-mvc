<?php
class Comments extends Controller
{

    public function __construct()
    {
        $this->commentModel = $this->model('Comment');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Get comments
            $comments = $this->commentModel->getComments();

            // Make the data available in the view
            $rows = '';
            foreach ($comments as $value) {
                $rows .= "
            <div class='single-item'>
                <h3>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</h3>
                <p>" . htmlentities($value->comment, ENT_QUOTES, 'ISO-8859-1') . "</p>
            </div>";
            }

            $data = [
                'comments' => $rows
            ];

            // Load the view
            $this->view('comments/index', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Try to the new comment
                $creatResult = $this->commentModel->createComment($_POST);

                // Get comments
                $comments = $this->commentModel->getComments();

                // Make the data available in the view
                $rows = '';
                foreach ($comments as $value) {
                    $rows .= "
                            <div class='single-item'>
                                <h3>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</h3>
                                <p>" . htmlentities($value->comment, ENT_QUOTES, 'ISO-8859-1') . "</p>
                            </div>";
                }

                // Check if the comment is created
                if ($creatResult) {
                    $data = [
                        'comments' => $rows,
                        'success' => 'Comment is geplaatst'
                    ];

                    // Load the view
                    $this->view('comments/index', $data);
                } else {
                    $data = [
                        'comments' => $rows,
                        'error' => 'Er is iets misgegaan tijdens het plaatsen van een comment'
                    ];

                    // Load the view
                    $this->view('comments/index', $data);
                }
            } catch (PDOException $e) {
                echo 'Er is iets misgegaan tijdens het aanmaken van het land (PDOException)';
                header('Refresh: 2; url=' . URLROOT . '/countries/index');
            }
        }
    }
}
