<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <h6><i class="fa-solid fa-house"></i> Dashboard</h6>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('transactions', 'transactions*') ? 'active' : '' }}" href="/transactions">
          <h6><i class="fa-solid fa-money-bill-transfer"></i> All Transactions</h6>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('wallets') ? 'active' : '' }}" href="/wallets">
          <h6><i class="fa-solid fa-wallet"></i> Wallet</h6>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('reports') ? 'active' : '' }}" href="/reports">
          <h6><i class="fa-solid fa-chart-line"></i> Reports</h6>
        </a>
    </ul>

    {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
      <span>Saved reports</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle" class="align-text-bottom"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Year-end sale
        </a>
      </li>
    </ul> --}}

    <div class="position-absolute bottom-0 mb-2">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Account</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <div class="btn-group dropup">
            <button class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent">
              <i class="fa-solid fa-user"></i> Profile
            </button>
            <ul class="dropdown-menu">
              <li class="nav-item">
                <a class="nav-link" href="/profile">
                  <i class="fa-solid fa-gear"></i> Setting
                </a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="post">
                  @csrf
                  <button class="nav-link border-0" type="submit" style="background-color:transparent">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
