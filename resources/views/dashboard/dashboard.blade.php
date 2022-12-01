@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>Welcome back, {{ auth()->user()->name }}</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('l, j F Y') }}</h6>
  </div>

  {{-- Balance, Incomes, Expenses, and Transaction --}}
  @include('dashboard.d-card')

  {{-- Add Income and Expense --}}
  @include('dashboard.create')

  {{-- List of Transaction Today --}}
  @include('dashboard.table')

@endsection