@extends('layouts.app', ['activePage' => 'company-documents', 'titlePage' => __('Company Documents')])

@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<?php // dd($attachments); ?>
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
                            <h4 class="card-title ">{{$companyinfo->name}} {{ __('Documents') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage documents') }}</p>
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
                                <div class="col-12 text-right">
                                  @if(auth()->user()->hasRole('super admin'))
                                    <a href="javascript:void(0);"  data-toggle="modal" data-target="#attachmentModal"
                                       class="btn btn-sm btn-primary">{{ __('Add Documents') }}
                                    </a>
                                  @endif
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-tags">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Title') }}
                                    </th>
                                    <th>
                                        {{ __('Company') }}
                                    </th>
                                    <th>
                                        {{ __('File') }}
                                    </th>
                                    <th>
                                        {{ __('Tags') }}
                                    </th>
                                    <th>
                                        {{ __('Date') }}
                                    </th>
                                    @if(auth()->user()->hasRole('super admin'))
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    @endif
                                    </thead>
                                    <tbody>
                                        @if(count($attachments)>0)
                                        @foreach($attachments as $attachment)
                                            <tr>
                                                <td>
                                                    {{ ($attachment->title!='') ? $attachment->title : __('---') }}
                                                </td>
                                                <td>
                                                    {{ $attachment->company->name }}
                                                </td>
                                                <td>
                                                    @if($attachment->file2)
                                                    <a href="/user/file/{{base64_encode('pdfs/'.$attachment->file)}}">
                                                    {{ $attachment->name }}
                                                    </a> 


                                                    @else
                                                    <a href="/user/file/{{base64_encode('attachments/'.$attachment->id)}}">
                                                        {{ $attachment->file }}
                                                    </a>
                                                    @endif





                                                    
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($attachment->tags){
                                                        $i=1;
                                                        foreach($tags as $key => $tag){
                                                            if(in_array($tag->id, json_decode($attachment->tags))){
                                                                echo $tag->title;
                                                                if($i < count( json_decode($attachment->tags)))
                                                                {
                                                                    echo ',';
                                                                }
                                                                $i++;
                                                            }

                                                        }
                                                    }else{
                                                        echo '---';
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    {{ $attachment->uploaded_date }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('companyattachments.destroy', $attachment) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @if(auth()->user()->hasRole('super admin'))
                                                        
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                           href="{{ route('companyattachments.edit', $attachment) }}"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
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
                           {{-- {{ $attachments->links() }} --}}
                           {{ $attachments->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
<div id="attachmentModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <form action="{{ route('companyattachments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
      <div class="modal-body form-wrapper">
         

            <div class="row mx-0">
                <label class="col-sm-2 col-form-label align-self-center">{{ __('Title') }}</label>
                <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title" id="input-title" type="text"
                               placeholder="{{ __('Title') }}" value="{{ old('title') }}" required/>
                        @if ($errors->has('title'))
                            <span id="title-error" class="error text-danger"
                                  for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- <div class="row mx-0">
                <label class="col-sm-2 col-form-label align-self-center">{{ __('Company') }}</label>
                <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                        <select class="form-control" name="company_id" id="input-company" required="">
                            @foreach($companies as $company)
                                <option
                                    value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('company'))
                            <span id="company-error" class="error text-danger"
                                  for="input-company">{{ $errors->first('company') }}</span>
                        @endif
                    </div>
                </div>
            </div> -->

            <div class="row mx-0">
                <label class="col-sm-2 col-form-label align-self-center">{{ __('Date') }}</label>
                <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('uploaded_date') ? ' has-danger' : '' }}">
                        <input class="datepicker form-control{{ $errors->has('uploaded_date') ? ' is-invalid' : '' }}"
                               name="uploaded_date" id="uploaded_date" type="text"
                               placeholder="{{ __('Date') }}" value="{{ old('uploaded_date') }}" required/>
                        @if ($errors->has('uploaded_date'))
                            <span id="title-error" class="error text-danger"
                                  for="uploaded_date">{{ $errors->first('uploaded_date') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mx-0">
                <label class="col-sm-2 col-form-label align-self-center">{{ __('Tags') }}</label>
                <div class="col-sm-10">
                    <div class="custom-tag form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <!-- Dropdown --> 
                        <select id='tags' name="tags[]" multiple="multiple" class="form-control tags" style='width: 100%;' required="">
                         @foreach($tags as $tag)
                          <option value='{{$tag->id}}'>{{$tag->title}}</option> 
                          @endforeach
                        </select>
                        @if ($errors->has('tags'))
                            <span id="title-error" class="error text-danger"
                                  for="input-tags">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                </div>
        </div>  

        <div class="row mx-0">
          <div class="col-12">
            <div class="dropzone-wrapper">
                <div class="dropzone-desc w-100">
                  <i class="material-icons">file_upload</i>
                  <p>Choose an image/doc/pdf file or drag it here.</p>
                </div>
               <input type="file" name="file-upload" id="file-upload" class="dropzone" accept="image/*,.pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required="">
            </div>
            <div class="preview-zone">
                  <div class="box-body">
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="company_id" value="{{$companyinfo->id}}">
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

       </form>
    </div>

  </div>
</div>

@endsection
@section('page-script')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
            window.location.href ="/pricing";
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
        $('#uploaded_date').datepicker({ footer: true, modal: true , format: 'yyyy-mm-dd' , uiLibrary: 'materialdesign'});
    }
  // Initialize select2
$(".tags").select2({
  tags: true
});

});
</script>
@endsection
