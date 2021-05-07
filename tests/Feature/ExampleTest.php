<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testPostingNewArticleShouldReturnOK() {
        $user = User::factory()->create();
        $user->save();

        $response = $this->actingAs($user)->post('articles', [
            'headline' => 'Test Article',
            'content' => 'Content for the test article.'
        ]);

        dd($response->exception);

        $response->assertStatus(200);
    }

    public function testIndexShouldGetPaginatedResults() {
    }
}
