<?php

class Contacts extends Controller {
  function index() {
    $data['title'] = 'Contacts';
    $data['contacts'] = $this->model('Contacts_model')->getContacts();

    $this->view('templates/header', $data);
    $this->view('contacts/index', $data);
    $this->view('templates/footer');
  }

  function detail($id) {
    $data['title'] = 'Contact Detail';
    $data['contact'] = $this->model('Contacts_model')->getDetailContact($id);

    $this->view('templates/header', $data);
    $this->view('contacts/detail', $data);
    $this->view('templates/footer', $data);
  }

  function add() {
    $rowResult = $this->model('Contacts_model')->addContact($_POST);

    if ($rowResult > 0) {
      Flasher::setFlash('Data added successfully', 'success');
      header('Location:' . BASEURL . 'contacts');
      exit;
    } else {
      Flasher::setFlash('Data failed to add', 'danger');
      header('Location:' . BASEURL . 'contacts');
      exit;
    }
  }

  function delete($id) {
    $rowResult = $this->model('Contacts_model')->deleteContact($id);
    if ($rowResult > 0) {
      Flasher::setFlash('Data deleted successfully', 'success');
      header('Location:' . BASEURL . 'contacts');
      exit;
    } else {
      Flasher::setFlash('Data failed to delete', 'danger');
      header('Location:' . BASEURL . 'contacts');
      exit;
    }
  }

  function getUpdate() {
    $id = $_POST['id'];
    $contactDetail = $this->model('Contacts_model')->getDetailContact($id);
    echo json_encode($contactDetail);
  }

  function update() {
    $rowResult = $this->model('Contacts_model')->updateContact($_POST);
    if ($rowResult > 0) {
      Flasher::setFlash('Data updated successfully', 'success');
      header('Location:' . BASEURL . 'contacts');
      exit;
    } else {
      Flasher::setFlash('Data failed to update', 'danger');
      header('Location:' . BASEURL . 'contacts');
      exit;
    }
  }

  function getSearch() {
    $contactName = $_POST['keyword'];
    header('Location:' . BASEURL . 'contacts/search/' . $contactName);
  }

  function search($name='') {
    if (empty($name)) {
      header('Location:' . BASEURL . 'contacts');
    } else {
      $data['keyword'] = $name;
      $data['title'] = 'Contacts';
      $data['contacts'] = $this->model('Contacts_model')->searchContact($name);
  
      $this->view('templates/header', $data);
      $this->view('contacts/index', $data);
      $this->view('templates/footer');
    }
  }
}