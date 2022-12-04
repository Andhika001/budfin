{{-- Income --}}
<div class="card card-body">
  <form class="row" action="/transactions" method="post">
    @csrf
    <div class="mb-md-0 mb-3 col-md-2">
      <label for="category" class="visually-hidden">Category</label>
      <select class="form-select" name="category" id="category">
        @foreach ($categories->where('type', 'income') as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-md-0 mb-3 col-md-3">
      <label for="description" class="visually-hidden">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Description" name="description" required>
    </div>
    <div class="mb-md-0 mb-3 col-md-3">
      <label for="amount" class="visually-hidden">Amount</label>
      <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" required>
    </div>
    <div class="mb-md-0 mb-3 col-md-2">
      <label for="date" class="visually-hidden">Date</label>
      <input type="date" class="form-control" id="date1" name="date">
    </div>
    <div class="mb-md-0 mb-3 col-md-2 d-grid">
      <input type="text" class="visually-hidden" id="type" name="type" value="income">
      <button type="submit" class="btn btn-success">Add Income</button>
    </div>
  </form>
</div>

{{-- Expense --}}
<div class="card card-body mt-3">
  <form class="row" action="/transactions" method="post">
    @csrf
    <div class="mb-md-0 mb-3 col-md-2">
      <label for="category" class="visually-hidden">Category</label>
      <select class="form-select" name="category" id="category">
        @foreach ($categories->where('type', 'expense') as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-md-0 mb-3 col-md-3">
      <label for="description" class="visually-hidden">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Description" name="description" required>
    </div>
    <div class="mb-md-0 mb-3 col-md-3">
      <label for="amount" class="visually-hidden">Amount</label>
      <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" required>
    </div>
    <div class="mb-md-0 mb-3 col-md-2">
      <label for="date" class="visually-hidden">Date</label>
      <input type="date" class="form-control" id="date2" name="date">
    </div>
    <div class="mb-md-0 mb-3 col-md-2 d-grid">
      <input type="text" class="visually-hidden" id="type" name="type" value="expense">
      <button type="submit" class="btn btn-danger">Add Expense</button>
    </div>
  </form>
</div>

@if (session()->has('success'))
  <div class="alert alert-success mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<script>
  // add function default value to date
  let today = new Date();
  let dd = String(today.getDate()).padStart(2, '0');
  let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  let yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  document.getElementById("date1").value = today;
  document.getElementById("date2").value = today;
</script>