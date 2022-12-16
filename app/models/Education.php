<?php
class Education
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getEducations()
    {
        $this->db->query("SELECT * FROM `opleidingen`;");

        return $this->db->resultSet();;
    }

    public function getSingleEducation($id)
    {
        $this->db->query("SELECT * FROM `opleidingen` WHERE `Id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function setEducationChoice($id)
    {
        $this->db->query("INSERT INTO `opleidingregistraties` (`LeerlingId`, `OpleidingId`) VALUES (:LeerlingId, :OpleidingId);");
        $this->db->bind(':LeerlingId', $_SESSION['user_id'], PDO::PARAM_INT);
        $this->db->bind(':OpleidingId', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function checkEducationChoice()
    {
        $this->db->query("SELECT * FROM `opleidingregistraties` WHERE `LeerlingId` = :LeerlingId;");
        $this->db->bind(':LeerlingId', $_SESSION['user_id'], PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateEducationChoice($id)
    {
        $this->db->query("UPDATE `opleidingregistraties` SET `OpleidingId` = :OpleidingId WHERE `LeerlingId` = :LeerlingId;");
        $this->db->bind(':LeerlingId', $_SESSION['user_id'], PDO::PARAM_INT);
        $this->db->bind(':OpleidingId', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
