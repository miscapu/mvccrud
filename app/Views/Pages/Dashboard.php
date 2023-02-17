<?php
// include header
include __DIR__.'/../Layouts/header.php';
?>

<!-- Table HTML for data -->

<h2 class="modal-title text-center my-3"><?= title ? title : ""; ?></h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
            
        </tr>
        </thead>
        <tbody>

        <?php
        /**
         * Foreach for retrieves data to table products
         */
        if ( isset( $products ) ):
            foreach ( $products as $product ):
        ?>
        <tr>
            <th scope="row"><?= $product->id; ?></th>
            <td><?= $product->name; ?></td>
            <td><?= "R$ ".$product->price; ?></td>
            <td><?= $product->description; ?></td>
            <td>
                <a href="<?= BASE_URL."/edit.php?id=".$product->id;?>" class="btn btn-success">Edit</a>
                <a href="<?= BASE_URL."/delete.php?id=".$product->id;?>" class="btn btn-danger">Delete</a>
            </td>
            
        </tr>
        <?php endforeach;
        endif;
        ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="<?= BASE_URL.'/add.php'?>" class="btn btn-success">Add Product</a>
    </div>

<!-- End Table HTML for data -->

<?php
// include footer
include __DIR__.'/../Layouts/footer.php';