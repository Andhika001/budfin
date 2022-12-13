@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>Reports</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('l, j F Y') }}</h6>
  </div>

  {{-- Balance, Incomes, Expenses, and Transaction --}}
  @include('layouts.card')

  {{-- List of Transaction Today --}}
  <div class="card mt-3">
    <div class="card-header">
      Today Transactions
    </div>
    <div class="card-body">
      @include('layouts.table')
    </div>
  </div>

@endsection
