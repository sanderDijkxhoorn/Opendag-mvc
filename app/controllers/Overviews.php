<?php
class Overviews extends Controller
{
    public function index()
    {
        $this->view('overviews/index');
    }

    public function third()
    {
        $this->view('overviews/third');
    }

    public function fourth()
    {
        $this->view('overviews/fourth');
    }
}
