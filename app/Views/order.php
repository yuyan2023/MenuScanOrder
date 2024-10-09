<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Order Management</h2>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-lg-0">
                    <form method="get" action="<?= base_url('admin/orders'); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
              
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>totalAmount</th>
                        <th>Order Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($order as $order): ?>
                    <tr>
                    <td><?= esc($order['id']) ?></td>
                        <td><?= esc($order['totalAmount']) ?></td>
                        <td><?= esc($order['orderTime']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-info me-2" href="<?= base_url('admin/orders/orderdetail/'.$order['id']);?>"><i class="bi bi-eye-fill"></i></a>
                            
                            <a class="btn btn-sm btn-danger me-2" href="<?= base_url('admin/orders/delete/'.$order['id']); ?>" onclick="return confirm('Are you sure you want to delete this order?')"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

<?= $this->endSection() ?>
