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

    public function createUser($postData)
    {
        $this->db->query("INSERT INTO `users` (`username`, `email`, `password`) VALUES (:usr, :eml, :pwd);");
        $this->db->bind(':usr', $postData['username'], PDO::PARAM_STR);
        $this->db->bind(':eml', $postData['email'], PDO::PARAM_STR);
        $this->db->bind(':pwd', $postData['password'], PDO::PARAM_STR);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkExist($username, $email)
    {
        $this->db->query("SELECT `username`, `email` FROM `users` WHERE `username` = :usr OR `email` = :eml;");
        $this->db->bind(':usr', $username, PDO::PARAM_STR);
        $this->db->bind(':eml', $email, PDO::PARAM_STR);
        $result = $this->db->single();

        if ($result) {
            return false;
        } else {
            return true;
        }
    }
}
