<?php
class Archives extends Controller
{
    public function index()
    {
        $this->view('archives/index');
    }

    public function softwaredevelopment()
    {
        $this->view('archives/softwaredevelopment');
    }

    public function optimalgaming()
    {
        $this->view('archives/optimalgaming');
    }

    public function koffiewebshop()
    {
        $this->view('archives/koffiewebshop');
    }
}
