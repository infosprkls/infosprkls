@extends('layouts.user_accept', ['activePage' => 'license-agreement', 'titlePage' => __('License Agreement')])
@section('page-script-head')
<link href="{{ asset('material') }}/css/accept_terms.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')
<div class="content pt-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
        <section class="privacy" >
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
            <h4 class="mb-0">License Agreement</h4>
            </div>
            <div class="fc-right">
              <div class="fc-button-group">
                <button type="button" class="fc-dayGridMonth-button fc-button fc-button-primary english_button {{ $key=='license_english'?'fc-button-active':'' }}" id="english_button">English</button>
                <button type="button" class="fc-timeGridWeek-button fc-button fc-button-primary dutch_button {{ $key=='license_dutch'?'fc-button-active':'' }}" id="dutch_button">Dutch</button>
              </div>
            </div>
          </div>
          <div class="card-body pt-4 {{ $key=='license_dutch'?'d-none':'' }}" id="english_tab">
            {!! $license['license_english'] !!} 
          </div>
          <div class="card-body pt-4 {{ $key=='license_english'?'d-none':'' }}" id="dutch_tab">
          {!! $license['license_dutch'] !!}
            
          </div>
          <div class="card-footer clearfix">
          <div class="submit-btn">
                <button  style="pointer-events: none;" type="submit" id="i_accept" class="btn accept-btn">I Accept</button>
              
                <button style="pointer-events: none;" type="submit" id="i_cancel" class="btn cancel-btn">Cancel</button>
            </div>
          </div>
        </section>
        
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div><!-- end content -->
@endsection
@push('js')
<script type="text/javascript">
    
    // for changing position as tab
    $('#english_button').click(function(){
        $('.dutch_button').removeClass('fc-button-active');
        $(this).addClass('fc-button-active');
        
        $('#english_tab').removeClass('d-none');
        $('#dutch_tab').addClass('d-none');
        $('#i_accept').html('I Accept');
        $('#i_cancel').html('Cancel');
    });
    $('#dutch_button').click(function(){
        
        $('#english_button').removeClass('fc-button-active');
        $(this).addClass('fc-button-active');
        
        $('#dutch_tab').removeClass('d-none');
        $('#english_tab').addClass('d-none');

        $('#i_accept').html('ik aanvaard');
        $('#i_cancel').html('annuleren');
    });
</script>
@endpush