<?php

class About extends Controller {
  function index($name='Evan', $profession='Software Developer') {
    $data['name'] = $name;
    $data['profession'] = $profession;
    $data['title'] = 'About';

    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  function page() {
    $data['title'] = 'About';

    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}