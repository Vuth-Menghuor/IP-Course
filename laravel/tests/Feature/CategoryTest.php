<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test ID: Category-001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test Steps: 
     * 1. Hit the get all categories api
     * 2. Check if the response status is 200
     * Test Date: None        
     * Excepted Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_access_get_all_categories_api(): void
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200)->assertJsonCount(Category::count()); 
    }
    // checks that the JSON response contains the same number of elements
    // retrieves the total number of categories from the database.
    
    /**
     * Test ID: Category-002
     * Description: Test if we can create a new category.
     * Precondition: None
     * Test Steps: 
     * 1. Send POST request to /api/categories with name: test_category_01
     * 2. Check if the response status is 201 and name is correct
     * Test Date : None
     * Excepted Category is created and returned with the correct name
     * Actual Category is created and returned with the correct name
     * Status: Passed
     * Remark: None
     */            
    public function test_if_we_can_create_a_new_category(): void
    {
        $response = $this->postJson('/api/categories', [
            'name' => 'test_category_01',
        ]);
        $response->assertStatus(201)->assertJson(['name' => 'test_category_01']);
    }

    /**
     * Test ID: Category-003
     * Description: Test if we can get a specific category by ID.
     * Precondition: A category with specific ID exits
     * Test Steps: 
     * 1. Send GET request to /api/categories/1
     * 2. Check if the response status is 200 and contains the correct ID
     * Test Date : None
     * Excepted Result: The correct category with ID 1 is returned
     * Actual Result: The correct category with ID 1 is returned
     * Status: Passed
     * Remark: None
     */            
    public function test_if_we_can_get_specific_category_by_id(): void
    {
        $response = $this->get('/api/categories/1');
        $response->assertStatus(200)->assertJson(['id' => 1]);
    }

    /**
     * Test ID: Category-004
     * Description: Test if we can update an existing category.
     * Precondition: A category with specific ID exits
     * Test Steps: 
     * 1. Send PATCH request to /api/categories/1 with new name
     * 2. Check if the response status is 200 and name is updated
     * Test Date : None
     * Excepted Result: The category is updated with the new name
     * Actual Result: The category is updated with the new name
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_update_a_category(): void
    {
        $response = $this->patch('/api/categories/1',[ 
            'name' => 'updated_category',
        ]);
        $response->assertStatus(200)->assertJson([
            'name' => 'updated_category'
        ]);
    }
    
    /**
     * Test ID: Category-005
     * Description: Test if we can delete a category by ID.
     * Precondition: A category with specific ID exits
     * Test Steps: 
     * 1. Send DELETE request to /api/categories/1
     * 2. Check if the response confirms deletion
     * Test Date : None
     * Excepted Result: The category is deleted successfully
     * Actual Result: The category is deleted successfully
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_delete_a_category(): void
    {
        $response = $this->delete('/api/categories/1');
        $response->assertStatus(200)->assertJson(['id' => $response['id']]);

        $this->get('/api/categories/1')->assertDontSee([
            'id' => $response['id']
        ]);
    }
}
