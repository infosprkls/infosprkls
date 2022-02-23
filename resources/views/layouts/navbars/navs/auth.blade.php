<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form action="{{ $titlePage=='companies'?route('companies.index'):'' }}" class="navbar-form">
        <div class="input-group no-border">
        <input type="text" name="mainSearch" value="{{ $titlePage=='Company Management' && session('mainSearch')?session('mainSearch'):'' }}" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav">
		@if(!auth()->user()->hasRole('user'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
            <p class="d-lg-none d-md-block">
              {{ __('Stats') }}
            </p>
          </a>
        </li>
		@endif
		<li class="nav-item">
			<a href="javascript:void(0);" class="a-bare" id="expand-compact" title="Expand/Compact"><i class="material-icons">code</i></a>
		</li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @impersonating
              <i style="color: red" class="material-icons">warning</i>
            @endImpersonating
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{route("profile.index")}}">{{ __('Profile') }}</a>
              @impersonating
                <a class="dropdown-item" href="{{ route('impersonate.leave') }}">{{ __('Stop impersonating user') }}</a>
              @endImpersonating
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
