<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Order Details</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>price</th>
                
        
                </tr>
            </thead>
            <tbody id="foodTableBody">
                <?php foreach ($orderDetails as $orderDetail): ?>
                    <tr>
                        <td><?= esc($orderDetail['foodName']) ?></td>
                        <td><?= esc($orderDetail['price']) ?></td>
                       
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ?>
