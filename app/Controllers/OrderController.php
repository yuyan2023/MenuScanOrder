<?php namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailsModel;
class OrderController extends BaseController
{
    public function __construct()
    {
        // Load helpers as needed
        helper(['url', 'form']);
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $model = new OrderModel();
        $search = $this->request->getGet('search');

        if (!empty($search)) {
            $conditions = [];
            foreach ($model->allowedFields as $field) {
                $conditions[] = "$field LIKE '%$search%'";
            }
            $whereClause = implode(' OR ', $conditions);
            $orders = $model->where($whereClause)->orderBy('orderTime', 'ASC')->findAll();
        } else {
            $orders = $model->orderBy('orderTime', 'ASC')->findAll();
        }

        $data['order'] = $orders;
        
        return view('order', $data);
    }

    public function orderdetail($order_id)
{
    $orderModel = new \App\Models\OrderModel();
    $orderDetailsModel = new \App\Models\OrderDetailsModel();

    // Fetch the main order by order_id
    $order = $orderModel->find($order_id);

    // Ensure the order exists to avoid processing non-existent orders
    if (!$order) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Order with ID: {$order_id} Not Found");
    }

    // Fetch related order details associated with the orderId
    $orderDetails = $orderDetailsModel->where('orderId', $order_id)->findAll();

    // Collect data for the view
    $data = [
        'order' => $order,
        'orderDetails' => $orderDetails
    ];

    // Optional: Fetch customer info if the order includes customerID
    // Assuming CustomerModel exists and is configured correctly
    // if (!empty($order['customerID'])) {
    //     $customerModel = new \App\Models\CustomerModel();
    //     $customer = $customerModel->find($order['customerID']);
    //     $data['customer'] = $customer;
    // }

    // Return data to the view which will present the order and its details
    return view('orderdetail', $data);
}



public function delete($orderId)
{
    $orderModel = new \App\Models\OrderModel();
    $orderDetailsModel = new \App\Models\OrderDetailsModel();

    // First, delete related order details
    if ($orderDetailsModel->where('orderId', $orderId)->delete()) {
        // Now, delete the order
        if ($orderModel->delete($orderId)) {
            $this->session->setFlashdata('success', 'Order and related details deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete the order.');
        }
    } else {
        $this->session->setFlashdata('error', 'Failed to delete order details.');
    }

    return redirect()->to('/admin/orders');
}

}
