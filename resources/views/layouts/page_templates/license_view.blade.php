<div class="wrapper ">
  @include('layouts.navbars.license_view_sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.license')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>