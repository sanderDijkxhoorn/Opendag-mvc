<?php
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getComments()
    {
        $this->db->query("SELECT * FROM `comments`;");
        $result = $this->db->resultSet();

        return $result;
    }

    public function createComment($postData)
    {
        $this->db->query("INSERT INTO `comments` (`name`, `email`, `comment`) VALUES (:name, :email, :comment);");
        $this->db->bind(':name', $postData['name'], PDO::PARAM_STR);
        $this->db->bind(':email', $postData['email'], PDO::PARAM_STR);
        $this->db->bind(':comment', $postData['comment'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}
