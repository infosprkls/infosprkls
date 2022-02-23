@extends('layouts.app', ['activePage' => 'setting', 'titlePage' => __('Site Settings')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <!-- new card header div -->
                    <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                          <div class="content-left d-flex flex-column flex-wrap">
                          <h4 class="card-title ">{{ __('Settings') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage Site Setting') }}</p>
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
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Id') }}
                                    </th>
                                    <th>
                                        {{ __('Key') }}
                                    </th>
                                    <th>
                                        {{ __('Value') }}
                                    </th>
                                    
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <td>
                                                {{$setting->id}}
                                            </td>

											
                                            <td id="key_{{$setting->id}}">
                                                {{$setting->setting_key}}
                                            </td>
                                            <td>
                                                {{$setting->setting_value}}
                                                <input type="hidden" id="keys_{{$setting->id}}" value="{{$setting->setting_value}}" />
                                            </td>
                                            
                                            
                                            <td class="td-actions text-right">
                                                    <form action="{{ route('settings.destroy', $setting) }}"
                                                          method="post">
                                                        @csrf
                                                        
                                                        
                                                        <a rel="tooltip" class="btn btn-success btn-link edit_button" id="edit_{{$setting->id}}"
                                                        href="javascript:void(0);" data-toggle="modal" data-target="#myModal"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer custom-pagination flex-wrap m-0 px-4">
                            @if (isset($settings))
                                @if(count($settings) > 0)
                                    <p class="d-lg-inline-block text-secondary">Showing {{$settings->firstItem()}} to {{$settings->lastItem()}} of {{$settings->total()}} entries.</p>
                                    {{-- {{$settings->links()}} --}}
                                    {{ $settings->links('vendor.pagination.custom') }}
                                @endif
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
            <h3 class="m-0 font-weight-bold pl-lg-3 pl-md-3 pl-sm-3 pl-0 ">Edit Setting</h3>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
        <form action="{{ route('settings.store') }}" method="post">
            @csrf
            <div class="modal-body">

                <div class="row m-0">
                    <div class="col-12 pr-0">
                        <div class="form-group d-flex flex-wrap align-items-center w-100 ">
                            <span class="material-icons mr-2 gray-icon">
                                vpn_key
                            </span>
                            <label id="modal_key" class="mb-0 display2">
                                license_english
                            </label>
                        </div>
                        <div class="key-value d-flex flex-wrap">
                            <label class="col-form-label d-flex flex-wrap align-items-center justify-content-center">Value:</label>
                            <div class="form-group pb-0 m-0 ">
                                <input type="hidden" name="setting_id" id="modal_setting_id" value="" />
                                <textarea name="setting_value" id="modal_value" class="w-100 form-control">this is text</textarea>
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
    <script>
        $(".edit_button").click(function() {
            
            var edit_id=$(this).attr('id');
            edit_id=edit_id.split('_').pop();
            $("#modal_setting_id").val(edit_id);            
            $('#modal_key').html($('#key_'+edit_id).html());
            var text_val=$('#keys_'+edit_id).val();
            
            $('#modal_value').val(text_val);
        });
    
    </script>
@endsection
