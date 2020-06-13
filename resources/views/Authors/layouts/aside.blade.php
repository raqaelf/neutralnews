<aside class="aside aside-fixed">
    <div class="aside-header">
      <a href="{{ route('dashboard') }}" class="aside-logo">Neutral<span>News</span></a>
      <a href="" class="aside-menu-link">
        <i data-feather="menu"></i>
        <i data-feather="x"></i>
      </a>
    </div>
    <div class="aside-body">
      <div class="aside-loggedin">
        <div class="d-flex align-items-center justify-content-start">
          <a href="#" class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></a>
          <div class="aside-alert-link">
            <a href="{{ route('logout') }}" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
          </div>
        </div>
        <div class="aside-loggedin-user">
          <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
            <h6 class="tx-semibold mg-b-0">{{ auth()->user()->name }}</h6>
          </a>
        <p class="tx-color-03 tx-12 mg-b-0">{{ auth()->user()->role }}</p>
        </div>
      </div>
      <ul class="nav nav-aside">
        <li class="nav-label">Dashboard</li>
        <li class="nav-item {{ request()->is('*/post') ? 'active' : '' }}">
        <a href="{{ route('post.index') }}" class="nav-link">
            <i data-feather="image"></i> <span>Post Management</span>
          </a>
        </li>
        <li class="nav-item {{ request()->is('*/category') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link">
                <i data-feather="image"></i> <span>Category Management</span>
              </a>
            </li>
        {{-- <li class="nav-item with-sub {{ request()->is('*/article') ? 'active show' : (request()->is('*/category') ? 'active show' : '') }}">
          <a href="{{ route('category.index') }}" class="nav-link"><i data-feather="layers"></i> <span>Category Management</span></a>
          <ul>
            <li class="{{ request()->is('*/article') ? 'active' : '' }}"><a href="#">Article</a></li>
            <li class="{{ request()->is('*/category') ? 'active' : '' }}"><a href="#">Category</a></li>
          </ul>
        </li> --}}

        <li class="nav-item">
        </li>
      </ul>
    </div>
  </aside>
