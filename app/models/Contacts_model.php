<?php

class Contacts_model {
  private $db;

  function __construct() {
    $this->db = new Database();
  }

  function getContacts() {
    $this->db->dbQuery('SELECT * FROM contacts');
    return $this->db->resultSet();
  }

  function getDetailContact($id) {
    $this->db->dbQuery('SELECT * FROM contacts WHERE id=:id');
    $this->db->bind(':id', $id);
    return $this->db->resultOne();
  }

  function addContact($data) {
    $name = $data['name'];
    $email = $data['email'];
    $numberPhone = $data['numberPhone'];

    $this->db->dbQuery('INSERT INTO contacts VALUES(default, :name, :email, :numberPhone)');
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':numberPhone', $numberPhone);
    $this->db->execute();

    return $this->db->rowCount();
  }

  function deleteContact($id) {
    $this->db->dbQuery("DELETE FROM contacts WHERE id=:id");
    $this->db->bind(':id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  function updateContact($data) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $numberPhone = $_POST['numberPhone'];

    $this->db->dbQuery('UPDATE contacts SET name=:name, email=:email, number_phone=:numberPhone WHERE id=:id');
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':numberPhone', $numberPhone);
    $this->db->bind(':id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  function searchContact($name) {
    $this->db->dbQuery('SELECT * FROM contacts WHERE name LIKE :name');
    $this->db->bind(':name', "%$name%");

    return $this->db->resultSet();
  }
}