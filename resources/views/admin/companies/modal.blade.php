<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ route('company_update') }}" autocomplete="off" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf


            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Edit Company') }}</h4>
                    <input type="hidden" name="company_id" value="{{  $company->id }}">
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-primary">{{
                                __('Back to company page') }}</a>
                        </div>
                    </div>
                    <h4 class="mt-2 mb-3 font-weight-bold"> OrganisatiegegevensDeelnemer</h4>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Company Name') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    id="input-name" type="text" placeholder="{{ __('Name') }}"
                                    value="{{ old('name', $company->name) }}" required="true" aria-required="true" />
                                @if ($errors->has('name'))
                                <span id="name-error" class="error text-danger" for="input-name">{{
                                    $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-7 col-md-7 col-sm-8 col-12 text-right offset-xl-2 offset-lg-3 offset-md-3 offset-sm-4 upload-company">
                        @include('admin.companies.partials.logo')
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Rechtsvorm') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('legal_form') ? ' has-danger' : '' }}">
                                <select name="legal_form" id="rechtsvorm"
                                    class="form-control{{ $errors->has('legal_form') ? ' is-invalid' : '' }}">
                                    <option {{ $company->legal_form == "NV" ? "selected" : '' }}>NV</option>
                                    <option {{ $company->legal_form == "BV" ? "selected" : '' }}>BV</option>
                                    <option {{ $company->legal_form == "COOP" ? "selected" : '' }}>COOP</option>
                                    <option {{ $company->legal_form == "VER" ? "selected" : '' }}>VER</option>
                                    <option {{ $company->legal_form == "STICH" ? "selected" : '' }}>STICH
                                    </option>
                                    <option {{ $company->legal_form == "IMANS" ? "selected" : '' }}>1MANS
                                    </option>
                                    <option {{ $company->legal_form == "VOF" ? "selected" : '' }}>VOF</option>
                                    <option {{ $company->legal_form == "MTS" ? "selected" : '' }}>MTS</option>
                                    <option {{ $company->legal_form == "CV" ? "selected" : '' }}>CV</option>
                                    <option {{ $company->legal_form == "OW" ? "selected" : '' }}>OW</option>
                                    <option {{ $company->legal_form == "EES" ? "selected" : '' }}>EES</option>
                                    <option {{ $company->legal_form == "OV" ? "selected" : '' }}>OV</option>
                                </select>
                                @if ($errors->has('legal_form'))
                                <span id="legal-form-error" class="error text-danger" for="input-legal_form">{{
                                    $errors->first('legal_form') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('HourType') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('hour_type') ? ' has-danger' : '' }}">
                                <select name="hour_type" id="hour_type"
                                    class="form-control{{ $errors->has('hour_type') ? ' is-invalid' : '' }}">
                                    <option value="round" {{ $company->hour_type == "round" ? "selected" : ''
                                        }}>Full Hour</option>
                                    <option value="decimal" {{ $company->hour_type == "decimal" ? "selected" :
                                        '' }}>Decimal</option>
                                </select>
                                @if ($errors->has('hour_type'))
                                <span id="hour-type-error" class="error text-danger" for="input-hour_type">{{
                                    $errors->first('hour_type') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('FiscaalNummer') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('fiscal_number') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('fiscal_number') ? ' is-invalid' : '' }}"
                                    name="fiscal_number" id="fiscaalnummer" type="text"
                                    placeholder="{{ __('FiscaalNummer') }}"
                                    value="{{ old('fiscal_number',$company->fiscal_number) }}" />
                                @if ($errors->has('fiscal_number'))
                                <span id="fiscal_number-error" class="error text-danger" for="input-name">{{
                                    $errors->first('fiscal_number') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Alias') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('alias') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias"
                                    id="alias" type="text" placeholder="{{ __('Alias') }}"
                                    value="{{ old('alias',$company->alias) }}" />
                                @if ($errors->has('alias'))
                                <span id="alias-error" class="error text-danger" for="input-name">{{
                                    $errors->first('alias') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('KvKNummer') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('kvk') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('kvk') ? ' is-invalid' : '' }}" name="kvk"
                                    id="kvknummer" type="text" placeholder="{{ __('KvKNummer') }}"
                                    value="{{ old('kvk',$company->kvk) }}" />
                                @if ($errors->has('kvk'))
                                <span id="kvk-error" class="error text-danger" for="input-name">{{
                                    $errors->first('kvk') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                            <a href="javascript:void(0);" class="btn btn-primary w-100" id="fillbykvk">Fill<div
                                    class="ripple-container"></div></a>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Description') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="description"
                                    style="min-height: 200px;">{{$company->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-2 mb-3 font-weight-bold">Adres</h4>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Straatnaam') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('streat_name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('streat_name') ? ' is-invalid' : '' }}"
                                    name="streat_name" id="straatnaam" type="text" placeholder="{{ __('Straatnaam') }}"
                                    value="{{ old('streat_name',$company->streat_name) }}" />
                                @if ($errors->has('streat_name'))
                                <span id="streat_name-error" class="error text-danger" for="input-name">{{
                                    $errors->first('streat_name') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Huisnummer') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('house_number') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}"
                                    name="house_number" id="huisnummer" type="text" placeholder="{{ __('Huisnummer') }}"
                                    value="{{ old('house_number',$company->house_number) }}" />
                                @if ($errors->has('house_number'))
                                <span id="house_number-error" class="error text-danger" for="input-name">{{
                                    $errors->first('house_number') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Huisnummertoevoeging') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('addition') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('addition') ? ' is-invalid' : '' }}"
                                    name="addition" id="huisnummertoevoeging" type="text"
                                    placeholder="{{ __('Huisnummertoevoeging') }}"
                                    value="{{ old('addition',$company->addition) }}" />
                                @if ($errors->has('addition'))
                                <span id="addition-error" class="error text-danger" for="input-name">{{
                                    $errors->first('addition') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Postcode') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('post_code') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('post_code') ? ' is-invalid' : '' }}"
                                    name="post_code" id="postcode" type="text" placeholder="{{ __('Postcode') }}"
                                    value="{{ old('post_code',$company->post_code) }}" />
                                @if ($errors->has('post_code'))
                                <span id="post_code-error" class="error text-danger" for="input-name">{{
                                    $errors->first('post_code') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Plaatsnaam') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('place_name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('place_name') ? ' is-invalid' : '' }}"
                                    name="place_name" id="plaatsnaam" type="text" placeholder="{{ __('Plaatsnaam') }}"
                                    value="{{ old('place_name',$company->place_name) }}" />
                                @if ($errors->has('place_name'))
                                <span id="place_name-error" class="error text-danger" for="input-name">{{
                                    $errors->first('place_name') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <h4 class="mt-2 mb-3 font-weight-bold">CommunicatieadressenDeelnemer</h4>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Internetadres') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('www') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('www') ? ' is-invalid' : '' }}" name="www"
                                    id="internetadres" type="text" placeholder="{{ __('Internetadres') }}"
                                    value="{{ old('www',$company->www) }}" />
                                @if ($errors->has('www'))
                                <span id="www-error" class="error text-danger" for="input-name">{{
                                    $errors->first('www') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Linkedin Addres') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('linkdin_address') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('linkdin_address') ? ' is-invalid' : '' }}"
                                    name="linkdin_address" id="internetadres" type="text"
                                    placeholder="{{ __('Linkedin Addres') }}"
                                    value="{{ old('linkdin_address',$company->linkdin_address) }}" />
                                @if ($errors->has('linkdin_address'))
                                <span id="linkdin_address-error" class="error text-danger" for="input-name">{{
                                    $errors->first('linkdin_address') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Twitter') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                    name="twitter" id="internetadres" type="text" placeholder="{{ __('Twitter') }}"
                                    value="{{ old('twitter',$company->twitter) }}" />
                                @if ($errors->has('twitter'))
                                <span id="twitter-error" class="error text-danger" for="input-name">{{
                                    $errors->first('twitter') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                            __('Tags') }}</label>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                            <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags"
                                    id="internetadres" type="text" placeholder="{{ __('tags') }}"
                                    value="{{ old('tags',$company->twitter) }}" />
                                @if ($errors->has('tags'))
                                <span id="twitter-error" class="error text-danger" for="input-name">{{
                                    $errors->first('tags') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                            {{__('Projects status')}}
                       </label>
                       <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                       <label class="switch">
                            <input type="checkbox" onclick="toggle('projects',this)"
                                id="{{$company->id}}" {{ $company->project_status == 1 ? "checked" :
                            ""}} />
                            <span class="slider round"></span>
                        </label>
                       </div>
                    </div>

                    <input class="" name="id" type="hidden" value="{{ $company->id }}" />
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
        </form>
    </div>
</div>