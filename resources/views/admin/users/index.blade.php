@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
@section('page-script-head')
<link href="{{ asset('material') }}/css/style.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$errors->first()}}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                          <div class="content-left d-flex flex-column flex-wrap">
                            <h4 class="card-title ">{{ __('Users') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage users') }}</p>
                          </div>
                            
                          <div class="ml-auto content-right">
                            @if(isset($company_sub_users) && isset($company_users) && $company_sub_users<=$company_users || (isset(auth()->user()->company) && auth()->user()->company->status==0))
                            <a class="btn btn-secondary btn-custom tooltiped" href="javascript:void(0);" onclick="showSwalAlert('Please upgrade your plan to open this functionality.','warning','auto-close')">
                                <i class="material-icons">add_box</i>
                                <span>
                                     {{ __('Add user') }}
                                </span>
                               
                                <!-- <div class="tooltip"> 
                                    <div class="arrow"></div> 
                                    <div class="tooltip-inner">Add user</div> 
                                </div> -->
                            </a>


                            @else

                            <a class="btn btn-secondary btn-custom tooltiped" href="{{ route('users.create') }}">
                                <i class="material-icons">add_box</i>
                                <span>
                                     {{ __('Add user') }}
                                </span>
                               
                                <!-- <div class="tooltip"> 
                                    <div class="arrow"></div> 
                                    <div class="tooltip-inner">Add user</div> 
                                </div> -->
                            </a>
                            @endif


                              


                          </div>
                        </div>


                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert {{(session('status')=='You do not have the required permissions to complete this action.') ? 'alert-danger' : 'alert-success'}}">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- <div class="row">
                                
                            </div> -->

                            <form action="{{ route('users.index') }}" id="searchForm" class="row mx-0 my-3 w-100 justify-content-lg-end">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mr-auto">
                                <div class="dataTables_length" id="datatables_length">
                                    <label class="d-flex flex-row align-items-center mb-0">Show 
                                        <select name="pagination" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm mx-3">
                                            <option value="10" {{ ($users->perPage()) == '10' ? 'selected' : '' }}>10</option>
                                            <option value="25" {{ ($users->perPage()) == '25' ? 'selected' : '' }}>25</option>
                                            <option value="50" {{ ($users->perPage()) == '50' ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ ($users->perPage()) == '100' ? 'selected' : '' }}>100</option>
                                        </select> entries
                                    </label>
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('super admin'))
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 search-field mb-2 mt-1">
                                <div class="dropdown bootstrap-select">
                                    <select name="company" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Select">
                                        <option disabled selected>Single Option</option>

                                        @foreach($companies as $company)
                                        <option {{ (app('request')->input('company')==$company->id)?'SELECTED':'' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 search-field mb-2 mt-1 px-0">
                                <span class="bmd-form-group">
                                    <div class="input-group d-flex align-items-center flex-wrap">
                                      <button type="submit" class="border-0 btn-just-icon p-0 mr-1">
                                      <i class="material-icons ">search</i>
                                    </button>
                                    <input name="user" type="text" value="{{ app('request')->input('user') }}" class="form-control p-0 " placeholder="Search...">
                                    </div>
                                  </span>
                              </div>
                            </form>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Role') }}
                                    </th>
                                    <th>
                                        {{ __('Financial Access') }}
                                    </th>
                                    <th>
                                        {{ __('License') }}
                                    </th>
                                    <th>
                                    {{ __('Company') }}
                                    </th>
                                    <!--<th>
                                    {{ __('Company_id') }}
                                    </th>-->
                                    <th>
                                        {{ __('Creation date') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($users as $user)
                                        
                                        <tr>
                                            <td>
                                                <a href="{{route('profile.show', $user->id)}}">{{ $user->firstname ." ". $user->lastname }}</a>
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ ($user->role_id==1)?'Super Admin':($user->role_id==2?'AI Support':($user->role_id==3?'Super User':($user->role_id==4?'User':'Employee'))) }}
                                            </td>
                                            <td>
                                                {{ ($user->financial_access==1? 'Yes':'No') }}
                                            </td>
                                            <td>
                                                {{ ($user->is_accept==1)?'Yes' : 'No' }}
                                            </td>
                                            <td>
                                                @if(isset($user->company->name))
                                                {{ $user->company->name }}
                                                @elseif(isset($user->company))
                                                {{ $user->company}}
                                                @else
                                                {{ 'super admin' }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->created_at }}
                                            </td>

                                            <td class="td-actions text-right">
                                                @if ($user->id != auth()->id())
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        @if(isset($user->role_id) && $user->role_id=="3" && auth()->user()->hasRole('super user'))
                                                        <a style="display: none;" rel="tooltip" class="btn btn-success btn-linka"
                                                           onclick="alert('You dont have permission to edit');"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button style="display: none;" type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                onclick="alert('You dont have permission to delete');">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        @else
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                           href="{{ route('users.edit', $user->id) }}"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                onclick="showSwalAlert('','','warning-message-and-confirmation',this)">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                         <!-- <button type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div> -->
                                                        </button>
                                                        @endif
                                                    </form>
                                                @else
                                                    {{--<a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">--}}
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer custom-pagination flex-wrap m-0 px-4">
                            
                            @if (isset($users))
                                @if(count($users) > 0)
                                    <p class="d-lg-inline-block text-secondary">Showing {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} entries.</p>
                                    @if(app('request')->input('user'))
                                        @php
                                            $users->appends(['user' => app('request')->input('user')]);
                                        @endphp
                                    @endif
                                    @if( app('request')->input('company'))
                                        @php
                                            $users->appends(['company' => app('request')->input('company')]);
                                        @endphp
                                    @endif
                                    {{-- {{ $users->appends(['pagination' => $users->perPage()])->links()}} --}}

                                    {{ $users->appends(['pagination' => $users->perPage()])->links('vendor.pagination.custom') }}


                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div id="myModal" class="modal modal-custom" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="m-0 font-weight-bold pl-lg-3">Pricing</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <!-- header starts from here -->
          <div class="pricing-box">
              <div class="container">
                  <div class="row">
                      @foreach($subscriptions as $sub)
                         <div class="col-lg-4 col-md-4 col-sm-12 float-left">
                             <div class="card-spacer bg-white card-rounded flex-grow-1">

                                <div class="row m-0">
                                   <div class="col-lg-12 col-md-12 col-sm-12  px-8 py-6 mr-8">
                                      <h3 class="top-head{{$sub->class}}">{{$sub->title}}</h3>
                                      <div class="font-size-h4 font-weight-bolder text-align color{{$sub->class}}">{{$sub->users}} Users</div>
                                      <div class="font-size-sm text-muted font-weight-bold text-align border-bottom padding-bottom">Price: ${{$sub->price}}</div>
                                      <div class="font-size-sm text-muted font-weight-bold text-align border-bottom padding-bottom">Annual Taxes</div>
                                      <div class="font-size-sm text-muted font-weight-bold text-align border-bottom padding-bottom">Annual Income</div>
                                      <div class="font-size-sm text-muted font-weight-bold text-align padding-bottom">Save up to layouts</div>
                                      <button class="btn-submit pricing-btn{{$sub->class}}" data-id="{{$sub->id}}" data-users="{{$sub->users}}" data-price="{{$sub->price}}">License</button>
                                   </div>
                                </div><!--end::Row-->
                            </div>
                         </div><!-- end col -->
                         @endforeach

                  </div><!-- end row -->
              </div><!-- end container -->
          </div><!-- end pricing-box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- model end -->
@endsection
@section('page-script')
<script type="text/javascript">
    $(document).on('change' , 'select' , function(){
        $("#searchForm").submit();
    })
</script>
<script type="text/javascript">
function showSwalAlert(msg, heading,type,para=''){
    var title = heading.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    if(type=='auto-close'){
        swal({
            title: title,
            text: msg,
            type: heading,
            timer: 2000,
            showConfirmButton: false
        }).catch(swal.noop)
        window.setTimeout(function(){
            /*window.location.href ="/pricing";*/
            $('.modal').show('fast');
            $('body').addClass('overflow-hidden');
        }, 2000);
    }else if (type == 'title-and-text') {
      swal({
        title: title,
        text: msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-info"
      }).catch(swal.noop)

    }else if (type == 'warning-message-and-confirmation') {
        Swal.fire({
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            buttonsStyling: false
            }).then((result) => {
              if (result.value) {
               para.parentElement.submit();
                Swal.fire(
                  'Deleted!',
                  'Your record has been deleted.',
                  'success'
                )
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                  'Cancelled',
                  'You have Cancelled request :)',
                  'error'
                )
              }
        })
    }
    
}

$('body').on('click','.close',function(){
  $('.modal').hide('fast');
  $('body').removeClass('overflow-hidden');
});
</script>
@endsection