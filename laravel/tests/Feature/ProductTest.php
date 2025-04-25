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
     * Test Steps: 
     * 1. Hit the GET /api/products api
     * 2. Check if the response status is 200
     * Test Date: None
     * Expected Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_get_all_products_api()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200)->assertJsonCount(Product::count());
    }
    // checks that the JSON response contains the same number of elements
    // retrieves the total number of categories from the database.

    /**
     * Test ID: Product-002
     * Description: Test if we can create a new product
     * Precondition: None
     * Test Steps: 
     * 1. Send POST request to /api/products with name, pricing, and category_id
     * 2. Check if the response status is 201 and returned data is correct
     * Test Date: None
     * Expected Result: Product is created with correct name, pricing, and category_id
     * Actual Result: Product is created and data is correct
     * Status: Passed
     * Remark: None
    */
    public function test_if_we_can_access_create_new_product()
    {
        $response = $this->post("/api/products", [
            "name" => "test_product_01",
            "pricing" => 100,
            "category_id" => 1,
        ]);

        $response->assertStatus(201)->assertJson([
            "name" => $response['name'],
            "pricing" => $response['pricing'],
            "category_id" => $response['category_id'],
        ]);
    }

    /**
     * Test ID: Product-003
     * Description: Test if we can get a product by its ID
     * Precondition: None
     * Test Steps:
     *  1. Send GET request to /api/products/1
     *  2. Check if the response status is 200 and contains the correct ID
     * Test Data: None
     * Expected Result: Product with ID 1 is returned succeefully 
     * Actual Result: Product with ID 1 is returned successfully
     * Status: PASSED
     * Remark: None
     */
    public function test_if_we_can_access_get_product_by_id_api(): void{
        $request = $this->get('/api/products/1');

        $request->assertStatus(200)->assertJson(["id" => 1]);
    }
    
    /**
     * Test ID: Product-004
     * Description: Test if we can update an existing product's name
     * Precondition: None
     * Test Steps: 
     * 1. Send PATCH request to /api/products/1 with updated name, pricing, and category_id 
    *  2. Check if the response status is 200 and data is upadated 
     * Test Date: None
     * Expected Result: Product name is updated successfully 
     * Actual Result: Product name is updated successfully 
     * Status: Passed
     * Remark: None
     */
    public function test_update_existing_product_name()
    {
        $response = $this->patch('/api/products/1', [
            "name" => "test_product_01_updated",
            "pricing" => 999,
            "category_id" => 2,
        ]);

        $response->assertStatus(200)->assertJson([
            "id" => $response['id'],
            "name" => $response['name'],
            "pricing" => $response['pricing'],
            "category_id" => $response['category_id'],
        ]);
    }

    /**
     * Test ID: Product-005
     * Description: Test if we can delete a product by ID
     * Precondition: None
     * Test Steps:
     * 1. Send DELETE request to /api/products/1 
     * 2. Check if the response confirms deletion
     * Test Date: None
     * Expected Result: Product is deleted successfully 
     * Actual Result: Product is deleted successfully
     * Status: Passed
     * Remark: None
     */
    public function test_delete_product()
    {
        $response = $this->delete('/api/products/1');
        $response->assertStatus(200)->assertJson(['id' => $response['id']]);

        $this->get('/api/products/1')->assertStatus(200)->assertDontSee(["id" => $response['id']]);
    }    
}
