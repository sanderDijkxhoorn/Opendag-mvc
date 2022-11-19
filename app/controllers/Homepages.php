<?php
class Homepages extends Controller
{
  public function index()
  {
    $this->view('homepages/index');
  }

  public function about()
  {
    $this->view('homepages/about');
  }
}
