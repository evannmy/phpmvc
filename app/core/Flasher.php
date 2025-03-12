<?php

class Flasher {
  static function setFlash($message, $status) {
    $_SESSION['flash'] = [
      'message' => $message,
      'status' => $status,
    ];
  }

  static function flash() {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-' . $_SESSION['flash']['status'] . ' alert-dismissible fade show" role="alert">
              ' . $_SESSION['flash']['message'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['flash']);
    }
  }
}