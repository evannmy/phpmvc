<div class="container mt-4">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['contact']['name'] ?></h5>
      <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['contact']['email'] ?></h6>
      <p class="card-text"><?= $data['contact']['number_phone'] ?></p>
      <a href="<?= BASEURL ?>contacts" class="card-link">Back</a>
    </div>
  </div>
</div>