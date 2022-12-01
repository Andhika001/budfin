@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>All Transactions</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('j F Y') }}</h6>
  </div>


  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- if user click edit where transactions type is income then show edit view only income
  @if (Request::is('transactions/*/edit'))
    @include('transactions.edit')
  @endif --}}

  {{-- List of Transaction All Time --}}
  @include('transactions.layouts.table')
  
@endsection