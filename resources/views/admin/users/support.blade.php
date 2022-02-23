@extends('layouts.app', ['activePage' => 'support', 'titlePage' => __('Support')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if($errors->any())
            <div class="alert alert-danger">
                    <li>{{$errors->first()}}</li>
            </div>
            @endif
            <div class="row">
                <div class="col-12" id="toggleStatus">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                Support Section
                            </div>
                            <div class="card-body ">
                              @if(!auth()->user()->hasRole('super admin'))
                                <div class="row">
                                    <div class="col-12 text-right">
                                    <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Contact Us<div class="ripple-container"></div></a>
                                    </div>
                                </div>
                              @endif
                                <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Sender Name') }}
                                    </th>
                                    <th>
                                        {{ __('Sender Role') }}
                                    </th>
                                     <th>
                                        {{ __('Reciever Role') }}
                                    </th>
                                    <th>
                                        {{ __('Company') }}
                                    </th>
                                    <th>
                                        {{ __('Subject') }}
                                    </th>
                                    <th>
                                        {{ __('Message') }}
                                    </th>
                                    <th>
                                        {{ __('Status') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if(count($supports)>0)
                                        @foreach($supports as $support)
                                            <tr>
                                                <td>
                                                  @if(isset($support->createdBy->firstname ) && isset($support->createdBy->lastname))
                                                    {{ $support->createdBy->firstname .' '.$support->createdBy->lastname }}

                                                    @else
                                                      ---
                                                    @endif
                                                </td>

                                                <td>
                                                    @if(isset($support->createdBy->roles))
                                                    {{ $support->createdBy->roles->first()->name }}
                                                    @else
                                                      ---
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $support->contacted_role }}
                                                </td>
                                                <td>
                                                    {{ $support->company->name }}
                                                </td>

                                                @if(strlen($support->subject)>20)
                                                <td>
                                                  <a href="javascript:void(0)" onclick="showSwalAlert('Subject' ,'{{ $support->subject }}' )">
                                                  {{ substr($support->subject,0,20). '...' }}
                                                  </a>
                                                </td>


                                                @else
                                                <td>
                                                  {{ $support->subject }}
                                                </td>
                                                @endif

                                                
                                                @if(strlen($support->message)>20)
                                                <td>
                                                  <a href="javascript:void(0)" onclick="showSwalAlert('Message' , '{{ $support->message }}' )">
                                                  {{ substr($support->message,0,20). '...' }}
                                                  </a>
                                                </td>


                                                @else
                                                <td>
                                                  {{ $support->message }}
                                                </td>
                                                @endif
                                                
                                                <td>
                                                    @if(auth()->user()->hasRole('user'))
                                                       <a href="javascript:void(0);" class="btn btn-sm {{ $support->status=='Inprogress' ? 'btn-danger' : 'btn-success' }}">{{$support->status}}</a>

                                                    @elseif($support->created_by_user_id==auth()->user()->id)

                                                    <a href="javascript:void(0);" class="btn btn-sm {{ $support->status=='Inprogress' ? 'btn-danger' : 'btn-success' }}">{{$support->status}}</a>

                                                    @else
                                                        <select class="form-control" data-id="{{$support->id}}" name="status" onchange="statusChange(this)">
                                                            <option value="Pending" @if($support->status=='Pending'){{'selected'}}@endif >Pending</option>
                                                            <option value="Inprogress" @if($support->status=='Inprogress'){{'selected'}}@endif >Inprogress</option>
                                                            <option value="Completed" @if($support->status=='Completed'){{'selected'}}@endif>Completed</option>
                                                        </select>
                                                    @endif
                                                    
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align: center;">
                                                No Record.
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="card-footer">
                              @if (isset($supports))
                                  @if(count($supports) > 0)
                                      {{-- {{ $supports->links() }} --}}
                                      {{ $supports->links('vendor.pagination.custom') }}
                                  @endif
                              @endif
                          </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <form method="POST" action="{{ route('supports.store') }}" autocomplete="off" class="form-horizontal">
      <div class="modal-body">
            @csrf
            @method('post')
            <div class="row">
                <label class="col-sm-3 col-form-label">{{ __('Role') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                        <select class="form-control" name="role" id="input-role">
                            <option value="super admin">Super Admin</option>
                            @if(auth()->user()->hasRole('user'))
                            <option value="super user">Super User</option>
                            @endif
                        </select>
                        @if ($errors->has('role'))
                            <span id="role-error" class="error text-danger"
                                  for="input-role">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-3 col-form-label"
                       for="input-password-confirmation">{{ __('Subject') }}</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject"
                               id="subject" required/>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-3 col-form-label"
                       for="input-password-confirmation">{{ __('Message') }}</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="message"
                               id="message" required></textarea> 
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
@endsection
@section('page-script')
    <script>
       function statusChange(el){

           var status= el.value;
           var id= $(el).data('id');
           var routeToPostTo = "/update_status";
           $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               data:{id:id,status:status},
               success:function(data){
                   $("#toggleStatus").append( "<div class=\"alert alert-success alert-dismissible fade show\" id=\"toggleMessage\" role=\"alert\" >\n" +
                       "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                       "            <span class=\"material-icons\">close</span>\n" +
                       "        </button>\n" +
                       "        <span>The status is changed!</span>\n" +
                       "    </div>" );
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


<script type="text/javascript">
function showSwalAlert(title,text){

      swal({
        title: title,
        text: text,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-info"
      }).catch(swal.noop)


    
}
</script>
@endsection

