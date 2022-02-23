@extends('layouts.app', ['activePage' => 'company-invoices', 'titlePage' => __('Invoices')])
@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
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
                <div class="col-md-12">
                    <form method="post" action="{{ route('invoice.update', $attachment) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('includes.errors')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Invoice') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('invoice.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>


                                <div class="row mx-0">
                                    <label class="col-sm-2 col-form-label align-self-center">{{ __('Title') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{$attachment->title}}" required/>
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger"
                                                      for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-0">
                                    <label class="col-sm-2 col-form-label align-self-center">{{ __('Company') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="company_id" id="input-company" required="">
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}" <?php if($company->id==$attachment->company_id){ echo 'selected';}?>>{{$company->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                            @if ($errors->has('company'))
                                                <span id="company-error" class="error text-danger"
                                                      for="input-company">{{ $errors->first('company') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-0">
                                    <label class="col-sm-2 col-form-label align-self-center">{{ __('Date') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('uploaded_date') ? ' has-danger' : '' }}">
                                            <input class="datepicker form-control{{ $errors->has('uploaded_date') ? ' is-invalid' : '' }}"
                                                   name="uploaded_date" id="uploaded_date" type="text"
                                                   placeholder="{{ __('Date') }}"  value="{{$attachment->uploaded_date}}"  required/>
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
                                              @if(in_array($tag->id, json_decode($attachment->tags)))
                                              <option value='{{$tag->id}}' selected>{{$tag->title}}</option>
                                              @else
                                              <option value='{{$tag->id}}'>{{$tag->title}}</option>
                                              @endif
                                            @endforeach
                                            </select>
                                            @if ($errors->has('tags'))
                                                <span id="title-error" class="error text-danger" for="input-tags">{{ $errors->first('tags') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>  

                                <div class="row mx-0">
                                  <div class="col-12">
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc w-100">
                                          <i class="material-icons">file_upload</i>
                                          <p>Choose an pdf file or drag it here.</p>
                                        </div>
                                       <input type="file" name="file-upload" id="file-upload" class="dropzone" accept="application/pdf">
                                    </div>
                                    <div class="preview-zone">
                                          <div class="box-body">
                                          </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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