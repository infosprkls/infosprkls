@extends('layouts.app', ['activePage' => 'company-management', 'titlePage' => __('Company Management')])

@section('content')
<style>

.tags-input-wrapper {
    background: transparent;
    padding: 5px;
    border-radius: 4px;
    max-width: 100%;
    border-bottom: 1px solid #ccc;
}
.tags-input-wrapper input{
    border: none;
    background: transparent;
    outline: none;
    width: 140px;
    
}
.tags-input-wrapper .tag{
    display: inline-block;
    background-color: #fa0e7e;
    color: white;
    border-radius: 40px;
    padding: 0px 3px 0px 7px;
    margin-right: 5px;
    margin-bottom:5px;
    background-color: #9c27b0;
    border-color: #9c27b0;
    box-shadow: 0 2px 2px 0 rgb(156 39 176 / 14%), 0 3px 1px -2px rgb(156 39 176 / 20%), 0 1px 5px 0 rgb(156 39 176 / 12%);
}
.tags-input-wrapper .tag a {
    margin: 0 7px 3px;
    display: inline-block;
    cursor: pointer;
}
    </style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('companies.store') }}" autocomplete="off" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Company') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="javascript:void(0)"   onclick="window.history.back();"class="btn btn-sm btn-primary">{{ __('Back
                                        to list') }}</a>
                                </div>
                            </div>
                            {{--Company Name--}}
                            <h4 class="mt-2 mb-3 font-weight-bold">OrganisatiegegevensDeelnemer</h4>
                            <div class="row">
                                <label
                                    class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">{{
                                    __('Organisatienaam') }}</label>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="organisatienaam" type="text"
                                            placeholder="{{ __('Organisatienaam') }}" value="{{ old('name') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{
                                            $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- //// -->

                            <!-- <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Company Contact User') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('_id') ? ' has-danger' : '' }}">
                                            <div class="form-group">
                                                <select class="form-control" name="contact_user_id"
                                                        id="input-contact_user_id">
                                                    <option value="null">Select a user</option>
                                                    {{--TODO find a better solution to this--}}
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->username}}
                                                            - {{ $user->firstname }}
                                                            - {{ $user->lastname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('contact_user_id'))
                                                <span id="contact_user_id-error" class="error text-danger"
                                                      for="input-contact_user_id">{{ $errors->first('contact_user_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> -->
                            <div
                                class="col-lg-7 col-md-7 col-sm-8 col-12 text-right offset-xl-2 offset-lg-3 offset-md-3 offset-sm-4 upload-company">
                                {{--Logo--}}
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
                                            <option selected>NV</option>
                                            <option>BV</option>
                                            <option>COOP</option>
                                            <option>VER</option>
                                            <option>STICH</option>
                                            <option>1MANS</option>
                                            <option>VOF</option>
                                            <option>MTS</option>
                                            <option>CV</option>
                                            <option>OW</option>
                                            <option>EES</option>
                                            <option>OV</option>
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
                                    __('FiscaalNummer') }}</label>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12">
                                    <div class="form-group{{ $errors->has('fiscal_number') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('fiscal_number') ? ' is-invalid' : '' }}"
                                            name="fiscal_number" id="fiscaalnummer" type="text"
                                            placeholder="{{ __('FiscaalNummer') }}"
                                            value="{{ old('fiscal_number') }}" />
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
                                        <input class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}"
                                            name="alias" id="alias" type="text" placeholder="{{ __('Alias') }}"
                                            value="{{ old('alias') }}" />
                                        @if ($errors->has('alias'))
                                        <span id="fiscal_number-error" class="error text-danger" for="input-name">{{
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
                                        <input class="form-control{{ $errors->has('kvk') ? ' is-invalid' : '' }}"
                                            name="kvk" id="kvknummer" type="text" placeholder="{{ __('KvKNummer') }}"
                                            value="{{ old('kvk') }}" />
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
                                            style="min-height: 200px;"></textarea>
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
                                        <input
                                            class="form-control{{ $errors->has('streat_name') ? ' is-invalid' : '' }}"
                                            name="streat_name" id="straatnaam" type="text"
                                            placeholder="{{ __('Straatnaam') }}" value="{{ old('streat_name') }}" />
                                        @if ($errors->has('streat_name'))
                                        <span id="streat_name-error" class="error text-danger"
                                            for="input-streat_name">{{ $errors->first('streat_name') }}</span>
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
                                        <input
                                            class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}"
                                            name="house_number" id="huisnummer" type="text"
                                            placeholder="{{ __('Huisnummer') }}" value="{{ old('house_number') }}" />
                                        @if ($errors->has('house_number'))
                                        <span id="house_number-error" class="error text-danger"
                                            for="input-house_number">{{ $errors->first('house_number') }}</span>
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
                                            value="{{ old('addition') }}" />
                                        @if ($errors->has('addition'))
                                        <span id="haddition-error" class="error text-danger" for="input-house_number">{{
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
                                            name="post_code" id="postcode" type="text"
                                            placeholder="{{ __('Postcode') }}" value="{{ old('post_code') }}" />
                                        @if ($errors->has('post_code'))
                                        <span id="post_code-error" class="error text-danger" for="input-house_number">{{
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
                                            name="place_name" id="plaatsnaam" type="text"
                                            placeholder="{{ __('Plaatsnaam') }}" value="{{ old('place_name') }}" />
                                        @if ($errors->has('place_name'))
                                        <span id="place_name-error" class="error text-danger" for="input-place_name">{{
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
                                        <input class="form-control{{ $errors->has('www') ? ' is-invalid' : '' }}"
                                            name="www" id="internetadres" type="text"
                                            placeholder="{{ __('Internetadres') }}" value="{{ old('www') }}" />
                                        @if ($errors->has('www'))
                                        <span id="www-error" class="error text-danger" for="input-www">{{
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
                                        <input
                                            class="form-control{{ $errors->has('linkdin_address') ? ' is-invalid' : '' }}"
                                            name="linkdin_address" id="internetadres" type="text"
                                            placeholder="{{ __('Linkedin Addres') }}"
                                            value="{{ old('linkdin_address') }}" />
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
                                            name="twitter" id="twitter" type="text"
                                            placeholder="{{ __('Twitter') }}" value="{{ old('twitter') }}" />
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
                                        <input class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                                            name="tags" id="tag-input1"  type="text" placeholder="{{ __('tags') }}"
                                            value="{{ old('tags') }}" />
                                        @if ($errors->has('tags'))
                                        <span id="twitter-error" class="error text-danger" for="input-name">{{
                                            $errors->first('tags') }}</span>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Company') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
  (function(){

    "use strict"

    
    // Plugin Constructor
    var TagsInput = function(opts){
        this.options = Object.assign(TagsInput.defaults , opts);
        this.init();
    }

    // Initialize the plugin
    TagsInput.prototype.init = function(opts){
        this.options = opts ? Object.assign(this.options, opts) : this.options;

        if(this.initialized)
            this.destroy();
            
        if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
            console.error("tags-input couldn't find an element with the specified ID");
            return this;
        }

        this.arr = [];
        this.wrapper = document.createElement('div');
        this.input = document.createElement('input'); 

        init(this);
        initEvents(this);

        this.initialized =  true;
        return this;
    }

    // Add Tags
    TagsInput.prototype.addTag = function(string){

        if(this.anyErrors(string))
            return ;

        this.arr.push(string);
        var tagInput = this;
     

        var tag = document.createElement('span');
        tag.className = this.options.tagClass;
        $('#tag-input1').val(string);
        console.log(string);
        tag.innerText = string;

        var closeIcon = document.createElement('a');
        closeIcon.innerHTML = '&times;';
        
        // delete the tag when icon is clicked
        closeIcon.addEventListener('click' , function(e){
            e.preventDefault();
            var tag = this.parentNode;

            for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
                if(tagInput.wrapper.childNodes[i] == tag)
                    tagInput.deleteTag(tag , i);
            }
        })


        tag.appendChild(closeIcon);
        this.wrapper.insertBefore(tag , this.input);
        this.orignal_input.value = this.arr.join(',');

        return this;
    }

    // Delete Tags
    TagsInput.prototype.deleteTag = function(tag , i){
        tag.remove();
        this.arr.splice( i , 1);
        this.orignal_input.value =  this.arr.join(',');
        return this;
    }

    // Make sure input string have no error with the plugin
    TagsInput.prototype.anyErrors = function(string){
        if( this.options.max != null && this.arr.length >= this.options.max ){
            console.log('max tags limit reached');
            return true;
        }
        
        if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
            console.log('duplicate found " '+string+' " ')
            return true;
        }

        return false;
    }

    // Add tags programmatically 
    TagsInput.prototype.addData = function(array){
        var plugin = this;
        
        array.forEach(function(string){
            plugin.addTag(string);
        })
        return this;
    }

    // Get the Input String
    TagsInput.prototype.getInputString = function(){
        return this.arr.join(',');
    }


    // destroy the plugin
    TagsInput.prototype.destroy = function(){
        this.orignal_input.removeAttribute('hidden');

        delete this.orignal_input;
        var self = this;
        
        Object.keys(this).forEach(function(key){
            if(self[key] instanceof HTMLElement)
                self[key].remove();
            
            if(key != 'options')
                delete self[key];
        });

        this.initialized = false;
    }

    // Private function to initialize the tag input plugin
    function init(tags){
        tags.wrapper.append(tags.input);
        tags.wrapper.classList.add(tags.options.wrapperClass);
        tags.orignal_input.setAttribute('hidden' , 'true');
        tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
    }

    // initialize the Events
    function initEvents(tags){
        tags.wrapper.addEventListener('click' ,function(){
            tags.input.focus();           
        });
        

        tags.input.addEventListener('keydown' , function(e){
            var str = tags.input.value.trim(); 

            if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
            {
                e.preventDefault();
                tags.input.value = "";
                if(str != "")
                    tags.addTag(str);
            }

        });
    }


    // Set All the Default Values
    TagsInput.defaults = {
        selector : '',
        wrapperClass : 'tags-input-wrapper',
        tagClass : 'tag',
        max : null,
        duplicate: false
    }

    window.TagsInput = TagsInput;

})();

 var tagInput1 = new TagsInput({
            selector: 'tag-input1',
            duplicate : false,
            max : 10
        });
        
    
</script>
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