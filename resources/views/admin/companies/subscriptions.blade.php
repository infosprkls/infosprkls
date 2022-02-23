@extends('layouts.app', ['activePage' => 'company-subscriptions', 'titlePage' => __('Company Subscriptions')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- new card header div -->
                    <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                          <div class="content-left d-flex flex-column flex-wrap">
                          <h4 class="card-title ">{{ $companyinfo->name }} Subscriptions</h4>
                            <p class="card-category"> {{ __('Here you can manage subscriptions') }}</p>
                          </div>
                            
                          <div class="ml-auto content-right">
                            
                          <a href="javascript:void(0);" class="btn btn-secondary btn-custom tooltiped" data-toggle="modal" data-target="#myModal">
                            <i class="material-icons mr-1">create</i>
                            <span>Add New License</span>
                            <div class="tooltip"> 
                                <div class="arrow"></div> 
                                <div class="tooltip-inner">Edit Lorem Ipsum</div> 
                            </div>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Total Users') }}
                                    </th>
                                    <th>
                                        {{ __('Created By') }}
                                    </th>
                                    <th>
                                        {{ __('Creation date') }}
                                    </th>
                                    
                                    </thead>
                                    <tbody>
                                    @if(count($subscriptions)>0)
                                        @php
                                        $sum=0;
                                        @endphp
                                        @foreach($subscriptions as $sub)
                                        @php
                                        $sum +=$sub->total_users;
                                        @endphp
                                            <tr>
                                                <td>
                                                    {{ $sub->title }}
                                                </td>
                                                <td>
                                                    {{ $sub->total_users }}
                                                </td>
                                                <td>
                                                    <a href="{{route('profile.show', $sub->user_id)}}">{{$sub->firstname." ".$sub->lastname}}</a>
                                                    
                                                </td>
                                                <td>
                                                    {{ $sub->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3" style="text-align: center;">
                                            No Record
                                        </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                    <tfooter>
                                        <td></td>
                                        <td><span><b>Total: {{ $sum }}</b></span></td>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if(!empty($companies))
                                {{-- {{$companies->links()}} --}}
                                {{ $companies->links('vendor.pagination.custom') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- starting add new license modal -->
    <div id="myModal" class="modal show" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="m-0 font-weight-bold pl-lg-3 pl-md-3 pl-sm-3 pl-0 ">Select Company</h3>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
        <form action="{{ route('companies.store-subscription', $companyinfo) }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row m-0">    
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-flex flex-wrap align-items-center pl-0">
                        <label class="col-3 col-form-label align-self-center pl-lg-3 pl-md-3 pl-sm-3 pl-0">Select License:</label>
                            <div class="col-lg-8 col-md-9 pl-lg-3 pl-md-3 pl-sm-3 pl-0">
                                <div class="form-group">
                                    <select class="form-control" name="license_id" id="license_id">
                                    @foreach ($subscriptionInfo as $sub) 
                                            <option value={{$sub->id}}>{{$sub->title}} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- End add new license modal -->
@endsection

@section('page-script')
@endsection
