<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\KanyeQuoteManager;

/**
 * KanyeQuoteController
 */
class KanyeQuoteController extends Controller
{
        
    /**
     * kanyeQuoteManager
     *
     * @var mixed
     */
    protected $kanyeQuoteManager;
    
    /**
     * __construct
     *
     * @param KanyeQuoteManager $kanyeQuoteManager
     * @return void
     */
    public function __construct(KanyeQuoteManager $kanyeQuoteManager)
    {
        $this->kanyeQuoteManager = $kanyeQuoteManager;
    }
    
    /**
     * getQuotes
     *
     * @return JsonResponse
     */
    public function getQuotes(): JsonResponse
    {
        return $this->kanyeQuoteManager->getRandomQuotes();
    }
    
    /**
     * refreshQuotes
     *
     * @return JsonResponse
     */
    public function refreshQuotes(): JsonResponse
    {
        return $this->kanyeQuoteManager->refreshQuotes();  
    }
}
