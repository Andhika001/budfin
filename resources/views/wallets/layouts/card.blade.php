<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border border-primary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cash</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{-- show amount in wallets where name = cash --}}
              {{ number_format( $wallets->where('name', 'cash')->first()->amount, 2,",",".") }}
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">people's debts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-money-bill-wave fa-2x opacity-25"></i>
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
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Your Debt</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-hand-holding-dollar fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>