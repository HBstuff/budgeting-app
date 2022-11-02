<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class NewsController extends Controller
{
    public function index() {
        return view('components.news', [
            'news' => Http::retry(3, 100)->pool(fn (Pool $pool) => [
                $pool->as('financial-news')->get('https://query1.finance.yahoo.com/v1/finance/search?q=financial-news'),
                $pool->as('latest-news')->get('https://query1.finance.yahoo.com/v1/finance/search?q=news'),
            ]),
            'crypto' => Http::retry(3, 100)->get('https://api2.binance.com/api/v3/ticker/24hr')
        ]);   
    }
}

