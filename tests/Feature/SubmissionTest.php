<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the submission endpoint with valid data.
     *
     * @return void
     */
    public function test_submission_endpoint()
    {
        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Submission is being processed']);
    }

    /**
     * Test the submission endpoint with invalid data.
     *
     * @return void
     */
    public function test_submission_validation()
    {
        $response = $this->postJson('/api/submit', [
            'email' => 'john.doe@example.com',
        ]);

        $response->assertStatus(422)
                 ->assertJsonStructure(['errors' => ['name', 'message']]);
    }
}
