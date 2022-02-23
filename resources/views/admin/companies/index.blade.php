@extends('layouts.app', ['activePage' => 'company-management', 'titlePage' => __('Company Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- new card header div -->
                    <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                        <div class="content-left d-flex flex-column flex-wrap">
                            <h4 class="card-title ">{{ __('Companies') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage companies') }}</p>
                        </div>

                        <div class="ml-auto content-right">

                            <a class="btn btn-secondary btn-custom tooltiped" href="{{ route('companies.create') }}"
                                onclick="showSwalAlert('Please upgrade your plan to open this functionality.','warning','auto-close')">
                                <i class="material-icons">add_box</i>
                                <span>
                                    {{ __('Add Company') }}
                                </span>

                                <!-- <div class="tooltip"> 
                                    <div class="arrow"></div> 
                                    <div class="tooltip-inner">Add user</div> 
                                </div> -->
                            </a>

                        </div>
                    </div>
                    <!-- end new card header div -->

                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12" id="toggleStatus">

                            </div>
                        </div>

                        <!-- START search company form -->
                        <form action="{{ route('companies.index') }}" id="searchForm"
                            class="row mx-0 my-3 w-100 justify-content-lg-end">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mr-auto">
                                <div class="dataTables_length" id="datatables_length">
                                    <label class="d-flex flex-row align-items-center mb-0">Show
                                        <select name="pagination" id="perPage" aria-controls="datatables"
                                            class="custom-select custom-select-sm form-control form-control-sm mx-3">
                                            <option value="10" {{ ($companies->perPage()) == '10' ? 'selected' : ''
                                                }}>10</option>
                                            <option value="25" {{ ($companies->perPage()) == '25' ? 'selected' : ''
                                                }}>25</option>
                                            <option value="50" {{ ($companies->perPage()) == '50' ? 'selected' : ''
                                                }}>50</option>
                                            <option value="100" {{ ($companies->perPage()) == '100' ? 'selected' : ''
                                                }}>100</option>
                                        </select> entries
                                    </label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 ml-auto">
                                <div class="search-field mb-2 mt-1 px-0">
                                    <span class="bmd-form-group">
                                        <div class="input-group d-flex align-items-center flex-wrap">
                                            <button type="submit" class="border-0 btn-just-icon p-0 mr-1">
                                                <i class="material-icons ">search</i>
                                            </button>
                                            <input name="companySearch" type="text"
                                                value="{{ app('request')->input('companySearch') }}"
                                                class="form-control p-0 " placeholder="Search...">
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <!-- END search company form -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Created By') }}
                                    </th>
                                    <th>
                                        {{ __('Contact User') }}
                                    </th>
                                    <th>
                                        {{ __('Creation date') }}
                                    </th>
                                    <th>
                                        {{ __('Total Created Users') }}
                                    </th>
                                    <th>
                                        {{ __('Remaining Quota') }}
                                    </th>
                                    <th>
                                        {{__('Company status')}}
                                    </th>
                                    <th>
                                        {{__('Projects status')}}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr>
                                        <td>
                                            <a href="{{route(" companies.show", $company)}}">{{ $company->name }}</a>
                                        </td>

                                        @if (isset($company->createdBy))
                                        <td>
                                            <a href="{{route('profile.show', $company->createdBy)}}">{{
                                                $company->createdBy->fullname }}</a>
                                        </td>
                                        @else
                                        <td>
                                            <p>Not Specified</p>
                                        </td>
                                        @endif
                                        @if (isset($company->contactUser))
                                        <td>
                                            <a href="{{route('profile.show', $company->contactUser)}}">{{
                                                $company->contactUser->fullname }}</a>
                                        </td>
                                        @else
                                        <td>
                                            <p>Not Specified</p>
                                        </td>
                                        @endif

                                        <td>
                                            {{ $company->created_at->format('Y-m-d') }}
                                        </td>
                                        <td>{{ App\Company::company_users($company->id) }}</td>
                                        <td>{{
                                            App\Company::subscription_users($company->id)-App\Company::company_users($company->id)
                                            }}</td>
                                        <td class="pl-5">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" onclick="toggle('company',this)"
                                                    id="{{$company->id}}" {{ $company->status == 1 ? "checked" : ""}} />
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="pl-5">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" onclick="toggle('projects',this)"
                                                    id="{{$company->id}}" {{ $company->project_status == 1 ? "checked" :
                                                ""}} />
                                                <span class="slider round"></span>
                                            </label>
                                        </td>

                                        <td class="td-actions text-right">
                                            <form action="{{ route('companies.destroy', $company) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('company-subscriptions', $company->id) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('companies.edit', $company) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title="" onclick="confirm('{{ __(" Are you
                                                    sure you want to delete this company?") }}') ?
                                                    this.parentElement.submit() : ''">
                                                            <i class=" material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer custom-pagination flex-wrap m-0 px-4">
                        @if (isset($companies))
                        @if(count($companies) > 0)
                        <p class="d-lg-inline-block text-secondary">Showing {{$companies->firstItem()}} to
                            {{$companies->lastItem()}} of {{$companies->total()}} entries.</p>
                        @if(app('request')->input('companySearch'))
                        @php
                        $companies->appends(['CompanySearch' => app('request')->input('companySearch')]);
                        @endphp
                        @endif
                        {{-- {{$companies->links()}} --}}
                        {{ $companies->links('vendor.pagination.custom') }}




                        @endif
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-script')
<script type="text/javascript">
    $(document).on('change' , '#perPage' , function(){
            $("#searchForm").submit();
        })
</script>


<script>
    function toggle(type,el){

           var id = el.id;
           var routeToPostTo = "/companies/"+id+"/toggle/"+type;
           var routeToPostTo =  routeToPostTo.replace('#/', '/');

           $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success:function(data){
                    if(type=='company'){
                        $("#toggleStatus").append( "<div class=\"alert alert-success alert-dismissible fade show\" id=\"toggleMessage\" role=\"alert\" >\n" +
                       "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                       "            <span class=\"material-icons\">close</span>\n" +
                       "        </button>\n" +
                       "        <span>The company's status is changed!</span>\n" +
                       "    </div>" );
                    }else{
                        $("#toggleStatus").append( "<div class=\"alert alert-success alert-dismissible fade show\" id=\"toggleMessage\" role=\"alert\" >\n" +
                       "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                       "            <span class=\"material-icons\">close</span>\n" +
                       "        </button>\n" +
                       "        <span>The company's projects status is changed!</span>\n" +
                       "    </div>" );
                    }
                    
                   hideAlert();
               }
           });
       }
       
       function hideAlert(id) {
            $('#toggleMessage').delay(3500).slideUp(300).delay(350,function () {
                $(this).remove();
            });
       }
</script>
@endsection