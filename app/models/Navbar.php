<?php
class Navbar
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRole()
    {
        $this->db->query("SELECT `role` FROM `users` where `id`= 2;");
        $result = $this->db->single();

        return $result;
    }
}
