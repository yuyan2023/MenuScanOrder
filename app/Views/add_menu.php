<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($food) ? 'Edit Food' : 'Add Food' ?></h2>
                <form method="post" action="<?= base_url('admin/menu/add_menu' . (isset($food) ? '/' . $food['id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="foodName" class="form-label">Food Name</label>
                        <input type="text" class="form-control" id="foodName" name="foodName" value="<?= isset($food) ? esc($food['foodName']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="foodType" class="form-label">Food Type</label>
                        <input type="text" class="form-control" id="foodType" name="foodType" value="<?= isset($food) ? esc($food['foodType']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= isset($food) ? esc($food['price']) : '' ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?= isset($food) ? 'Update Food' : 'Add Food' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
