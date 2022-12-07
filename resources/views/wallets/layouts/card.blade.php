<div class="row">
  {{-- Cash Wallet --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-secondary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Cash</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="cash" ondblclick="updateWallet({{ $wallets->where('name', 'cash')->first()->id }}, 'cash')">Rp
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

  {{-- People's Debt --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-success border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">people's debts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pdebt" ondblclick="updateWallet({{ $wallets->where('name', 'people_debt')->first()->id }}, 'pdebt')">Rp
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

  {{-- Your Debt --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-danger border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Your Debt</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="ydebt" ondblclick="updateWallet({{ $wallets->where('name', 'people_debt')->first()->id }}, 'ydebt')">Rp
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

  {{-- Delete wallet card --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-secondary shadow h-100 py-2" style="border: 1px dashed;">
      <div class="card-body d-flex justify-content-center">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold mb-1 text-uppercase text-secondary"></div>
            <a href="" class="btn text-muted stretched-link" data-bs-toggle="modal" data-bs-target="#deleteWallet">
              <i class="fa-solid fa-trash"></i> Delete Wallet
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<hr>
{{-- {{ $wallet->type === 'bank' ? 'border-primary' : 'border-secondary' }} --}}
<div class="row">
  {{-- loop foreach that show all wallet in auth user --}}
  @foreach ($wallets as $wallet)
    @if ($wallet->type === 'cash' || $wallet->type === 'debt')
      @continue
    @endif
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border
      @if ($wallet->type === 'bank')
        border-primary
      @elseif ($wallet->type === 'ewallet')
        border-warning
      @elseif ($wallet->type === 'invested')
        border-success
      @endif
      border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col">
              <div class="text-xs font-weight-bold text-uppercase mb-1 {{ $wallet->type === 'bank' ? 'text-primary' : 'text-secondary' }}">{{ $wallet->name }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="{{ $wallet->id }}" ondblclick="updateWallet({{ $wallet->id }}, '{{ $wallet->id }}')">Rp {{ number_format( $wallet->amount, 2,",",".") }}</div>
            </div>
            <div class="col-auto">
              @if ($wallet->type === 'bank')
                <i class="fa-solid fa-building-columns fa-2x opacity-25"></i>
              @elseif ($wallet->type === 'ewallet')
                <i class="fa-solid fa-wallet fa-2x opacity-25"></i>
              @elseif ($wallet->type === 'invested')
                <i class="fa-solid fa-chart-line fa-2x opacity-25"></i>
              @endif
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
            <a href="" class="btn text-muted stretched-link" data-bs-toggle="modal" data-bs-target="#createWallet">
              <i class="fa-solid fa-plus"></i> Add New Wallet
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

{{-- Create Wallet Modal --}}
<div class="modal fade" id="createWallet" tabindex="-1" aria-labelledby="createWalletLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createWalletLabel">Add wallet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/wallets" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Wallet Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Wallet Name" required>
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Wallet Type</label>
            <select class="form-select" id="type" name="type">
              <option value="bank">Bank</option>
              <option value="ewallet">E-Wallet</option>
              <option value="invested">Invested</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
          </div>
          <button type="submit" class="btn btn-primary float-end mt-2">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Delete Wallet Modal --}}
<div class="modal fade" id="deleteWallet" tabindex="-1" aria-labelledby="deleteWalletLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteWalletLabel">Delete wallet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- form delete 1 or multiple data --}}
        <form action="/wallets/delete" method="POST">
          @csrf
          <p class="mb-3">Choose which wallet do you want to delete</p>
          <div class="mb-3">
            @foreach ($wallets as $wallet)
              @if ($wallet->type === 'cash' || $wallet->type === 'debt')
                @continue
              @endif
              {{-- make checkbox looks button --}}
              <div class="btn-group me-2 mb-3" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="id{{ $wallet->id }}" name="ids[{{ $wallet->id }}]" value="{{ $wallet->id }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="id{{ $wallet->id }}">{{ $wallet->name }}</label>
              </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-danger float-end mt-2" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // make button in modal delete checkable
  const btns = document.querySelectorAll('.btn-check');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.toggle('active');
    });
  });

  function updateWallet(id, idWallet) {
    let wallet = document.getElementById(idWallet);
    wallet.innerHTML = `
      <form action="/wallets/${id}" method="POST">
        @method('PUT')
        @csrf
        <input type="number" class="form-control form-control-sm" id="amount" name="amount" placeholder="amount" required>
        <button type="submit" class="visually-hidden">Update</button>
      </form>
    `;
  }
</script>
