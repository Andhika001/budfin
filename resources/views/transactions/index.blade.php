@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>All Transactions</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('j F Y') }}</h6>
  </div>

  @if (session()->has('success'))
    <div class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>{{ session('success') }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Ok</button>
          </div>
        </div>
      </div>
    </div>
  @endif

  {{-- if user click edit where transactions type is income then show edit view only income
  @if (Request::is('transactions/*/edit'))
    @include('transactions.edit')
  @endif --}}

  {{-- List of Transaction All Time --}}
  @include('transactions.layouts.table')
  
@endsection