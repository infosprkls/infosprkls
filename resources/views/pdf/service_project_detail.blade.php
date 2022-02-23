@extends('layouts.app', ['activePage' => 'company-pdfs', 'titlePage' => strtoupper($details->service).' Services'])

@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('service.project.update' , ['id'=>$companyid,'slug'=>$details->slug,'projectId'=>$projects->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Project Data</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('service.detail' , ['id' => $companyid,'slug' => $details->slug] ) }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to project') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Project number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                                                   name="number" id="input-number" type="text"
                                                   placeholder="{{ __('Project number') }}" value="{{ $projects->number }}" required/>
                                            @if ($errors->has('number'))
                                                <span id="number-error" class="error text-danger"
                                                      for="input-number">{{ $errors->first('number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Project Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Project Name') }}" value="{{ $projects->name }}" required/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Hours of the project') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hours') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('hours') ? ' is-invalid' : '' }}"
                                                   name="hours" id="input-hours" type="number"
                                                   placeholder="{{ __('Hours of the project') }}" value="{{ $projects->hours }}" required/>
                                            @if ($errors->has('hours'))
                                                <span id="hours-error" class="error text-danger"
                                                      for="input-hours">{{ $errors->first('hours') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="project-detail  col-lg-9 col-md-9 col-sm-12 col-12">
                                    <div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition">
                                            <h4>Activity Detail</h4>
                                            <button title="Add Project" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center repeat">+</button>
                                    </div>



                                    <div class="repeatable">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Activity') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }} restart_date">

                                                    <input
                                                        class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }} input-end_date"
                                                        type="text" name="end_date[]" id="input-end_date"
                                                        placeholder="Date finished" value="" required/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Research') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('research') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('research') ? ' is-invalid' : '' }}"
                                                           name="research[]" id="input-research" type="text"
                                                           required
                                                           placeholder="{{ __('Research') }}" value="{{ old('research')?old('research')[0]:'' }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>




                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Omschrijving') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                                            id="description" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->description?$projects->description:'' }}</textarea> 
                                            <div style="display: {{ $projects->description?'block':'none' }};" class="help-block max_limit_div text-info"><span id='description_info'>{{ strlen($projects->description) }}</span> character(s) (MAX 1500 characters).</div>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Update of the project') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('updates') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('updates') ? ' is-invalid' : '' }}" name="updates"
                                            id="updates" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->updates?$projects->updates:'' }}</textarea>
                                            <div style="display: {{ $projects->updates?'block':'none' }};" class="help-block max_limit_div text-info"><span id='updates_info'>{{ strlen($projects->updates) }}</span> character(s) (MAX 1500 characters).</div> 
                                            @if ($errors->has('updates'))
                                                <span id="updates-error" class="error text-danger"
                                                      for="input-updates">{{ $errors->first('updates') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Described Problem') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('described_problems') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('described_problems') ? ' is-invalid' : '' }}" name="described_problems"
                                            id="described_problems" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->described_problems?$projects->described_problems:'' }}</textarea> 
                                            <div style="display: {{ $projects->described_problems?'block':'none' }};" class="help-block max_limit_div text-info"><span id='described_problems_info'>{{ strlen($projects->described_problems) }}</span> character(s) (MAX 1500 characters).</div>
                                            @if ($errors->has('described_problems'))
                                                <span id="described_problems-error" class="error text-danger"
                                                      for="input-described_problems">{{ $errors->first('described_problems') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Described solution') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('described_solution') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('described_solution') ? ' is-invalid' : '' }}" name="described_solution"
                                            id="described_solution" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->described_solution?$projects->described_solution:'' }}</textarea> 
                                            <div style="display: {{ $projects->described_solution?'block':'none' }};" class="help-block max_limit_div text-info"><span id='described_solution_info'>{{ strlen($projects->described_solution) }}</span> character(s) (MAX 1500 characters).</div>
                                            @if ($errors->has('described_solution'))
                                                <span id="described_solution-error" class="error text-danger"
                                                      for="input-described_solution">{{ $errors->first('described_solution') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Described languages') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('described_languages') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('described_languages') ? ' is-invalid' : '' }}" name="described_languages"
                                            id="described_languages" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->described_languages?$projects->described_languages:'' }}</textarea> 
                                            <div style="display: {{ $projects->described_languages?'block':'none' }};" class="help-block max_limit_div text-info"><span id='described_languages_info'>{{ strlen($projects->described_languages) }}</span> character(s) (MAX 1500 characters).</div>
                                            @if ($errors->has('described_languages'))
                                                <span id="described_languages-error" class="error text-danger"
                                                      for="input-described_languages">{{ $errors->first('described_languages') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Technical Newness') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('technical_newness') ? ' has-danger' : '' }}">
                                            <textarea maxlength="1500" class="form-control {{ $errors->has('technical_newness') ? ' is-invalid' : '' }}" name="technical_newness"
                                            id="technical_newness" placeholder="{{ __('MAX 1500 characters') }}" required>{{ $projects->technical_newness?$projects->technical_newness:'' }}</textarea> 
                                            <div style="display: {{ $projects->technical_newness?'block':'none' }};" class="help-block max_limit_div text-info"><span id='technical_newness_info'>{{ strlen($projects->technical_newness) }}</span> character(s) (MAX 1500 characters).</div>
                                            @if ($errors->has('technical_newness'))
                                                <span id="technical_newness-error" class="error text-danger"
                                                      for="input-technical_newness">{{ $errors->first('technical_newness') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-right bg-transparent">
                            <button type="submit" class="btn btn-primary">{{ __('Save Project') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('page-script')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $("#description").keyup(function(){
            var description_val = $(this).val();
            if(description_val.length){
                $("#description_info").html(description_val.length);
                $("#description_info").parent().show();
            }else{
                $("#description_info").parent().hide();
            }
        })

        $("#updates").keyup(function(){
            var updates_val = $(this).val();
            if(updates_val.length){
                $("#updates_info").html(updates_val.length);
                $("#updates_info").parent().show();
            }else{
                $("#updates_info").parent().hide();
            }
        })

        $("#described_problems").keyup(function(){
            var described_problems_val = $(this).val();
            if(described_problems_val.length){
                $("#described_problems_info").html(described_problems_val.length);
                $("#described_problems_info").parent().show();
            }else{
                $("#described_problems_info").parent().hide();
            }
        })


        $("#described_solution").keyup(function(){
            var described_solution_val = $(this).val();
            if(described_solution_val.length){
                $("#described_solution_info").html(described_solution_val.length);
                $("#described_solution_info").parent().show();
            }else{
                $("#described_solution_info").parent().hide();
            }
        })


        $("#described_languages").keyup(function(){
            var described_languages_val = $(this).val();
            if(described_languages_val.length){
                $("#described_languages_info").html(described_languages_val.length);
                $("#described_languages_info").parent().show();
            }else{
                $("#described_languages_info").parent().hide();
            }
        })


        $("#technical_newness").keyup(function(){
            var technical_newness_val = $(this).val();
            if(technical_newness_val.length){
                $("#technical_newness_info").html(technical_newness_val.length);
                $("#technical_newness_info").parent().show();
            }else{
                $("#technical_newness_info").parent().hide();
            }
        })

    </script>


    <script>
        


        $(function () {
            $(".repeat").on('click', function () {
                var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button title="Remove Project" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';



                var $self = $(this);
                $self.parent().parent().find('.repeatable').first().clone().find("#input-end_date").val("").end().find("#input-research").val("").end().find('.restart_date').html('<input class="form-control  input-end_date" type="text" name="end_date[]"  placeholder="Date finished" value="" required/>').end().find('.input-end_date').attr('id' , 'id_'+randumNumber).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);

                bindDateTimePickers('id_'+randumNumber);
            });

            $(document).on('click' , '.removeProject' , function(){
                var dataId = $(this).data("id");
                $(document).find("."+dataId).remove();
                updateProjectHours();
            })
        });

    </script>



    <script>
        $(document).ready(function(){
            bindDateTimePickers('input-end_date');

            var allErrors = '{{ $errors }}';
            if(allErrors.length>2){
                var end_date_errors = '<?php echo json_encode(old('end_date')) ?>';
                var research_errors = '<?php echo json_encode(old('research')) ?>';


                end_date_errors = JSON.parse(end_date_errors);
                research_errors = JSON.parse(research_errors);

                var count = '{{ old("research")?count(old("research")):0 }}';
                $("#input-end_date").val(end_date_errors[0]);
                $("#input-research").val(research_errors[0]);
                for (var i = 1; i < count; i++) {
                    




                    // alert("SDsdf")
                    var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                    var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';


                    $(document).find('.repeatable').first().clone().find("#input-end_date").val(end_date_errors[i]).end().find('.restart_date').html('<input class="form-control  input-end_date" type="text" name="end_date[]"  placeholder="Date finished" value="'+end_date+'" required/>').end().find('.input-end_date').attr('id' , 'id_'+randumNumber).end().find("#input-research").val(research_errors[i]).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);


                    bindDateTimePickers('id_'+randumNumber);
                }
            }else{
                var activities = '<?php echo json_encode($pdfProjectActivities); ?>';
                activities = JSON.parse(activities);


                $("#input-end_date").val(activities[0].end_date);
                $("#input-research").val(activities[0].research);

                for (var i = 1; i < activities.length; i++) {
                    var end_date = activities[i].end_date;
                    var research = activities[i].research;


                    // alert("SDsdf")
                    var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                    var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';


                    $(document).find('.repeatable').first().clone().find("#input-end_date").val(end_date).end().find('.restart_date').html('<input class="form-control  input-end_date" type="text" name="end_date[]"  placeholder="Date finished" value="'+end_date+'" required/>').end().find('.input-end_date').attr('id' , 'id_'+randumNumber).end().find("#input-research").val(research).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);

                    bindDateTimePickers('id_'+randumNumber);
                }

            }

            
        })





        function bindDateTimePickers(id) {
            $(document).find('#'+id).datepicker({ footer: true, modal: true , format: 'yyyy-mm-dd' , uiLibrary: 'materialdesign'});
        }

    </script>


    

@endsection
