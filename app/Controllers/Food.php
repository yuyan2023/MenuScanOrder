<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\FoodModel;

class Food extends ResourceController
{
    use ResponseTrait;

    /**
     * Handle GET requests to list education entries or filter by user_id.
     */
    public function index()
    {
        $model = new FoodModel();

        // Retrieve 'user_id' from query parameters if provided.
        $userId = $this->request->getGet('id');

        // Filter the data by user_id if provided, otherwise retrieve all entries.
        $data = $userId ? $model->where('id', $userId)->findAll() : $model->findAll();

        // Use HTTP 200 to return data.
        return $this->respond($data);
    }

    /**
     * Handle GET requests to retrieve a single education entry by its ID.
     */
    public function show($id = null)
    {
        $model = new FoodModel();

        // Attempt to retrieve the specific education entry by ID.
        $data = $model->find($id);

        // Check if data was found.
        if ($data) {
            return $this->respond($data);
        } else {
            // Return a 404 error if no data is found.
            return $this->failNotFound("No Education entry found with ID: {$id}");
        }
    }

    /**
     * Handle POST requests to create a new education entry.
     */
    public function create()
    {
        $model = new FoodModel();
        $data = $this->request->getJSON(true);  // Ensure the received data is an array.

        // Validate input data before insertion.
        if (empty($data)) {
            return $this->failValidationErrors('No data provided.');
        }

        // Insert data and check for success.
        $inserted = $model->insert($data);
        if ($inserted) {
            return $this->respondCreated($data, 'Education data created successfully.');
        } else {
            return $this->failServerError('Failed to create education data.');
        }
    }

    /**
     * Handle PUT requests to update an existing education entry by its ID.
     */
    public function update($id = null)
    {
        $model = new FoodModel();
        $data = $this->request->getJSON(true);  // Ensure the received data is an array.

        // Check if the record exists before attempting update.
        if (!$model->find($id)) {
            return $this->failNotFound("No Education entry found with ID: {$id}");
        }

        // Update the record and handle the response.
        if ($model->update($id, $data)) {
            return $this->respondUpdated($data, 'Education data updated successfully.');
        } else {
            return $this->failServerError('Failed to update education data.');
        }
    }

    /**
     * Handle DELETE requests to remove an existing education entry by its ID.
     */
    public function delete($id = null)
    {
        $model = new FoodModel();

        // Check if the record exists before attempting deletion.
        if (!$model->find($id)) {
            return $this->failNotFound("No Education entry found with ID: {$id}");
        }

        // Attempt to delete the record.
        if ($model->delete($id)) {
            return $this->respondDeleted(['id' => $id, 'message' => 'Education data deleted successfully.']);
        } else {
            return $this->failServerError('Failed to delete education data.');
        }
    }
}