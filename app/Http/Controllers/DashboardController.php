<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'user' => auth()->user(),
            'transactions' => Transaction::all(),
            'categories' => Category::all()
        ]);
    }
}
