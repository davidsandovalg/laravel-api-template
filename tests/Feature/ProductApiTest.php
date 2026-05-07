<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_products(): void
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/products');

        $response->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_product(): void
    {
        $payload = [
            'name' => 'Mechanical Keyboard',
            'sku' => 'KEY-10001',
            'description' => 'Hot-swappable mechanical keyboard',
            'price' => 129.99,
            'stock' => 10,
            'is_active' => true,
        ];

        $response = $this->postJson('/api/v1/products', $payload);

        $response
            ->assertCreated()
            ->assertJsonPath('data.name', $payload['name'])
            ->assertJsonPath('data.sku', $payload['sku']);

        $this->assertDatabaseHas('products', [
            'sku' => 'KEY-10001',
        ]);
    }

    public function test_it_shows_a_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/v1/products/{$product->id}");

        $response
            ->assertOk()
            ->assertJsonPath('data.id', $product->id);
    }

    public function test_it_updates_a_product(): void
    {
        $product = Product::factory()->create();

        $payload = [
            'name' => 'Updated Product Name',
            'price' => 49.50,
        ];

        $response = $this->putJson("/api/v1/products/{$product->id}", $payload);

        $response
            ->assertOk()
            ->assertJsonPath('data.name', $payload['name'])
            ->assertJsonPath('data.price', $payload['price']);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $payload['name'],
        ]);
    }

    public function test_it_deletes_a_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/v1/products/{$product->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_it_validates_required_fields_when_creating_a_product(): void
    {
        $response = $this->postJson('/api/v1/products', []);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'sku', 'price']);
    }
}
