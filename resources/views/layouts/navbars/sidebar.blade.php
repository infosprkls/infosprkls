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
            @if(auth()->user()->hasRole('user'))
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
			<li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
			<a class="nav-link" href="{{ route('profile.index') }}">
				<i class="material-icons">person</i>
				<p>{{ __('Profile') }}</p>
			</a>
            </li>
			@else
			<li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
			@endif
            @if(auth()->user()->hasRole('super admin'))
            <li class="nav-item{{ $activePage == 'projects' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('projects.index')}}">
                    <i class="material-icons">assignment</i>
                    <p>{{ __('Projects') }}</p>
                </a>
            </li>
            
            <!-- <li class="nav-item {{ $activePage == 'company-pdfs' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('pdfs.index')}}">
                    <i class="material-icons">assignment</i>
                    <p>{{ __('Pdfs') }}</p>
                </a>
            </li> -->
            @elseif(!auth()->user()->hasRole('super admin') && auth()->user()->company->status!=0 && auth()->user()->company->project_status!=0)
            <li class="nav-item{{ $activePage == 'projects' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('projects.index')}}">
                    <i class="material-icons">assignment</i>
                    <p>{{ __('Projects') }}</p>
                </a>
            </li>
            @endif
			@if(auth()->user()->hasRole('ai support') or auth()->user()->hasRole('super admin'))
                <!-- <li class="nav-item{{ $activePage == 'xml-docs' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('xml.index')}}">
                        <i class="material-icons">description</i>
                        <p>{{ __('XML Docs') }}</p>
                    </a>
                </li> -->

            @endif
            @if(auth()->user()->hasRole('super admin'))
                <li class="nav-item">
                  <a class="nav-link collapsed" data-toggle="collapse" href="#collapse_nav">
                    <i class="material-icons">assignment</i>
                    <p> Project Management
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $activePage == 'ai-projects' ? ' show' : '' }}" id="collapse_nav">
                    <ul class="nav">
                      <li class="nav-item">
                         <a class="nav-link d-flex align-items-center" href="/ai-projects/complete">
                                <i class="material-icons">assignment</i>
                                <span>{{ __('Our Projects') }}</span>
                            </a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link d-flex align-items-center" href="/ai-projects/performa">
                                <i class="material-icons">assignment</i>
                                <span>{{ __('WBSO Proforma') }}</span>
                            </a>
                      </li>
                    </ul>
                  </div>
                </li>


                <li class="nav-item{{ $activePage == 'xml-downloads' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('pdf.xml.downloads')}}">
                        <i class="material-icons">download_done</i>
                        <p>{{ __('Download Xml Logs') }}</p>
                    </a>
                </li>

            @endif
            @if(auth()->user()->hasRole('super user') or auth()->user()->hasRole('super admin'))
                <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="material-icons">person</i>
                        <p>{{ __('User Management') }}</p>
                    </a>
                </li>
                <!--
                <li data-color="purple" class="nav-item {{ $activePage == 'company-documents' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('companyattachments.index')}}">
                        <i class="material-icons">assignment</i>
                        <p>{{ __('Documents') }}</p>
                    </a>
                </li>
                <li data-color="purple" class="nav-item{{ $activePage == 'company-invoices' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('invoice.index')}}">
                        <i class="material-icons">assignment</i>
                        <p>{{ __('Invoices') }}</p>
                    </a>
                </li> -->
            @endif
            @can('see all companies')
                <li data-color="purple" class="nav-item{{ $activePage == 'company-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('companies1.index')}}">
                        <i class="material-icons">account_balance</i>
                        <p>{{ __('Company Management') }}</p>
                    </a>
                </li>
            @endcan
			@if(false)
            <li class="nav-item{{ $activePage == 'contact' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('contact.index')}}">
                    <i class="material-icons">contact_support</i>
                    <p>{{ __('Contact Support') }}</p>
                </a>
            </li>
            @role('super admin')
            <li data-color="purple" class="nav-item{{ $activePage == 'debugging' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('telescope')}}">
                    <i class="material-icons">zoom_in</i>
                    <p>{{ __('Debugging / Telescope') }}</p>
                </a>
            </li>
            @endrole
			@endif
            <!-- @if(auth()->user()->hasRole('super user'))
            <li class="nav-item{{ $activePage == 'pricing' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pricing') }}">
                    <i class="material-icons">attach_money</i>
                    <p>{{ __('Pricing') }}</p>
                </a>
            </li>
            @endif -->
            
            @role('super user')
            <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#collapse_nav">
                <i class="material-icons">content_paste</i>
                <p> Tools
                  <b class="caret"></b>
                </p>
              </a>
              <div class="collapse {{ $activePage == 'wbso-calculator' ? ' show' : '' }}" id="collapse_nav">
                <ul class="nav">
                  <li class="nav-item active ">
                     <a class="nav-link d-flex align-items-center" href="{{route('wbso-calculator.create')}}">
		                    <span class="material-icons mr-4">calculate</span>
		                    <span>{{ __('WBSO Calculator') }}</span>
		                </a>
                  </li>
                </ul>
              </div>
            </li>
                @endrole
                <!--
                <li data-color="purple" class="nav-item {{ $activePage == 'company-documents' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('companyattachments.index')}}">
                        <i class="material-icons">assignment</i>
                        <p>{{ __('Documents') }}</p>
                    </a>
                </li>
                <li data-color="purple" class="nav-item{{ $activePage == 'company-invoices' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('invoice.index')}}">
                        <i class="material-icons">assignment</i>
                        <p>{{ __('Invoices') }}</p>
                    </a>
                </li> -->
            
            <li class="nav-item{{ $activePage == 'support' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('supports.create') }}">
                    <i class="material-icons">help</i>
                    <p>{{ __('Support') }}</p>
                </a>
            </li>
            @role('super admin')
            <li class="nav-item{{ $activePage == 'setting' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <i class="material-icons">help</i>
                    <p>{{ __('Settings') }}</p>
                </a>
            </li>
            @endrole
        </ul>
    </div>
</div>
