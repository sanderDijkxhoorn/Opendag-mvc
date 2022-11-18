<?php
class Registration
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getSingleCountry($id)
    {
        $this->db->query("SELECT * FROM `country` WHERE `id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }
}
