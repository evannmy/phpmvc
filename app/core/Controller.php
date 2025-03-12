<?php

class Controller {
  function view($page, $data=[]) {
    require_once '../app/views/' . $page . '.php';
  }

  function model($model) {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
}