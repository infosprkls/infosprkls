<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a class="simple-text logo-normal">
            @auth()
                {{auth()->user()->fullname}}
            @endauth
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'license-agreement' ? ' active' : '' }}">
                <a class="nav-link d-flex flex-wrap align-items-center" href="{{ route('useraccept.create') }}">
                    <i class="material-icons mr-3">description</i>
                    <p>{{ __('License Agreement') }}</p>
                </a>
            </li>
			
        </ul>
    </div>
</div>
