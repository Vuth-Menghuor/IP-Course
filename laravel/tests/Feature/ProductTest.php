<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test ID: Product-001
     * Description: Check if we can access the get all products api
     * Precondition: None
     * Test Steps: 1. Hit the GET /api/products api
     *             2. Check if the response status is 200
     * Test Date: None
     * Expected Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    public function test_get_all_products()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    /**
     * Test ID: Product-002
     * Description: Check if we can create a new product
     * Precondition: A valid category ID exists 
     * Test Steps: 1. Send POST request to /api/products with name, pricing, and category_id
     *             2. Check if the product is created and returned with correct data
     * Test Date: None
     * Expected Result: The product is created with correct name, pricing, and category_id
     * Actual Result: The product is created and data is correct
     * Status: Passed
     * Remark: None
    */
    public function test_create_new_product()
    {
        $category_id = 1; // Assume category 1 exists
        $data = [
            'name' => 'New Product',
            'pricing' => 100,
            'category_id' => $category_id
        ];

        $response = $this->post('/api/products', $data);

        $response->assertStatus(201);  // Assert that status code is 201 (Created)
        $response->assertJson([
            'name' => 'New Product',
            'pricing' => 100,
            'category_id' => $category_id
        ]);

        // Assert the product exists in the database
        $this->assertDatabaseHas('products', [
            'name' => 'New Product',
            'pricing' => 100,
            'category_id' => $category_id
        ]);
    }

    /**
     * Test ID: Product-003
     * Description: Check if we can access the get a Product by its id api
     * Precondition: None
     * Test Steps:
     *  1. Hit the get Product by id api
     *  2. Check if the resonse status is 200
     * Test Data: None
     * Expected Result: The response status should be 200
     * Actual Result: The response returned 200
     * Status: PASSED
     * Remark: None
     *
     */
    public function test_if_we_can_access_get_product_by_id_api() {
        $request = $this->get('/api/products/1');

        $request->assertStatus(200)->assertJson(["id" => 1]);
    }
    

    /**
     * Test ID: Product-004
     * Description: Check if we can update an existing product's name
     * Precondition: A product with specific ID exists
     * Test Steps: 1. Send PATCH request to /api/products/{id} with updated name 
     *             2. Check if the product's name is updated in the response 
     * Test Date: None
     * Expected Result: The product name is updated successfully
     * Actual Result: The product name is updated successfully
     * Status: Passed
     * Remark: None
     */
    public function test_update_existing_product_name()
    {
        // Create a product with a known ID (for testing)
        $product = Product::create([
            'name' => 'Old Product Name',
            'pricing' => 50,
            'category_id' => 1
        ]);

        // Prepare data with the updated name
        $updatedData = ['name' => 'Updated Product Name'];

        // Send a PATCH request to update the product
        $response = $this->patch("/api/products/{$product->id}", $updatedData);

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the product's name has been updated in the response
        $response->assertJson(['name' => 'Updated Product Name']);
    }


    /**
     * Test ID: Product-005
     * Description: Check if we can delete a product by ID
     * Precondition: A product with specific ID exists
     * Test Steps: 1. Send DELETE request to /api/products/{id} 
     *             2. Check if the response confirms deletion
     * Test Date: None
     * Expected Result: The product is deleted successfully
     * Actual Result: The product is deleted successfully
     * Status: Passed
     * Remark: None
     */
    public function test_delete_product()
    {
        // Manually create a product in the database
        $product = Product::create([
            'name' => 'Product to Delete',
            'pricing' => 50,
            'category_id' => 1 // Assuming category 1 exists
        ]);
        
        // Send the DELETE request to delete the product
        $response = $this->delete("/api/products/{$product->id}");

        // Assert that the status code is 200
        $response->assertStatus(200);
    }
    
}
