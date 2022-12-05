<div class="row">
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-secondary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Cash</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
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

  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-success border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">people's debts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{ number_format( $wallets->where('name', 'people_debt')->first()->amount, 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-money-bill-wave fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-danger border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Your Debt</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{ number_format( $wallets->where('name', 'your_debt')->first()->amount, 2,",",".") }}
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
<hr>

<div class="row">
  {{-- loop foreach that show all wallet in auth user --}}
  @foreach ($wallets as $wallet)
    @if ($wallet->type === 'cash' || $wallet->type === 'debt')
      @continue
    @endif
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border {{ $wallet->type === 'bank' ? 'border-primary' : 'border-secondary' }} border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col">
              <div class="text-xs font-weight-bold text-uppercase mb-1 {{ $wallet->type === 'bank' ? 'text-primary' : 'text-secondary' }}">{{ $wallet->name }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format( $wallet->amount, 2,",",".") }}</div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-wallet fa-2x opacity-25"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  {{-- Create add card --}}
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-secondary shadow h-100 py-2" style="border: 1px dashed;">
      <div class="card-body d-flex justify-content-center">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold mb-1 text-uppercase text-secondary"></div>
            <a href="{{ route('wallets.create') }}" class="btn text-muted stretched-link">
              <i class="fa-solid fa-plus"></i> Add New Wallet
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>