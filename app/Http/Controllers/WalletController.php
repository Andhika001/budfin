<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::where('user_id', Auth::id())->get();
        return view('wallets.index', [
            'title' => 'Wallet',
            'wallets' => $wallets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if validation failed then redirect back with error
        $validatedData = $request->validate([
            // unique validation for wallet name for each user
            'name' => 'required|unique:wallets,name,NULL,id,user_id,' . auth()->user()->id,
            'type' => 'required',
            'amount' => 'required'
        ]);

        if ($validatedData) {
            Wallet::create([
                'user_id' => auth()->user()->id,
                'name' => $validatedData['name'],
                'type' => $validatedData['type'],
                'amount' => $validatedData['amount']
            ]);

            return redirect('/wallets')->with('success', 'Wallet created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyWallets(Request $request)
    {
        $wallets = Wallet::whereIn('id', $request->wallets)->get();
        foreach ($wallets as $wallet) {
            $wallet->delete();
        }
        return redirect('/wallets')->with('success', 'Wallets deleted successfully');
    }
}
