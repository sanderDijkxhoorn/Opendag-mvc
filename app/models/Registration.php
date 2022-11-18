<?php
class Registration
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT `id`, `username`, `password` FROM `users` WHERE `username` = :usr;");
        $this->db->bind(':usr', $username, PDO::PARAM_STR);
        $result = $this->db->single();

        return $result;
    }

    public function getRole()
    {
        $this->db->query("SELECT `role` FROM `users` where `id`= :id;");
        $this->db->bind(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        $result = $this->db->single();

        return $result;
    }
}
