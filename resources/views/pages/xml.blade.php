@extends('layouts.app', ['activePage' => 'xml-docs', 'titlePage' => __('XML Docs')])
@section('page-script-head')
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
	<style>
		.a-bare{
			color: #fff;
		}
		.a-bare:hover, .a-bare:visited, .a-bare:active{
			color: #fff;
		}
		.month-card{
		}
		.day{
			font-size: 10px;
			text-align: center;
		}
		.attachment{}
		.task{
			font-size: 11px;
			font-weight: bold;
		}
		.task-title{}
		.wrapper{
			height: auto;
			min-height: 100%;
		}
		.form-row .form-row-f { margin:  0 -1.5em; }
		.col-f      { padding: 0  1.5em; }

		.form-row:after {
			content: "";
			clear: both;
			display: table;
		}

		@media only screen { .col-f {
			float: left;
			width: 2.85%;
			box-sizing: border-box;
		}}
		@media only screen { .col-f-2 {
			float: left;
			width: 8.5%;
			box-sizing: border-box;
		}}
		
		.ui-datepicker-calendar {
			display: none;
		}
		
		.vcenter {
			margin-top: auto;
			margin-bottom: auto;
		}
		
		#ModalMonth{
			display: none;
		}
		
		h4 {
			font-weight: bolder;
		}
		
		.bottom-col {
			height: fit-content;
			margin-top: auto;
		}
		
		.error {
		  color: red;
		  margin-left: 5px;
		}
	</style>
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
		<div class="col-12">
			<div class="card" id="normal-first">
				<div class="card-header card-header-primary">
					AanvraagVomvrijWbsoExtern-0.9
					<span style="float: right; margin-right: 50px">
						<a href="javascript:void(0);" class="a-bare" id="normal-mode" title="AanvraagVomvrijWbsoExtern-0.9"><i class="material-icons">looks_one</i></a>
						<a href="javascript:void(0);" class="a-bare" id="sheet-mode" title="AanvraagWbsoExtern-1.8"><i class="material-icons">looks_two</i></a>
						<!--<a href="javascript:void(0);" class="a-bare" id="expand-compact" title="Expand/Compact"><i class="material-icons">code</i></a>-->
					</span>
				</div>
				<div class="card-body">
					<form action="{{route('xml.store')}}" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="xmlid" value="0">
						
						<div class="form-row" id="dossierdeelnemers">
							<div class="form-group col" style="margin: auto; padding: 0;">
								<!--<h4>Dossierdeelnemer</h4>-->
							</div>
							<!---<div class="form-group col">
								<a class="btn btn-primary" style="float: right;" href="javascript:void(0);" id="add-dossier">Add Dossierdeelnemer</a>
							</div>-->
						</div>
						
						<div class="form-row">
							<div class="form-group col">
								<a href="javascript:void(0);" class="btn btn-success" style="float: right;" id="generate-xml">Generate XML</a>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer text-muted">
				</div>
			</div>
			<div class="card" id="normal-second" style="display: none">
				<div class="card-header card-header-primary">
					AanvraagWbsoExtern-1.8
					<span style="float: right; margin-right: 50px">
						<a href="javascript:void(0);" class="a-bare" id="normal-mode2" title="AanvraagVomvrijWbsoExtern-0.9"><i class="material-icons">looks_one</i></a>
						<a href="javascript:void(0);" class="a-bare" id="sheet-mode2" title="AanvraagWbsoExtern-1.8"><i class="material-icons">looks_two</i></a>
						<!--<a href="javascript:void(0);" class="a-bare" id="expand-compact" title="Expand/Compact"><i class="material-icons">code</i></a>-->
					</span>
				</div>
				<div class="card-body">
					<form action="{{route('xml.store')}}" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="xmlid" value="0">
						
						<div class="form-row" id="dossierdeelnemers">
							<div class="form-group col" style="margin: auto; padding: 0;">
								<!--<h4>Dossierdeelnemer</h4>-->
							</div>
							<!---<div class="form-group col">
								<a class="btn btn-primary" style="float: right;" href="javascript:void(0);" id="add-dossier">Add Dossierdeelnemer</a>
							</div>-->
						</div>
						
						<div class="form-row">
							<div class="form-group col">
								<a href="javascript:void(0);" class="btn btn-success" style="float: right;" id="generate-xml">Generate XML</a>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer text-muted">
				</div>
			</div>
			@include('includes.errors')
		</div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $( document ).ready(function() {
		
		var curAttachmentCount = 0;
		var curDossierCount = 0;
		var generating = false;
		
		registerListeners();
		onAddDossierdeelnemer();
		
		function registerListeners(){
			$('#add-attachment').on('click', onAddAttachment);
			$('#add-dossier').on('click', onAddDossierdeelnemer);
			$('#generate-xml').on('click', onGenerateXml);
			$('#normal-mode').on('click', onFirstSheet);
			$('#sheet-mode').on('click', onSecondSheet);
			$('#normal-mode2').on('click', onFirstSheet);
			$('#sheet-mode2').on('click', onSecondSheet);
		}
		
		function onFirstSheet(){
			$('#normal-first').show();
			$('#normal-second').hide();
		}
		function onSecondSheet(){
			$('#normal-second').show();
			$('#normal-first').hide();
		}
		
		function onFillFormByKvK(){
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
		}
		
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
		
		function onGenerateXml(){
			if(generating)
				return;
			generating = true;
			
			var shouldExit = false;
			$(".error").remove();
			var today = new Date();
			var bid = '' + String(today.getDate()).padStart(2, '0') + String(today.getMonth() + 1).padStart(2, '0') + ('' + today.getFullYear()).substr(2) + '_' +Date.now();
			var xml = '<Import><Formulier>380WBSO_VORMVRIJ</Formulier><Bericht_ID>'+ bid +'</Bericht_ID><Afzender>ikhan@ai-solutions.nl</Afzender><Xml><![CDATA[';
			
			xml += '<Bericht xmlns="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern" xsi:schemaLocation="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern schema.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
			
			/*
			xml += '<Attachments>';
			$('.attachment').each(function(index){
				xml += '<Attachment>';
				xml += '<AttachmentDescription>'+ $(this).find('#attachment-desc').val() +'</AttachmentDescription>';
				xml += '<AttachmentContent>'+ $(this).find('#attachment-content').val() +'</AttachmentContent>';
				xml += '</Attachment>';
			});
			xml += '</Attachments>';
			*/
			
			xml += '<WbsoAanvraag>';
			xml += '<WbsoDossierAlgemeen>';
			xml += '<WbsoAanvraagjaar>2020</WbsoAanvraagjaar>';
			xml += '<WbsoVorigAanvraagnummer/>';
			xml += '<WbsoEerderAangevraagd>N</WbsoEerderAangevraagd>';
			xml += '</WbsoDossierAlgemeen>';
			xml += '</WbsoAanvraag>';
			
			xml += '<AanvraagAlgemeen>';
			xml += '<DossierAlgemeen>';
			xml += '<Aanvraagnaam>WBSO</Aanvraagnaam>';
			xml += '</DossierAlgemeen>';
			xml += '<Dossierdeelnemers>';
			$('.dossier').each(function(index){
				var telemob = $(this).find('#telefoonnummermobiel').val();
				var tele = $(this).find('#telefoonnummer').val();
				
				var reg = /^\d+$/;
				var bmob = (telemob.length === 10 && reg.test(telemob));
				var btele = (tele.length === 10 && reg.test(tele));
				
				if(!bmob && !btele){
					$(this).find('#telefoonnummermobiel').after('<span class="error">Please enter 10 digits</span>');
					$(this).find('#telefoonnummermobiel').focus();
					$(this).find('#telefoonnummer').after('<span class="error">Please enter 10 digits</span>');
					shouldExit = true;
					return;
				}
				
				xml += '<Dossierdeelnemer>';
				xml += '<DeelnemerOrganisatie>';
				xml += '<Deelnemerrol>ANV</Deelnemerrol>';
				xml += '<OrganisatiegegevensDeelnemer>';
				xml += '<Organisatienaam>'+ $(this).find('#organisatienaam').val() +'</Organisatienaam>';
				xml += '<Rechtsvorm>'+ $(this).find('#rechtsvorm').val() +'</Rechtsvorm>';
				//xml += '<RechtsvormAfwijkend>'+ $(this).find('#rechtsvormafwijkend').val() +'</RechtsvormAfwijkend>';
				xml += '<KvKNummer>'+ $(this).find('#kvknummer').val() +'</KvKNummer>';
				xml += '<FiscaalNummer>'+ $(this).find('#fiscaalnummer').val() +'</FiscaalNummer>';
				xml += '</OrganisatiegegevensDeelnemer>';
				xml += '<Adressen>';
				xml += '<Adres>';
				xml += '<Adressoort>VST</Adressoort>';
				xml += '<Straatnaam>'+ $(this).find('#straatnaam').val() +'</Straatnaam>';
				xml += '<Huisnummer>'+ $(this).find('#huisnummer').val() +'</Huisnummer>';
				xml += '<Huisnummertoevoeging>'+ $(this).find('#huisnummertoevoeging').val() +'</Huisnummertoevoeging>';
				xml += '<Postcode>'+ $(this).find('#postcode').val() +'</Postcode>';
				xml += '<Plaatsnaam>'+ String($(this).find('#plaatsnaam').val()).toUpperCase() +'</Plaatsnaam>';
				xml += '</Adres>';
				xml += '<Adres>';
				xml += '<Adressoort>COR</Adressoort>';
				xml += '<Straatnaam>'+ $(this).find('#straatnaam').val() +'</Straatnaam>';
				xml += '<Huisnummer>'+ $(this).find('#huisnummer').val() +'</Huisnummer>';
				xml += '<Huisnummertoevoeging>'+ $(this).find('#huisnummertoevoeging').val() +'</Huisnummertoevoeging>';
				xml += '<Postcode>'+ $(this).find('#postcode').val() +'</Postcode>';
				xml += '<Plaatsnaam>'+ String($(this).find('#plaatsnaam').val()).toUpperCase() +'</Plaatsnaam>';
				xml += '</Adres>';
				xml += '</Adressen>';
				xml += '<CommunicatieadressenDeelnemer>';
				//xml += '<Emailadres>'+ $(this).find('#emailadres').val() +'</Emailadres>';
				xml += '<Internetadres>'+ $(this).find('#internetadres').val() +'</Internetadres>';
				//xml += '<TelefoonnummerMobiel>'+ $(this).find('#telefoonnummermobiel').val() +'</TelefoonnummerMobiel>';
				//xml += '<Telefoonnummer>'+ $(this).find('#telefoonnummer').val() +'</Telefoonnummer>';
				xml += '</CommunicatieadressenDeelnemer>';
				xml += '<ContactpersonenDeelnemer>';
				xml += '<ContactpersoonDeelnemer>';
				xml += '<Contactpersoonrol>CON</Contactpersoonrol>';
				xml += '<CommunicatieadressenDeelnemer>';
				xml += '<Emailadres>'+ $(this).find('#emailadres').val() +'</Emailadres>';
				//xml += '<Internetadres>'+ $(this).find('#internetadres').val() +'</Internetadres>';
				//xml += '<TelefoonnummerMobiel>'+ $(this).find('#telefoonnummermobiel').val() +'</TelefoonnummerMobiel>';
				xml += '<Telefoonnummer>'+ $(this).find('#telefoonnummer').val() +'</Telefoonnummer>';
				xml += '</CommunicatieadressenDeelnemer>';
				xml += '<PersoonsgegevensContactpersoon>';
				xml += '<Titel>'+ $(this).find('#titel').val() +'</Titel>';
				xml += '<Voorletters>'+ $(this).find('#voorletters').val() +'</Voorletters>';
				xml += '<Voornaam>'+ $(this).find('#voornaam').val() +'</Voornaam>';
				xml += '<Tussenvoegsels>'+ $(this).find('#tussenvoegsels').val() +'</Tussenvoegsels>';
				xml += '<Achternaam>'+ $(this).find('#achternaam').val() +'</Achternaam>';
				xml += '<Geslacht>'+ $(this).find('#geslacht').val() +'</Geslacht>';
				xml += '</PersoonsgegevensContactpersoon>';
				xml += '</ContactpersoonDeelnemer>';
				xml += '</ContactpersonenDeelnemer>';
				xml += '</DeelnemerOrganisatie>';
				xml += '</Dossierdeelnemer>';
			});
			
			if(shouldExit){
				generating = false;
				return;
			}
			 
			xml += '<Dossierdeelnemer><DeelnemerOrganisatie><Deelnemerrol>INT</Deelnemerrol><OrganisatiegegevensDeelnemer><Organisatienaam>Ai Solutions</Organisatienaam><Rechtsvorm>BV</Rechtsvorm><RechtsvormAfwijkend/><KvKNummer>67881394</KvKNummer><FiscaalNummer/></OrganisatiegegevensDeelnemer><Adressen><Adres><Adressoort>VST</Adressoort><Straatnaam>Stationsweg</Straatnaam><Huisnummer>41</Huisnummer><Huisnummertoevoeging>F</Huisnummertoevoeging><Postcode>3331LR</Postcode><Plaatsnaam>ZWIJNDRECHT</Plaatsnaam></Adres></Adressen><CommunicatieadressenDeelnemer><Emailadres>ikhan@ai-solutions.nl</Emailadres><Internetadres>www.ai-solutions.nl</Internetadres><TelefoonnummerMobiel>0644232665</TelefoonnummerMobiel><Telefoonnummer>0104232665</Telefoonnummer></CommunicatieadressenDeelnemer><ContactpersonenDeelnemer><ContactpersoonDeelnemer><PersoonsgegevensContactpersoon><Titel>ing</Titel><Voorletters>I</Voorletters><Voornaam>Imran</Voornaam><Tussenvoegsels/><Achternaam>Khan</Achternaam><Geslacht>M</Geslacht></PersoonsgegevensContactpersoon><CommunicatieadressenDeelnemer><Emailadres>ikhan@ai-solutions.nl</Emailadres><Internetadres>www.ai-solutions.nl</Internetadres><TelefoonnummerMobiel>0644232665</TelefoonnummerMobiel><Telefoonnummer>0104232665</Telefoonnummer></CommunicatieadressenDeelnemer><Contactpersoonrol>CON</Contactpersoonrol></ContactpersoonDeelnemer></ContactpersonenDeelnemer></DeelnemerOrganisatie></Dossierdeelnemer>';
			
			xml += '</Dossierdeelnemers>';
			xml += '</AanvraagAlgemeen>';
			xml += '<Formulier>380WBSO_VORMVRIJ</Formulier><XSDVersie>0.9</XSDVersie>';
			xml += '</Bericht>';
			
			xml += ']]></Xml></Import>';
			
			var blob = new Blob([xml], {type: 'application/octet-stream'});
			const url = window.URL.createObjectURL(blob);
			const a = document.createElement('a');
			a.style.display = 'none';
			a.href = url;
			// the filename you want
			a.download = 'generated.xml';
			document.body.appendChild(a);
			a.click();
			window.URL.revokeObjectURL(url);
			generating = false;
		}
		
		function onRemoveById(event){
			$("#" + event.data.id).remove();
		}
		
		function onAddAttachment(){
			var html = `
						<div class="form-row attachment" id="attachment-`+ ++curAttachmentCount +`">
							<div class="form-group col-5">
								<label for="attachment-desc">Attachment Description</label>
								<input type="text" name="attachment-desc" id="attachment-desc" class="form-control"/>
							</div>
							<div class="form-group col-5">
								<label for="attachment-content">Attachment Content(Base64)</label>
								<input type="text" name="attachment-content" id="attachment-content" class="form-control"/>
							</div>
							<div class="form-group col-2">
								<a href="javascript:void(0);" class="btn btn-danger" style="float: right;" id="attachment-`+ curAttachmentCount +`-remove">Remove</a>
							</div>
						</div>
			`;
			$(html).insertAfter('#attachments');
			$("#attachment-"+ curAttachmentCount +"-remove").click({id: "attachment-"+ curAttachmentCount}, onRemoveById);
		}
		function onAddDossierdeelnemer(){
			var html = `
						<div class="form-row dossier" id="dossierdeelnemer-`+ ++curDossierCount +`">
							<div class="form-group col">
								<!--<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="deelnemerrol">Deelnemerrol</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										<select name="deelnemerrol" id="deelnemerrol" class="form-control">
											<option selected>ANV</option>
											<option>INT</option>
										</select>
									</div>
									<div class="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>OrganisatiegegevensDeelnemer</h4>
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="organisatienaam">Organisatienaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="organisatienaam" id="organisatienaam" class="form-control" maxlength="125" value="Ai Solutions"/>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="rechtsvorm">Rechtsvorm</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="rechtsvorm" id="rechtsvorm" class="form-control">
											<option>NV</option>
											<option>BV</option>
											<option>COOP</option>
											<option>VER</option>
											<option>STICH</option>
											<option>1MANS</option>
											<option selected>VOF</option>
											<option>MTS</option>
											<option>CV</option>
											<option>OW</option>
											<option>EES</option>
											<option>OV</option>
										</select>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="fiscaalnummer">FiscaalNummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="fiscaalnummer" id="fiscaalnummer" class="form-control" maxlength="10" value="857211493"/>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="kvknummer">KvKNummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="kvknummer" id="kvknummer" class="form-control" maxlength="8" value="67881394"/>
									</div>
									<div class="col-1">
										<a href="javascript:void(0);" class="btn btn-primary" id="fillbykvk">Fill</a>
									</div>
								</div>
								<!--<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="rechtsvormafwijkend">RechtsvormAfwijkend</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="rechtsvormafwijkend" id="rechtsvormafwijkend" class="form-control" maxlength="30"/>
									</div>
									<div class="col-1">
									</div>
								</div>-->
								<!--<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="adressoort" >Adressoort</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="adressoort" id="adressoort" class="form-control">
											<option selected>VST</option>
											<option>COR</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>Adres</h4>
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="straatnaam">Straatnaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="straatnaam" id="straatnaam" class="form-control" maxlength="60" value="Stationsweg"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="huisnummer">Huisnummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="huisnummer" id="huisnummer" class="form-control" maxlength="6" value="41"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="huisnummertoevoeging">Huisnummertoevoeging</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="huisnummertoevoeging" id="huisnummertoevoeging" class="form-control" maxlength="12"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="postcode">Postcode</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="postcode" id="postcode" class="form-control" maxlength="6" value="3331LR"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="plaatsnaam">Plaatsnaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="plaatsnaam" id="plaatsnaam" class="form-control" maxlength="30" value="Zwijndrecht"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>CommunicatieadressenDeelnemer</h4>
									</div>
								</div>
								
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="internetadres">Internetadres</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="internetadres" id="internetadres" class="form-control" maxlength="60" value="www.ai-solutions.nl"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								
								
								<!--<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="contactpersoonrol">Contactpersoonrol</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="contactpersoonrol" id="contactpersoonrol" class="form-control">
											<option selected>CON</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>PersoonsgegevensContactpersoon</h4>
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="titel">Titel</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="titel" id="titel" class="form-control" maxlength="50"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="voorletters">Voorletters</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="voorletters" id="voorletters" class="form-control" maxlength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="voornaam">Voornaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="voornaam" id="voornaam" class="form-control" maxlength="30"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="tussenvoegsels">Tussenvoegsels</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="tussenvoegsels" id="tussenvoegsels" class="form-control" maxlength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="achternaam">Achternaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="achternaam" id="achternaam" class="form-control" maxlength="60"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="geslacht">Geslacht</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="geslacht" id="geslacht" class="form-control">
											<option selected>M</option>
											<option>V</option>
											<option>O</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="emailadres">Emailadres</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="emailadres" id="emailadres" class="form-control" maxlength="60"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="telefoonnummermobiel">Mobiel</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="telefoonnummermobiel" id="telefoonnummermobiel" class="form-control" data-validator="required|min:10|max:10" maxLength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="telefoonnummer">Telefoonnummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="telefoonnummer" id="telefoonnummer" class="form-control"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
							</div>
						</div>
			`;
			$(html).insertAfter('#dossierdeelnemers');
			$('#fillbykvk').on('click', onFillFormByKvK);
			//$("#dossier-"+ curDossierCount +"-remove").click({id: "dossierdeelnemer-"+ curDossierCount}, onRemoveById);
		}
		function onAddDossierdeelnemer2(){
			var html = `
						<div class="form-row dossier" id="dossierdeelnemer-`+ ++curDossierCount +`">
							<div class="form-group col">
								<!--<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="deelnemerrol">Deelnemerrol</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										<select name="deelnemerrol" id="deelnemerrol" class="form-control">
											<option selected>ANV</option>
											<option>INT</option>
										</select>
									</div>
									<div class="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>OrganisatiegegevensDeelnemer</h4>
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="organisatienaam">Organisatienaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="organisatienaam" id="organisatienaam" class="form-control" maxlength="125" value="Ai Solutions"/>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="rechtsvorm">Rechtsvorm</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="rechtsvorm" id="rechtsvorm" class="form-control">
											<option>NV</option>
											<option>BV</option>
											<option>COOP</option>
											<option>VER</option>
											<option>STICH</option>
											<option>1MANS</option>
											<option selected>VOF</option>
											<option>MTS</option>
											<option>CV</option>
											<option>OW</option>
											<option>EES</option>
											<option>OV</option>
										</select>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="fiscaalnummer">FiscaalNummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="fiscaalnummer" id="fiscaalnummer" class="form-control" maxlength="10" value="857211493"/>
									</div>
									<div class="col-1">
									</div>
								</div>
								<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="kvknummer">KvKNummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="kvknummer" id="kvknummer" class="form-control" maxlength="8" value="67881394"/>
									</div>
									<div class="col-1">
										<a href="javascript:void(0);" class="btn btn-primary" id="fillbykvk">Fill</a>
									</div>
								</div>
								<!--<div class="form-row" id="deelnemerorganisatie">
									<div class="col-4 bottom-col">
										<label for="rechtsvormafwijkend">RechtsvormAfwijkend</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="rechtsvormafwijkend" id="rechtsvormafwijkend" class="form-control" maxlength="30"/>
									</div>
									<div class="col-1">
									</div>
								</div>-->
								<!--<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="adressoort" >Adressoort</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="adressoort" id="adressoort" class="form-control">
											<option selected>VST</option>
											<option>COR</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>Adres</h4>
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="straatnaam">Straatnaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="straatnaam" id="straatnaam" class="form-control" maxlength="60" value="Stationsweg"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="huisnummer">Huisnummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="huisnummer" id="huisnummer" class="form-control" maxlength="6" value="41"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="huisnummertoevoeging">Huisnummertoevoeging</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="huisnummertoevoeging" id="huisnummertoevoeging" class="form-control" maxlength="12"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="postcode">Postcode</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="postcode" id="postcode" class="form-control" maxlength="6" value="3331LR"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="adressen">
									<div class="col-4 bottom-col">
										<label for="plaatsnaam">Plaatsnaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="plaatsnaam" id="plaatsnaam" class="form-control" maxlength="30" value="Zwijndrecht"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>CommunicatieadressenDeelnemer</h4>
									</div>
								</div>
								
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="internetadres">Internetadres</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="internetadres" id="internetadres" class="form-control" maxlength="60" value="www.ai-solutions.nl"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								
								
								<!--<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="contactpersoonrol">Contactpersoonrol</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="contactpersoonrol" id="contactpersoonrol" class="form-control">
											<option selected>CON</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>-->
								<div class="form-row" style="margin-top: 16px;">
									<div class="form-group col">
										<h4>PersoonsgegevensContactpersoon</h4>
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="titel">Titel</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="titel" id="titel" class="form-control" maxlength="50"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="voorletters">Voorletters</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="voorletters" id="voorletters" class="form-control" maxlength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="voornaam">Voornaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="voornaam" id="voornaam" class="form-control" maxlength="30"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="tussenvoegsels">Tussenvoegsels</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="tussenvoegsels" id="tussenvoegsels" class="form-control" maxlength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="achternaam">Achternaam</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="achternaam" id="achternaam" class="form-control" maxlength="60"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="contactpersoondeelnemer">
									<div class="col-4 bottom-col">
										<label for="geslacht">Geslacht</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<select name="geslacht" id="geslacht" class="form-control">
											<option selected>M</option>
											<option>V</option>
											<option>O</option>
										</select>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="emailadres">Emailadres</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="emailadres" id="emailadres" class="form-control" maxlength="60"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="telefoonnummermobiel">Mobiel</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="telefoonnummermobiel" id="telefoonnummermobiel" class="form-control" data-validator="required|min:10|max:10" maxLength="10"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
								
								<div class="form-row" id="communicatieadressendeelnemer">
									<div class="col-4 bottom-col">
										<label for="telefoonnummer">Telefoonnummer</label>
									</div>
									<div clas="col-1">
									</div>
									<div class="form-group col-6">
										
										<input type="text" name="telefoonnummer" id="telefoonnummer" class="form-control"/>
									</div>
									<div clas="col-1">
									</div>
								</div>
							</div>
						</div>
			`;
			$(html).insertAfter('#dossierdeelnemers');
			$('#fillbykvk').on('click', onFillFormByKvK);
			//$("#dossier-"+ curDossierCount +"-remove").click({id: "dossierdeelnemer-"+ curDossierCount}, onRemoveById);
		}
	});
  </script>
@endpush
