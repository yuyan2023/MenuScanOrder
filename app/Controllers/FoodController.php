<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodModel;

class FoodController extends BaseController
{
    public function __construct()
    {
        helper('url');
        $this->foodModel = new FoodModel();
        $this->session = session();
        if (!$this->session->has('cart')) {
            $this->session->set('cart', []);
        }
        
    }

    public function index()
    {
        $model = new \App\Models\FoodModel();  // Make sure to use the correct namespace for your FoodModel
        $search = $this->request->getGet('search');
    
        if (!empty($search)) {
            // Initialize an array to hold conditions for each searchable field
            $conditions = [];
            foreach ($model->allowedFields as $field) {
                // Prepare a LIKE clause for each field
                $conditions[] = "$field LIKE '%$search%'";
            }
            // Combine all conditions with OR to form the final WHERE clause
            $whereClause = implode(' OR ', $conditions);
            // Retrieve foods that match the search criteria, ordered by name
            $foods = $model->where($whereClause)->orderBy('id', 'ASC')->findAll();
        } else {
            // If no search term is provided, retrieve all foods ordered by name
            $foods = $model->orderBy('foodType', 'ASC')->findAll();
            $mainFoods = $model->where('foodType', 'main')->orderBy('id', 'ASC')->findAll();
            $coffeeFoods = $model->where('foodType', 'coffee')->orderBy('id', 'ASC')->findAll();
            $dessertFoods = $model->where('foodType', 'dessert')->orderBy('id', 'ASC')->findAll();
        }
    
        // Prepare the data array to pass to the view
        $data['foods'] = $foods;
        $data['mainFoods'] = $mainFoods;
        $data['coffeeFoods'] = $coffeeFoods;
        $data['dessertFoods'] = $dessertFoods;
        // Load the view and pass the data array
        return view('menu', $data);
    }
    

    public function add_menu($id=null)
    {
        $model = new \App\Models\FoodModel();
        // Check if this is a POST request
        if ($this->request->getMethod() === 'POST') {
            // Get POST data
            $data = $this->request->getPost();
            if ($id === null) {
                if ($model->insert($data)) {
                    // If the user is successfully added, set a success message.
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    // If the addition fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else {
                // If an ID is provided, it's an edit operation.
                if ($model->update($id, $data)) {
                    // If the user is successfully updated, set a success message.
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    // If the update fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                }
            }
    
            return redirect()->to('menu');
        }
    
        $data['food'] = ($id === null) ? null : $model->find($id);
    
        return view('add_menu', $data);
    }


    public function delete($id)
    {
        // Delete the food item
        if ($this->foodModel->delete($id)) {
            $this->session->setFlashdata('success', 'Food deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete food. Please try again.');
        }

        return redirect()->to('menu');
    }

    public function addToCart($id)
{
    $food = $this->foodModel->find($id);
    if ($food) {
        $cart = $this->session->get('cart');
        $cart[] = $food;  // Add food item to cart
        $this->session->set('cart', $cart);  // Save the updated cart back to the session

        return $this->response->setJSON(['success' => true]);
    }
    return $this->response->setJSON(['success' => false]);
}

public function displayCart()
{
    $cart = $this->session->get('cart');
    return $this->response->setJSON(['cart' => $cart]);
}

public function removeFromCart($index)
{
    $cart = $this->session->get('cart');
    if (array_key_exists($index, $cart)) {
        array_splice($cart, $index, 1); // Remove item and reindex array
        $this->session->set('cart', $cart);
        return $this->response->setJSON(['success' => true]);
    }
    return $this->response->setJSON(['success' => false]);
}
public function checkout()
{
    date_default_timezone_set('Australia/Brisbane');
    $cart = $this->session->get('cart');
    $totalAmount = 0;

    foreach ($cart as $item) {
        $totalAmount += $item['price'];
    }

    $orderModel = new \App\Models\OrderModel();
    $orderDetailsModel = new \App\Models\OrderDetailsModel(); // Load the OrderDetailsModel

    $orderData = [
        'totalAmount' => $totalAmount,
        'orderTime' => date('Y-m-d H:i:s')
    ];

    $orderId = $orderModel->insert($orderData);

    if ($orderId) {
        foreach ($cart as $item) {
            $orderDetailsModel->insert([
                'orderId' => $orderId,
                'foodName' => $item['foodName'],
                'price' => $item['price']
            ]);
        }
        $this->session->remove('cart');
        return $this->response->setJSON(['success' => true, 'message' => 'Checkout successful']);
    } else {
        $dbError = $orderModel->errors();
        log_message('error', 'Checkout failed to save: ' . print_r($dbError, true));
        return $this->response->setJSON(['success' => false, 'message' => 'Checkout failed to process order.']);
    }
}


}