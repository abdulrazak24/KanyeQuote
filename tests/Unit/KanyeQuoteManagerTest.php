<?php

use App\KanyeQuoteManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class KanyeQuoteManagerTest extends TestCase
{
    protected $kanyeQuoteManager;

    public function setUp(): void
    {
        parent::setUp();
        $this->kanyeQuoteManager = new KanyeQuoteManager();
        Artisan::call('cache:clear');
        
    }

    /** @test */
    public function it_can_get_random_quotes_from_external_api()
    {
        Http::fake([
            'https://api.kanye.rest/quotes' => Http::response(['quote' => 'Test Quote'], 200),
        ]);
        $response = $this->kanyeQuoteManager->getRandomQuotes();
        echo $response;

        $this->assertEquals(
            [
                'quotes' => 
                ['Test Quote','Test Quote','Test Quote','Test Quote','Test Quote']], 
                $response->getData(true)
            );
        Http::assertSentCount(5); // Ensure the external API is called 5 times
    }

    /** @test */
    public function it_can_refresh_quotes_by_clearing_cache()
    {
        Http::fake([
            'https://api.kanye.rest/quotes' => Http::response(['quote' => 'Old Quote'], 200),
        ]);
        $response = $this->kanyeQuoteManager->refreshQuotes();

        $this->assertEquals(
            [
                'quotes' => 
                ['Old Quote','Old Quote','Old Quote','Old Quote','Old Quote']], 
                $response->getData(true)
            );
        Http::assertSentCount(5); 
    }
}
