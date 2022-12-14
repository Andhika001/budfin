@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>Reports</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('l, j F Y') }}</h6>
  </div>

  {{-- Balance, Incomes, Expenses, and Transaction --}}
  @include('layouts.card')

  {{-- List of Transactions --}}
  <div class="mb-4">
    @include('reports.layouts.table')
  </div>

@endsection
