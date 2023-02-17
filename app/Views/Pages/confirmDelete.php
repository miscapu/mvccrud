<main>
    <h2 class="mt-3">

        <form method="post">
            <div class="form-group">
                <p>You want delete <strong><?= $product->name; ?></strong>?</p>
            </div>

            <div class="form-group">
                <a href="index.php">
                    <button type="button" class="btn-success btn">Cancel</button>
                </a>

                    <button type="submit" name="delete" class="btn-danger btn">Yes, delete</button>


            </div>
        </form>
        
    </h2>
</main>