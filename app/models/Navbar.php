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
        $this->db->query("SELECT `role` FROM `users` where `id`= :id;");
        $this->db->bind(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        $result = $this->db->single();

        return $result;
    }
}
