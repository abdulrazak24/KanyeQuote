<?php

/**
 * KanyeQuoteManager class to generate random 5 quotes
 * @
 * 
 */
namespace App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

/**
 * KanyeQuoteManager
 */
class KanyeQuoteManager
{
        
    /**
     * apiUrl
     *
     * @var string
     */
    protected $apiUrl = 'https://api.kanye.rest/quotes';

        
    /**
     * getRandomQuotes
     *
     * @param  int $count number of quotes
     * @return JsonResponse
     */
    public function getRandomQuotes($count = 5)
    {
        $cachedQuotes = Cache::get('kanye_quotes', []);
        // Check if there are already enough quotes in the cache
        if (count($cachedQuotes) >= $count) {
            return response()->json(['quotes' => $cachedQuotes]);
        }
        // Fetch additional quotes from the external API
        for ($i = 0; $i < $count; $i++) {
            $response = Http::get($this->apiUrl);

            if ($response->successful()) {
                $quote = $response->json()['quote'];
                $cachedQuotes[] = $quote;
            } else {
                throw new \RuntimeException('Unexpected response');
            }
        }

        // Update the cache with the stacked quotes
        Cache::put('kanye_quotes', $cachedQuotes, 30);

        return response()->json(['quotes' => $cachedQuotes]);
    }

        
    /**
     * refreshQuotes
     *
     * @param  mixed $count
     * @return void
     */
    public function refreshQuotes($count = 5)
    {
        Cache::clear();
        return $this->getRandomQuotes($count);
    }
        
}