<?php
class Comments extends Controller
{

    public function __construct()
    {
        $this->commentModel = $this->model('Comment');
    }

    public function index()
    {
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
    }

}
