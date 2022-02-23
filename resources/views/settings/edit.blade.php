@extends('layouts.app', ['activePage' => 'company-management', 'titlePage' => __('Company')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('companies.update', $company) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Company') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-primary">{{ __('Back to company page') }}</a>
                  </div>
                </div>
                <h4 class="mt-2 mb-3 font-weight-bold"> OrganisatiegegevensDeelnemer</h4>
                <div class="row">
                  <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Company Name') }}</label>
                  <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $company->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12 text-right offset-xl-2 offset-lg-3 offset-md-3 offset-sm-4 upload-company">
                @include('admin.companies.partials.logo')
                </div>
                <div class="row">
                  <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Rechtsvorm') }}</label>
                  <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                      <div class="form-group{{ $errors->has('legal_form') ? ' has-danger' : '' }}">
                          <select name="legal_form" id="rechtsvorm" class="form-control{{ $errors->has('legal_form') ? ' is-invalid' : '' }}">
                              <option {{ $company->legal_form == "NV" ? "selected" : '' }}>NV</option>
                              <option {{ $company->legal_form == "BV" ? "selected" : '' }}>BV</option>
                              <option {{ $company->legal_form == "COOP" ? "selected" : '' }}>COOP</option>
                              <option {{ $company->legal_form == "VER" ? "selected" : '' }}>VER</option>
                              <option {{ $company->legal_form == "STICH" ? "selected" : '' }}>STICH</option>
                              <option {{ $company->legal_form == "IMANS" ? "selected" : '' }}>1MANS</option>
                              <option {{ $company->legal_form == "VOF" ? "selected" : '' }}>VOF</option>
                              <option {{ $company->legal_form == "MTS" ? "selected" : '' }}>MTS</option>
                              <option {{ $company->legal_form == "CV" ? "selected" : '' }}>CV</option>
                              <option {{ $company->legal_form == "OW" ? "selected" : '' }}>OW</option>
                              <option {{ $company->legal_form == "EES" ? "selected" : '' }}>EES</option>
                              <option {{ $company->legal_form == "OV" ? "selected" : '' }}>OV</option>
										      </select>
                          @if ($errors->has('legal_form'))
                              <span id="legal-form-error" class="error text-danger"
                                    for="input-legal_form">{{ $errors->first('legal_form') }}</span>
                          @endif
                      </div>
                  </div>
              </div>
              <div class="row">
                    <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('HourType') }}</label>
                    <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                        <div class="form-group{{ $errors->has('hour_type') ? ' has-danger' : '' }}">
                            <select name="hour_type" id="hour_type" class="form-control{{ $errors->has('hour_type') ? ' is-invalid' : '' }}">
                                <option value="round" {{ $company->hour_type == "round" ? "selected" : '' }}>Full Hour</option>
                                <option value="decimal" {{ $company->hour_type == "decimal" ? "selected" : '' }}>Decimal</option>
                            </select>
                            @if ($errors->has('hour_type'))
                                <span id="hour-type-error" class="error text-danger" for="input-hour_type">{{ $errors->first('hour_type') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
              <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('FiscaalNummer') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('fiscal_number') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('fiscal_number') ? ' is-invalid' : '' }}"
                            name="fiscal_number" id="fiscaalnummer" type="text"
                            placeholder="{{ __('FiscaalNummer') }}" value="{{ old('fiscal_number',$company->fiscal_number) }}"
                            />
                            @if ($errors->has('fiscal_number'))
                            <span id="fiscal_number-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('fiscal_number') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('KvKNummer') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('kvk') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('kvk') ? ' is-invalid' : '' }}"
                            name="kvk" id="kvknummer" type="text"
                            placeholder="{{ __('KvKNummer') }}" value="{{ old('kvk',$company->kvk) }}"
                            />
                            @if ($errors->has('kvk'))
                            <span id="kvk-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('kvk') }}</span>
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
										<a href="javascript:void(0);" class="btn btn-primary w-100" id="fillbykvk">Fill<div class="ripple-container"></div></a>
									</div>
            </div>
            <h4 class="mt-2 mb-3 font-weight-bold">Adres</h4>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Straatnaam') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('streat_name') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('streat_name') ? ' is-invalid' : '' }}"
                            name="streat_name" id="straatnaam" type="text"
                            placeholder="{{ __('Straatnaam') }}" value="{{ old('streat_name',$company->streat_name) }}"
                            />
                            @if ($errors->has('streat_name'))
                            <span id="streat_name-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('streat_name') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Huisnummer') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('house_number') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}"
                            name="house_number" id="huisnummer" type="text"
                            placeholder="{{ __('Huisnummer') }}" value="{{ old('house_number',$company->house_number) }}"
                            />
                            @if ($errors->has('house_number'))
                            <span id="house_number-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('house_number') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Huisnummertoevoeging') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('addition') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('addition') ? ' is-invalid' : '' }}"
                            name="addition" id="huisnummertoevoeging" type="text"
                            placeholder="{{ __('Huisnummertoevoeging') }}" value="{{ old('addition',$company->addition) }}"
                            />
                            @if ($errors->has('addition'))
                            <span id="addition-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('addition') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Postcode') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('post_code') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('post_code') ? ' is-invalid' : '' }}"
                            name="post_code" id="postcode" type="text"
                            placeholder="{{ __('Postcode') }}" value="{{ old('post_code',$company->post_code) }}"
                            />
                            @if ($errors->has('post_code'))
                            <span id="post_code-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('post_code') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Plaatsnaam') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('place_name') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('place_name') ? ' is-invalid' : '' }}"
                            name="place_name" id="plaatsnaam" type="text"
                            placeholder="{{ __('Plaatsnaam') }}" value="{{ old('place_name',$company->place_name) }}"
                            />
                            @if ($errors->has('place_name'))
                            <span id="place_name-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('place_name') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <h4 class="mt-2 mb-3 font-weight-bold">CommunicatieadressenDeelnemer</h4>
            <div class="row">
                <label class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{ __('Internetadres') }}</label>
                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="form-group{{ $errors->has('www') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('www') ? ' is-invalid' : '' }}"
                            name="www" id="internetadres" type="text"
                            placeholder="{{ __('Internetadres') }}" value="{{ old('www',$company->www) }}"
                            />
                            @if ($errors->has('www'))
                            <span id="www-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('www') }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
            <input
                            class=""
                            name="id" type="hidden" value="{{ $company->id }}"
                            />
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>
    $( document ).ready(function() {
		$("#fillbykvk").click(function() {
            
            var formData = "kvk=" + $('#kvknummer').val();
            
			$.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			$.ajax({
				url : "https://dashboard.ai-solutions.nl/xml/profile",
				type: "POST",
				data : formData,
				success: function(response, textStatus, jqXHR)
				{
					$(".error").remove();
					if(response.status == "error"){
						$('#kvknummer').after('<span class="error">'+ response.msg +'</span>');
						return;
					}
					
					if(response.data.error){
						$('#kvknummer').after('<span class="error">'+ response.data.error.reason +'</span>');
						return;
					}
					
					if(response.data.data){
						details = response.data.data.items[0];
						console.log(details);
						$('#organisatienaam').val(details.tradeNames.businessName);
						$('#rechtsvorm').val(getRechtsVorm(details.legalForm));
						$('#fiscaalnummer').val(details.rsin);
						$('#kvknummer').val(details.kvkNumber);
						$('#straatnaam').val(details.addresses[0].street);
						$('#huisnummer').val(details.addresses[0].houseNumber);
						$('#huisnummertoevoeging').val(details.addresses[0].houseNumberAddition);
						$('#postcode').val(details.addresses[0].postalCode);
						$('#plaatsnaam').val(details.addresses[0].city);
						$('#internetadres').val(details.websites[0]);
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert("Unable to fill in the form, network error");
				}
			});
        });
		
		
		function getRechtsVorm(str){
			var arr = {
				"vennootschap onder firma" : "VOF",
				"besloten vennootschap" : "BV",
				"besloten vennootschap met gewone structuur" : "BV",
				"cooperatie" : "COOP",
				"naamloze vennootschap" : "NV",
				"stichting" : "STICH",
				"commanditaire vennootschap" : "CV",
				"eenmanszaak" : "1MANS",
			};
			
			return arr[str.toLowerCase()];
		}
		
	});
  </script>
@endpush