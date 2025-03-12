<div class="container mt-4">
  <?php Flasher::flash() ?>

  <!-- Button trigger modal -->
  <button type="button" class="add-button btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formContact">
    Add Contact
  </button>

  <div class="row">
    <div class="col-4">
      <form action="<?= BASEURL ?>contacts/getSearch" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control keyword" id="keyword" name="keyword" placeholder="Search Contact" value="<?php if (isset($data['keyword'])) echo $data['keyword']; ?>">
          <button class="btn btn-primary search-button" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <ul class="list-group">
        <h1>List Contacts</h1>
        <?php if (empty($data['contacts'])) : ?>
          <p>Contact with name "<?= $data['keyword'] ?>" not found</p>
        <?php endif ?>

        <?php foreach($data['contacts'] as $contact) : ?>
          <li class="list-group-item d-flex justify-content-between">
            <?= $contact['name'] ?>
            <div class="action">
              <a class="badge rounded-pill text-bg-primary text-decoration-none" href="<?= BASEURL ?>contacts/detail/<?= $contact['id'] ?>">detail</a>
              <a class="update-button badge rounded-pill text-bg-warning text-decoration-none" data-bs-toggle="modal" data-bs-target="#formContact" data-id="<?= $contact['id'] ?>" href="<?= BASEURL ?>contacts/update/<?= $contact['id'] ?>">update</a>
              <a class="badge rounded-pill text-bg-danger text-decoration-none" href="<?= BASEURL ?>contacts/delete/<?= $contact['id'] ?>" onclick="return confirm('Are you sure want to delete?')">delete</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formContact" tabindex="-1" aria-labelledby="formContactLabel" aria-hidden="true">
  <form action="<?= BASEURL ?>contacts/add" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="formContactLabel">Form Add Contact</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="numberPhone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="numberPhone" name="numberPhone" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Contact</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
