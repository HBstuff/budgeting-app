<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('newsletters')]
        ]);

        Newsletter::create($formFields);

        return back()->with('message', 'Thank you for subscribing to our newsletter.');
    }
}
