<?php

include __DIR__.'/../Layouts/header.php';
?>


<h2 class="modal-title text-center my-3"><?= isset( $title ) ? $title : ""; ?></h2>

<form method="post">
    <div class="mb-3">
        <label for="name-frm" class="form-label">Name Product</label>
        <input type="text" name="name-frm" class="form-control" id="name-frm">
    </div>

    <div class="mb-3">
        <label for="price-frm" class="form-label">Price Product</label>
        <input type="text" name="price-frm" class="form-control" id="price-frm">
    </div>

    <div class="mb-3">
        <label for="description-frm" class="form-label">Description Product</label>
        <textarea name="description-frm" id="description-frm" cols="70" rows="10"></textarea>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include __DIR__.'/../Layouts/footer.php';
