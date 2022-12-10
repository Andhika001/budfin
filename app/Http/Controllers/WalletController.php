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
    $total = Wallet::where('user_id', Auth::id())->sum('amount');
    return view('wallets.index', [
      'title' => 'Wallet',
      'wallets' => $wallets,
      'total' => $total
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
    // update only amount
    $validatedData = $request->validate([
      'amount' => 'required'
    ]);

    // if validatedData name is your_debt then amount is negative
    if ($request['name'] == 'your_debt') {
      $validatedData['amount'] = -$validatedData['amount'];
    }

    if ($validatedData) {
      Wallet::where('id', $id)->update([
        'amount' => $validatedData['amount']
      ]);
    }

    return redirect('/wallets')->with('success', 'Wallet updated successfully');
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
    $validatedData = $request->validate([
      'ids' => 'required'
    ]);
    $ids = $validatedData['ids'];
    Wallet::whereIn('id', $ids)->delete();
    return redirect('/wallets')->with('success', 'Wallets deleted successfully');
  }
}
