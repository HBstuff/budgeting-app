<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        return view('landing.index', []);
    }

    public function example() {
        return view('landing.example', []);
    }
}
