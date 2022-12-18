<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border border-primary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Balances</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
              {{-- balance is default value add with incomes and substract with expense --}}
              {{ number_format( ( $user->balance ) + ( $user->transactions()->where('type', 'Income')->sum('amount')) - ( $user->transactions()->where('type', 'Expense')->sum('amount')), 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-sack-dollar fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border border-success border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Incomes</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
              {{-- sum all income transaction of auth user today --}}
              {{ number_format( $user->transactions()->where('type', 'Income')->sum('amount'), 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-hand-holding-dollar fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border border-danger border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expenses</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
              {{-- sum all income transaction of auth user today --}}
              {{ number_format( $user->transactions()->where('type', 'Expense')->sum('amount'), 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-cart-shopping fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border border-secondary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"># of Transaction</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{-- count all transaction of auth user today --}}
              {{ $user->transactions()->whereMonth('date', date('m'))->count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-hashtag fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function oldCards() {
    <div class="col-md-4">
      <div class="card text-white bg-primary bg-gradient mb-3">
        <div class="card-header">Balances</div>
        <div class="card-body">
          <h4 class="card-title">Rp
            {{-- balance is default value add with incomes and substract with expense --}}
            {{ number_format( ( $user->balance ) + ( $user->transactions()->where('type', 'Income')->sum('amount')) - ( $user->transactions()->where('type', 'Expense')->sum('amount')), 2,",",".") }}
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-success bg-gradient mb-3">
        <div class="card-header">Incomes</div>
        <div class="card-body">
          <h4 class="card-title">Rp
            {{-- sum all income transaction of auth user today --}}
            {{ number_format( $user->transactions()->where('type', 'Income')->whereDate('created_at', date('Y-m-d'))->sum('amount'), 2,",",".") }}
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-danger bg-gradient mb-3">
        <div class="card-header">Expenses</div>
        <div class="card-body">
          <h4 class="card-title">Rp
            {{-- sum all expense transaction of auth user today --}}
            {{ number_format( $user->transactions()->where('type', 'Expense')->whereDate('created_at', date('Y-m-d'))->sum('amount'), 2,",",".") }}
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card text-white bg-secondary bg-gradient mb-3">
        <div class="card-header text-center"># of Transaction</div>
        <div class="card-body">
          <h4 class="card-title text-center">
            {{-- count all transaction of auth user today --}}
            {{ $user->transactions()->whereDate('created_at', date('Y-m-d'))->count() }}
          </h4>
        </div>
      </div>
    </div>
  }
</script>
