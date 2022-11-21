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
        $this->db->query("SELECT `id`, `username`, `email`, `role` FROM `users`;");

        return $this->db->resultSet();;
    }

    public function getSingleAccount($id)
    {
        $this->db->query("SELECT `id`, `username`, `email`, `role` FROM `users` WHERE `id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateAccount($post)
    {
        $this->db->query("UPDATE `users` SET `username` = :username, `email` = :email, `role` = :role WHERE `id` = :id;");
        if (isset($post['id'])) {
            $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
        } else {
            return false;
        }

        // Check if username, email or role are set and for each bind the value to the query
        $binds = [
            ':username' => $post['username'],
            ':email' => $post['email'],
            ':role' => $post['role']
        ];

        foreach ($binds as $key => $value) {
            if (isset($value)) {
                $this->db->bind($key, $value, PDO::PARAM_STR);
            }
        }

        return $this->db->execute();
    }

    public function deleteAccount($id)
    {
        $this->db->query("DELETE FROM `users` WHERE `id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
