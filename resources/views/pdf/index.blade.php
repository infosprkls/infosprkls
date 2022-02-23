@extends('layouts.app', ['activePage' => 'company-pdfs', 'titlePage' => __('Services')])

@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Services') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage services') }}</p>
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
                            <div class="row">
                                <div class="col-12" id="toggleStatus">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                  @if(auth()->user()->hasRole('super admin'))
                                     <a href=""  data-toggle="modal" data-target="#myModal"
                                       class="btn btn-sm btn-primary">{{ __('Add Service') }}
                                   </a>
                                   @endif
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <!-- <th>
                                        {{ __('Company') }}
                                    </th> -->
                                    <th>
                                        {{ __('Service name') }}
                                    </th>
                                    <th>
                                        {{ __('Period') }}
                                    </th>
                                    <th>
                                        {{ __('Pdfs') }}
                                    </th>

                                    <th>
                                        {{ __('Approved/Declined') }}
                                    </th>

                                    @if(auth()->user()->hasRole('super admin'))
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    @endif
                                    </thead>
                                    <tbody>
                                        @if(count($pdfs)>0)
                                        @foreach($pdfs as $pdf)
                                            <tr>
                                                <!-- <td>
                                                    {{ $pdf->company->name }}
                                                </td> -->
                                                <td>
                                                    <a href="/company/{{ $companyid }}/service/{{ $pdf->slug }}">
                                                        {{ strtoupper($pdf->service) }}
                                                    </a>
                                                </td>
                                                
                                                <td>
                                                    @if($pdf->start_date && $pdf->end_date)
                                                    {{ date("d F Y", strtotime($pdf->start_date)) }} - {{ date("d F Y", strtotime($pdf->end_date)) }}
                                                    @else
                                                    ---
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($pdf->pdf)
                                                    <a href="/user/file/{{base64_encode('pdfs/'.$pdf->pdf)}}">
                                                    {{-- {{ str_replace(' ','',$companies->name).'.zip' }} --}}
                                                    {{ $pdf->name }}
                                                    </a> 


                                                    @else
                                                    ---
                                                    @endif
                                                  
                                                </td>

                                                <td class="pl-5">
                                                    @if($pdf->pdf)
                                                    <label class="switch">
                                                      <input type="checkbox" onclick="toggle(this)" id="{{$pdf->id}}" {{ $pdf->status == 'Approved' ? "checked" : ""}} />
                                                      <span class="slider round"></span>
                                                    </label>
                                                    @else
                                                    ---
                                                    @endif
                                                </td>

                                                <td class="td-actions text-right">
                                                    <form action="{{ route('pdfs.destroy', $pdf) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @if(auth()->user()->hasRole('super admin'))
                                                        
                                                        <!-- <a rel="tooltip" class="btn btn-success btn-link"
                                                           href="{{ route('pdfs.edit', $pdf) }}"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a> -->
                                                        <button type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                  onclick="showSwalAlert('','','warning-message-and-confirmation',this);">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        @endif
                                                    </form>
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
                           {{-- {{ $pdfs->links() }} --}}
                           {{ $pdfs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->


<div id="myModal" class="modal modal-custom modal-medium" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="m-0 font-weight-bold ">Create New Service</h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <!-- header starts from here -->
                <h4>Select your service</h4>
                <a href="/company/services/{{ $companyid }}/via/create" class="btn btn-primary">VIA</a>
                <a id="wbsoToggle" href="#" class="btn btn-primary">WBSO</a>
                <a href="/company/services/{{ $companyid }}/mit/create" class="btn btn-primary">MIT</a>
                <!-- end pricing-box -->

                <div id="linkTypes" style="display: none;">
                    <h5 class="border-bottom mt-3 mb-2">WBSO Sevices</h5>
                    <a href="/company/services/{{ $companyid }}/wbso/performa/create" class="btn btn-primary px-3 py-2 mr-3">Performa</a>
                    <a href="/company/services/{{ $companyid }}/wbso/complete/create" class="btn btn-primary px-3 py-2">Complete</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-script')

<script>
       function toggle(el){

           var id = el.id;
           var routeToPostTo = "/service/"+id+"/toggle";
           var routeToPostTo =  routeToPostTo.replace('#/', '/');

           $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success:function(data){
                   $("#toggleStatus").append( "<div class=\"alert alert-success alert-dismissible fade show\" id=\"toggleMessage\" role=\"alert\" >\n" +
                       "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                       "            <span class=\"material-icons\">close</span>\n" +
                       "        </button>\n" +
                       "        <span>The service status is changed!</span>\n" +
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
    var clone_html = "";
    clone_html +='<div class="full-fields copy_section">';
    clone_html +='<div class="row mx-0 float-left w-100">';
    clone_html +='<label class="col-sm-2 col-form-label  align-self-center">{{ __('Project Name') }}</label>';
    clone_html +='<div class="col-sm-10">';
    clone_html +='<div class="form-group">';
    clone_html +='<input class="form-control" name="name[]" id="name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required/>';
    clone_html +='<i class="fa fa-minus-circle plus-icon-sec remove_section" aria-hidden="true"></i>';
    clone_html +='</div>';
    clone_html +='</div>';
    clone_html +='</div>';

    clone_html +='<div class="row mx-0 float-left w-100">';
    clone_html +='<label class="col-sm-2 col-form-label  align-self-center">{{ __('Project Number') }}</label>';
    clone_html +='<div class="col-sm-10">';
    clone_html +='<div class="form-group">';
    clone_html +='<input class="form-control" name="project_number[]" id="project_number" type="Number" placeholder="{{ __('Project Number') }}" value="{{ old('project_number') }}" required/>';
    clone_html +='</div>';
    clone_html +='</div>';
    clone_html +='</div>';

    clone_html +='<div class="row mx-0 float-left w-100">';
    clone_html +='<label class="col-sm-2 col-form-label  align-self-center">{{ __('Project Hours') }}</label>';
    clone_html +='<div class="col-sm-10">';
    clone_html +='<div class="form-group">';
    clone_html +='<input class="form-control" name="project_hours[]" id="project_hours" type="Number" placeholder="{{ __('Project Hours') }}" value="{{ old('project_hours') }}" required/>';
    clone_html +='</div>';
    clone_html +='</div>';
    clone_html +='</div>';
    clone_html +='</div>';
    $(document).on('click' , '#add_new_section' , function(){
        $(document).find(".copy_section").last().after(clone_html);
    })
</script>

<script type="text/javascript">
    $(document).on('click' , '.remove_section' , function(){
        $(this).parent().parent().parent().parent().remove();
    })
</script>


<script type="text/javascript">
    var options = {
      startOfWeek: 'monday',
      separator: ' ~ ',
      format: 'YYYY-MM-DD',
      autoClose: false,
    };

    $('#period').dateRangePicker(options);


</script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).on("submit","#addPdfForm",function(){
        $("#ajax_loader").show();
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
            window.location.href ="/pdfs";
        }, 2000);
    }else if (type == 'title-and-text') {
      swal({
        title: title,
        text: msg,
        type: heading,
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
</script>
<script type="text/javascript">
$(document).ready(function(){
    bindDateTimePickers();
            
    function bindDateTimePickers() {
        $('#date').datepicker({ footer: true, modal: true , format: 'yyyy-mm-dd' , uiLibrary: 'materialdesign'});
    }


    // getCompanyDetail();

});
</script>






<script>
    // $(document).on('change' , '#input-company' , function(){
    function getCompanyDetail(){
        var company_id = "{{ $companyid }}";
        if(company_id){
            // $("#ajax_loader").show();
            $.ajax({
                type:'GET',
                url: '/superadmin/get/company/pdf/data/'+company_id,
                success:function(data){
                    if(data){
                        $("#tav_name").val(data.tav_name);
                        $("#state").val(data.state);
                        $("#date").val(data.date);
                        $("#address1").val(data.address1);
                        $("#address2").val(data.address2);
                        $("#period").val(data.period);
                        $("#amount").val(data.amount);
                        $("#name").val(data.name);
                        $("#so_number").val(data.so_number);
                        $("#hours").val(data.hours);
                        $("#project_number").val(data.project_number);
                        $("#project_hours").val(data.project_hours);


                        $("#total_amount").val(data.total_amount);
                        $("#amount_per_month").val(data.amount_per_month);
                        $("#months_year").val(data.months_year);
                        $("#months").val(data.months);

                    }else{
                        $("#tav_name").val("");
                        $("#state").val("");
                        $("#date").val("");
                        $("#address1").val("");
                        $("#address2").val("");
                        $("#period").val("");
                        $("#amount").val("");
                        $("#name").val("");
                        $("#so_number").val("");
                        $("#hours").val("");
                        $("#project_number").val("");
                        $("#project_hours").val("");


                        $("#total_amount").val("");
                        $("#amount_per_month").val("");
                        $("#months_year").val("");
                        $("#months").val("");
                    }

                    // $("#attachmentModal").modal("show");
                    // setTimeout(function() {
                    //     $("#ajax_loader").hide();
                    // }, 1000);
                    
                    
                }, 
                error: function(){
                    // setTimeout(function() {
                    //     $("#ajax_loader").hide();
                    // }, 1000);
                }
            });
            // $("#ajax_loader").hide();
       }
    // })
    }
</script>

<script>
    $('#wbsoToggle').click(function(e){
        e.preventDefault();
        $('#linkTypes').slideToggle();
    });
</script>
@endsection














