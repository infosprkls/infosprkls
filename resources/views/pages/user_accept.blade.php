@extends('layouts.app', ['activePage' => 'license-agreement', 'titlePage' => __('License Agreement')])
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
                <button type="button" class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active english_button" id="english_button">English</button>
                <button type="button" class="fc-timeGridWeek-button fc-button fc-button-primary dutch_button" id="dutch_button">Dutch</button>
              </div>
            </div>
          </div>
          <div class="card-body pt-4" id="english_tab">
            {!! $license['license_english'] !!} 
          </div>
          <div class="card-body pt-4 d-none" id="dutch_tab">
          {!! $license['license_dutch'] !!}
            
          </div>
          <div class="card-footer clearfix">
          <div class="submit-btn">
            <form method="post" action="{{ route('useraccept.store') }}" autocomplete="off"
                          class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                 
                <button type="submit" id="i_accept" class="btn accept-btn">I Accept</button>
              </form>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" id="i_cancel" class="btn cancel-btn">Cancel</button>
              </form>
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