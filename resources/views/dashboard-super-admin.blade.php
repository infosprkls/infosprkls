@extends('layouts.vue_app')
@section('page-script-head')
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/card.css?v=1.1')}}" media="print" onload="this.media='all'" />
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_horizontal-tabs.css?v=1.1')}}" media="print" onload="this.media='all'" />
<!-- <link type="text/css" rel="stylesheet" href="{{asset('css/layout/_table.css?v=1.1')}}" media="print" onload="this.media='all'" /> -->
@endsection
@section('content')
    <!-- <ai-projects :user="{{ auth()->user()?auth()->user():'null' }}"></ai-projects> -->
    <dashboard-component :user="{{ auth()->user()?auth()->user():'null' }}"></dashboard-component>
    <div class="row financial_btn" style="margin-left: 275px;text-transform: uppercase;">
        <div class="text-left mt-auto w-100 col-sm-12">
            <button type="button" class="btn btn-primary" id="financial_btn" style="    		width: 184px;
                        height: 44px;
                        color: #fff;
                        background-color: #9c27b0;
                        border-color: #9c27b0;font-size: 12px;display: none
                        " onclick="window.open('{{asset('/public/')}}/ai_solutions_finance/index.php/sessions/login?email=aisolutions%40yopmail.com&pass=uAg%5Dm-54%3F%23LPv%21S','_blank')">FINANCIAL OVERVIEW</button>
        </div>
    </div>
    <script type="text/javascript">
    	setInterval(function(){
    		document.getElementById("financial_btn").style.display = "block";
    	},1500)
        
    </script>
@endsection