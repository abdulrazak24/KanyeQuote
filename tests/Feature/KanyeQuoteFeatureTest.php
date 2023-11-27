<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KanyeQuoteFeatureTest extends TestCase
{
    public function testCanGetQuotes()
    {
        $response = $this->get('/api/kanye-quotes');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'quotes' => [],
            ]);
    }

    public function testCanRefreshQuotes()
    {
        $response = $this->get('/api/kanye-quotes/refresh');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'quotes' => [],
            ]);
    }
}
