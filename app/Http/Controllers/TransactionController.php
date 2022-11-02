<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    // Show Stats Page
    public function index() {
        return view('components.stats', [
            'statistics' => auth()->user()->transactions()->filter(request(['chart-start-date', 'chart-end-date']))->get(),
            'latest' => auth()->user()->transactions()->latest()->take(8)->get()
        ]);
    }

    // Show Transactions
    public function transactions() {
        return view('components.transactions', [
            'transactions' => auth()->user()->transactions()
            ->filter(request(['filter-amount1', 'filter-amount2', 'filter-date1', 'filter-date2', 'filter-category', 'filter-description']))
            ->paginate(25),
            'categories' => auth()->user()->categories()->get()
                // ->filter(request(['tag', 'search']))
                // ->paginate(6) // use get or paginate
        ]);
    }

    // Store Transaction
    public function store(Request $request) { // removed Transaction $transaction
        $formFields = $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'category' => 'required',
            'description' => 'nullable'
        ]);

        $formFields['user_id'] = auth()->id();

        Transaction::create($formFields);

        // return redirect('/')->with('message', 'Listing created successfully!');
        return back();
    }

    // Delete Listing
    public function destroy(Transaction $transaction) {
        if($transaction->user_id != auth()->id()) {
            abort(403, 'Unautorized acction');
        }

        $transaction->delete();
        return back()->with('message', 'Expense deleted seccessfully.');
    }
}
