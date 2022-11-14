<?php
class Country
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getCountries()
  {
    $this->db->query("SELECT * FROM `country`;");
    $result = $this->db->resultSet();

    return $result;
  }

  public function getSingleCountry($id)
  {
    $this->db->query("SELECT * FROM `country` WHERE `id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->single();
  }

  public function updateCountry($post)
  {
    $this->db->query("UPDATE `country` SET `name` = :name, `capitalCity` = :capitalCity, `continent` = :continent, `population` = :population WHERE `id` = :id;");
    $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
    $this->db->bind(':name', $post['name'], PDO::PARAM_STR);
    $this->db->bind(':capitalCity', $post['capitalCity'], PDO::PARAM_STR);
    $this->db->bind(':continent', $post['continent'], PDO::PARAM_STR);
    $this->db->bind(':population', $post['population'], PDO::PARAM_INT);

    return $this->db->execute();
  }

  public function deleteCountry($id)
  {
    $this->db->query("DELETE FROM `country` WHERE `id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->execute();
  }

  public function createCountry()
  {
    $this->db->query("INSERT INTO `country` (`name`, `capitalCity`, `continent`, `population`) VALUES (:name, :capitalCity, :continent, :population);");
    $this->db->bind(':name', $_POST['name'], PDO::PARAM_STR);
    $this->db->bind(':capitalCity', $_POST['capitalCity'], PDO::PARAM_STR);
    $this->db->bind(':continent', $_POST['continent'], PDO::PARAM_STR);
    $this->db->bind(':population', $_POST['population'], PDO::PARAM_INT);

    return $this->db->execute();
  }
}
