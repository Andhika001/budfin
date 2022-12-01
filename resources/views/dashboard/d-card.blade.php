<div class="row">
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
</div>