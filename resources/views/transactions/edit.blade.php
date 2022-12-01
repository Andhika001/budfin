@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>Edit</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('j F Y') }}</h6>
  </div>

  {{-- Income --}}
  @if (Request::is('transactions/*/edit') && $transactions->type == 'income')
    <div class="card card-body">
      <form class="row" action="/transactions/{{ $transactions->id }}" method="post">
        @method('put')
        @csrf
        <div class="col-md-2">
          <label for="category" class="visually-hidden">Category</label>
          <select class="form-select" name="category" id="category">
            <option value="{{ $transactions->category->id }}" selected hidden>{{ $transactions->category->name }}</option>
            @foreach ($categories->where('type', 'income') as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label for="description" class="visually-hidden">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{ old('description', $transactions->description) }}" required>
        </div>
        <div class="col-md-3">
          <label for="amount" class="visually-hidden">Amount</label>
          <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" value="{{ old('amount', $transactions->amount) }}" required>
        </div>
        <div class="col-md-2">
          <label for="date" class="visually-hidden">Date</label>
          <input type="date" class="form-control" id="date1" name="date" value="{{ $transactions->date }}">
        </div>
        <div class="col-md-2 d-grid">
          <input type="text" class="visually-hidden" id="type" name="type" value="income">
          <button type="submit" class="btn btn-success">Update Income</button>
        </div>
      </form>
    </div>
  @endif
  
  {{-- Expense --}}
  @if (Request::is('transactions/*/edit') && $transactions->type == 'expense')
    <div class="card card-body">
      <form class="row" action="/transactions/{{ $transactions->id }}" method="post">
        @method('put')
        @csrf
        <div class="col-md-2">
          <label for="category" class="visually-hidden">Category</label>
          <select class="form-select" name="category" id="category">
            <option value="{{ $transactions->category->id }}" selected hidden>{{ $transactions->category->name }}</option>
            @foreach ($categories->where('type', 'income') as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label for="description" class="visually-hidden">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{ old('description', $transactions->description) }}" required>
        </div>
        <div class="col-md-3">
          <label for="amount" class="visually-hidden">Amount</label>
          <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" value="{{ old('amount', $transactions->amount) }}" required>
        </div>
        <div class="col-md-2">
          <label for="date" class="visually-hidden">Date</label>
          <input type="date" class="form-control" id="date1" name="date" value="{{ $transactions->date }}">
        </div>
        <div class="col-md-2 d-grid">
          <input type="text" class="visually-hidden" id="type" name="type" value="expense">
          <button type="submit" class="btn btn-danger">Update Expense</button>
        </div>
      </form>
    </div>
  @endif

@endsection
