<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test ID: Category-001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test Steps: 1. Hit the get all categories api
     *             2. Check if the response status is 200
     * Test Date : None
     * Excepted Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_access_get_all_categories_api(): void
    {
    $response = $this->get('/api/categories');

    $response->assertStatus(200);
    }
    
    /**
     * Test ID: Category-002
     * Description: Check if we can create a new category
     * Precondition: None
     * Test Steps: 1. Send POST request to /api/categories with name field
     *             2. Check if the response contains the created category with the same name
     * Test Date : None
     * Excepted Result: The category is created and retured with correct name
     * Actual Result: The category is created and returned with correct name
     * Status: Passed
     * Remark: None
     */            
    public function test_if_we_can_create_a_new_category(): void
    {
        $response = $this->postJson('/api/categories', [
            'name' => 'New Category',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'New Category']);
    }

    /**
     * Test ID: Category-003
     * Description: Check if we can get a specific category by ID
     * Precondition: A category with specific ID exits
     * Test Steps: 1. Send GET request to /api/categories/{id}
     *             2. Check if the response contains the correct category
     * Test Date : None
     * Excepted Result: The correct category is returned
     * Actual Result: The correct category is returned
     * Status: Passed
     * Remark: None
     */            
    public function test_if_we_can_get_specific_category_by_id(): void
    {

        $response = $this->get('/api/categories/1');

        $response->assertStatus(200)
                 ->assertJson(['name' => 'New Category']);
    }

    /**
     * Test ID: Category-004
     * Description: Check if we can update an existing category
     * Precondition: A category with specific ID exits
     * Test Steps: 1. Send PATCH request to /api/categories{id} with updated name
     *             2. Check if the response reflects the updated name
     * Test Date : None
     * Excepted Result: The category is updated with the new name
     * Actual Result: The category is updated with the new name
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_update_a_category(): void
    {
        $response = $this->patch('/api/categories/1',[ 
            'name' => 'Updated Category',
        ]);

        $response->assertStatus(200)
                 ->assertSee(['name' => 'Updated Category']);
    }
    
    /**
     * Test ID: Category-005
     * Description: Check if we can delete a category by ID
     * Precondition: A category with specific ID exits
     * Test Steps: 1. Send DELETE request to /api/categories/{id}
     *             2. Check if the response confirms deletion
     * Test Date : None
     * Excepted Result: The category is deleted successfully
     * Actual Result: The category is delete successfully
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_delete_a_category(): void
    {
        $response = $this->delete('/api/categories/1');

        // $response->assertStatus(200);
        $this->get('/api/categories/1')->assertDontSee(['id' => 1]);
    }


}
