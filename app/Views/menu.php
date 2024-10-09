<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container text-center">

        <h2 class="mb-4"><i class="bi bi-shop"></i>Menu</h2>
        <div class="row mb-4">
        <div class="col-12 mb-4">
              <select class="form-select" aria-label="Default select example" onchange="filterFoodType(this.value);">
                <option selected value="allfood">All Food Types</option>
                <option value="main">Main</option>
                <option value="coffee">Coffee</option>
                <option value="dessert">Dessert</option>
            </select>
</div>
                <div class="col text-md-end">
                <?php if (session()->get('isAdmin')): ?>
                           <a class="btn btn-primary" href="<?= base_url('admin/menu/add_menu');?>">Add item</a>  
                           <?php endif; ?>
                  
                </div>
            </div>
            
      
            <table id="table-allfood" class="table table-bordered table-hover">
            <h5 id="label-allfood" class="mb-4">All food</h5>
            <thead class="thead-light">
                <tr  class="table-secondary">
  
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($foods as $food): ?>
                    <tr>
                   
                        <td><?= esc($food['foodName']) ?></td>
                        <td><?= esc($food['foodType']) ?></td>
                        <td>$<?= number_format(esc($food['price']), 2) ?></td>
                        <td>
                        <a class="btn btn-sm btn-primary me-2" onclick="addToCart(<?= $food['id']; ?>)">
                        <i class="bi bi-cart-plus"></i>
                    </a>

                        <?php if (session()->get('isAdmin')): ?>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('admin/menu/add_menu/'.$food['id']); ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-danger me-2" href="<?= base_url('admin/menu/delete/'.$food['id']); ?>" onclick="return confirm('Are you sure you want to delete this food item?')"><i class="bi bi-trash-fill"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
            <table id="table-main" class="table table-bordered table-hover" style="display: none;">
            <h5 id="label-main" class="mb-4" style="display: none;">Main</h5>
            <thead class="thead-light">
                <tr  class="table-secondary">
  
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($mainFoods as $food): ?>
                    <tr>
                   
                        <td><?= esc($food['foodName']) ?></td>
                        <td><?= esc($food['foodType']) ?></td>
                        <td>$<?= number_format(esc($food['price']), 2) ?></td>
                        <td>
                        <a class="btn btn-sm btn-primary me-2" onclick="addToCart(<?= $food['id']; ?>)">
                        <i class="bi bi-cart-plus"></i>
                    </a>

                        <?php if (session()->get('isAdmin')): ?>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('admin/menu/add_menu/'.$food['id']); ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-danger me-2" href="<?= base_url('admin/menu/delete/'.$food['id']); ?>" onclick="return confirm('Are you sure you want to delete this food item?')"><i class="bi bi-trash-fill"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table id="table-coffee" class="table table-bordered table-hover" style="display: none;">
        <h5 id="label-coffee" class="mb-4" style="display: none;">Coffee</h5>
            <thead class="thead-light">
                <tr class="table-secondary">
  
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($coffeeFoods as $food): ?>
                    <tr>
                   
                        <td><?= esc($food['foodName']) ?></td>
                        <td><?= esc($food['foodType']) ?></td>
                        <td>$<?= number_format(esc($food['price']), 2) ?></td>
                        <td>
                        <a class="btn btn-sm btn-primary me-2" onclick="addToCart(<?= $food['id']; ?>)">
                        <i class="bi bi-cart-plus"></i>
                    </a>

                        <?php if (session()->get('isAdmin')): ?>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('admin/menu/add_menu/'.$food['id']); ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-danger me-2" href="<?= base_url('admin/menu/delete/'.$food['id']); ?>" onclick="return confirm('Are you sure you want to delete this food item?')"><i class="bi bi-trash-fill"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table id="table-dessert" class="table table-bordered table-hover" style="display: none;">
        <h5 id="label-dessert" class="mb-4" style="display: none;">Dessert</h5>
            <thead class="thead-light">
                <tr class="table-secondary">
  
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dessertFoods as $food): ?>
                    <tr>
                   
                        <td><?= esc($food['foodName']) ?></td>
                        <td><?= esc($food['foodType']) ?></td>
                        <td>$<?= number_format(esc($food['price']), 2) ?></td>
                        <td>
                        <a class="btn btn-sm btn-primary me-2" onclick="addToCart(<?= $food['id']; ?>)">
                        <i class="bi bi-cart-plus"></i>
                    </a>

                        <?php if (session()->get('isAdmin')): ?>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('admin/menu/add_menu/'.$food['id']); ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-danger me-2" href="<?= base_url('admin/menu/delete/'.$food['id']); ?>" onclick="return confirm('Are you sure you want to delete this food item?')"><i class="bi bi-trash-fill"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div id="cart">
    <h3><i class="bi bi-cart"></i> Cart</h3>
    
    <ul>
        <?php foreach (session('cart') as $index => $item): ?>
            <li>
                <?= esc($item['foodName']) ?> - $<?= number_format(esc($item['price']), 2) ?>
                <button onclick="removeFromCart(<?= $index ?>)">Remove</button>
                
            </li>
        <?php endforeach; ?>
       

    </ul>
</div>

 <button class="btn btn-primary" onclick="checkout()">Checkout</button>

    </div>
    
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script>
    
    function filterFoodType(type) {
    const allTypes = ['allfood', 'main', 'coffee', 'dessert'];
    allTypes.forEach(t => {
        const table = document.getElementById(`table-${t}`);
        const label = document.getElementById(`label-${t}`);
        if (type === 'all' || type === t) {
            table.style.display = '';  // Show table
            label.style.display = '';  // Show label
        } else {
            table.style.display = 'none';  // Hide table
            label.style.display = 'none';  // Hide label
        }
    });
}


function addToCart(foodId) {
    fetch(`<?= base_url('addToCart/') ?>${foodId}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Toastify({
                text: "Item added to cart",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4CAF50",
            }).showToast();
            updateCartDisplay();  // Refresh your cart display
        } else {
            Toastify({
                text: "Failed to add item to cart",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#FF0000",
            }).showToast();
        }
    }).catch(error => {
        console.error('Error adding item to cart:', error);
        Toastify({
            text: "Error adding item to cart",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#FF0000",
        }).showToast();
    });
}



function removeFromCart(foodId) {
    fetch(`<?= base_url('removeFromCart/') ?>${foodId}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Toastify({
                text: "Item removed from cart",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4CAF50",
            }).showToast();
            updateCartDisplay();  // Refresh your cart display
        } else {
            Toastify({
                text: "Failed to remove item",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#FF0000",
            }).showToast();
        }
    })

}
function updateCartDisplay() {
    fetch(`<?= base_url('displayCart') ?>`)
    .then(response => response.json())
    .then(data => {
        const cartContainer = document.getElementById('cart');
        let total = 0;  // Initialize total price

        const ul = document.createElement('ul');
        cartContainer.innerHTML = '<h3>Cart</h3>'; // Clear and set the title

        data.cart.forEach((item, index) => {
            let li = document.createElement('li');
            li.innerHTML = `${item.foodName} - $${parseFloat(item.price).toFixed(2)} <button onclick="removeFromCart(${index})">Remove</button>`;
            ul.appendChild(li);

            total += parseFloat(item.price);  // Add item price to total
        });

        // Create a summary line for total price
        let totalDisplay = document.createElement('p');
        totalDisplay.innerHTML = `<strong>Total: $${total.toFixed(2)}</strong>`;
        cartContainer.appendChild(ul);
        cartContainer.appendChild(totalDisplay); // Append total price to the cart container
    })
    .catch(error => {
        console.error('Error updating cart display:', error);
    });
}

function checkout() {
    fetch(`<?= base_url('checkout') ?>`, { method: 'POST' })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Log the data to see what is received
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message || 'Checkout successful!', // Use a default success message if none provided
                icon: 'success',
                confirmButtonText: 'OK'
            });
            updateCartDisplay();  // Update the cart display
        } else {
            Swal.fire({
                title: 'Failed!',
                text: data.message || 'Checkout failed.', // Use a fallback message if none provided
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }).catch(error => {
        console.error('Error during checkout:', error);
        Swal.fire({
            title: 'Error!',
            text: 'An error occurred during checkout.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
}



</script>



<?= $this->endSection() ?>
