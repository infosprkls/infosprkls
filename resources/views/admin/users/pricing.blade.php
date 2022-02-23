@extends('layouts.app', ['activePage' => 'pricing', 'titlePage' => __('Pricing page')])

@section('content')
<!-- Custom css -->
<link href="{{ asset('material') }}/css/style.css" rel="stylesheet" />
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                    <div style="margin-bottom: 25px">
                        <li class="alert alert-danger">{{$errors->first()}}</li>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
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

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <p class="success-txt"></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>

            </div>
        </div>
    </div>

@endsection
