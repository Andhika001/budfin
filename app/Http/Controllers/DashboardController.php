<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        // return view('dashboard.dashboard', [
        //     'title' => 'Dashboard',
        //     'user' => auth()->user(),
        //     'transactions' => Transaction::all(),
        //     'categories' => Category::all()
        // ]);

        $transactions = Transaction::where('user_id', Auth::id())->whereDate('date', date('Y-m-d'))->with('category')->orderBy('date', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.index', [
            'title' => 'Transaction',
            'user' => auth()->user(),
            'transactions' => $transactions,
            'categories' => Category::all()
        ]);

    }
}
