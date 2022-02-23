@extends('layouts.app', ['activePage' => 'company-attachment', 'titlePage' => __('Attachments')])

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
  /* Code By Webdevtrick ( https://webdevtrick.com ) */

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

.btn-primary {
  background-color: crimson;
  border: 1px solid #212121;
}
.hidden{
  display: none;
}
</style>
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
                            <h4 class="card-title ">{{ __('Attachments') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage attachments') }}</p>
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
                                    <a href=""  data-toggle="modal" data-target="#attachmentModal"
                                       class="btn btn-sm btn-primary">{{ __('Add Attachment') }}
                                   </a>
                                </div>
                            </div>
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
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                           
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
      <div class="modal-body">
             <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Preview</b></div>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                      <i class="fa fa-times"></i> Reset The Field
                    </button>
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="material-icons">file_upload</i>
                <p>Choose a file or drag it here.</p>
              </div>
              <input type="file" name="file-upload" id="file-upload" class="dropzone">
            </div>


            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                <div class="col-sm-7">
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

            <div class="row" id="company_section">
                <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                <div class="col-sm-7">
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
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Date') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('uploaded_date') ? ' has-danger' : '' }}">
                        <input class="datepicker form-control{{ $errors->has('uploaded_date') ? ' is-invalid' : '' }}"
                               name="uploaded_date" id="uploaded_date" type="date"
                               placeholder="{{ __('Date') }}" value="{{ old('uploaded_date') }}" required/>
                        @if ($errors->has('uploaded_date'))
                            <span id="title-error" class="error text-danger"
                                  for="uploaded_date">{{ $errors->first('uploaded_date') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
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
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

       </form>
    </div>

  </div>
</div>

@endsection

@push('js')
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  // Initialize select2
$(".tags").select2({
  tags: true
});
 // $(".select2-search__field").on("keyup", function(e) {
 //    if (e.keyCode == 13) {
 //          $.ajaxSetup({
 //              headers: {
 //                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
 //              }
 //          });
 //          e.preventDefault();
 //          var formData = {
 //              title: $('.tags option').last().val(),
 //          };
 //          var ajaxurl = '/tags';
 //          var type = "POST";
 //          $.ajax({
 //              type: type,
 //              url: ajaxurl,
 //              data: formData,
 //              dataType: 'json',
 //              success: function (data) {
 //                  if(data.success){
 //                    alert(data.success);
 //                  }
 //              },
 //              error: function (data) {
 //              }
 //          });
 //    }
 //  });
  
$('.datepicker').datepicker();
});

       // Code By Webdevtrick ( https://webdevtrick.com )
function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var file_ext=input.files[0]['name'];
      var res = file_ext.split(".");
      // if(FilterNone)
      if(res[1]=='png' || res[1]=='jpg' || res[1]=='jpeg' || res[1]=='svg'){
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      }else{
        var htmlPreview =
        '<i class="material-icons">assignment</i>'+
        '<p>' + input.files[0].name + '</p>';
      }
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      $('#orglogo').hide('fast');
      boxZone.append(htmlPreview);
      
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});
</script>
@endpush
