<?php
class Account
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAccounts()
    {
        $this->db->query("SELECT * FROM `users`;");

        return $this->db->resultSet();;
    }

    public function getSingleAccount($id)
    {
        $this->db->query("SELECT * FROM `users` WHERE `id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateAccount($post)
    {
        $this->db->query("UPDATE `users` SET `username` = :username, `email` = :email, `role` = :role WHERE `id` = :id;");
        $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
        $this->db->bind(':username', $post['username'], PDO::PARAM_STR);
        $this->db->bind(':email', $post['email'], PDO::PARAM_STR);
        $this->db->bind(':role', $post['role'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function deleteAccount($id)
    {
        $this->db->query("DELETE FROM `users` WHERE `id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
