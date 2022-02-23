@extends('layouts.vue_app')
@section('page-script-head')
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/card.css?v=1.1')}}" media="print" onload="this.media='all'" />
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_horizontal-tabs.css?v=1.1')}}" media="print" onload="this.media='all'" />
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_table.css?v=1.1')}}" media="print" onload="this.media='all'" />
@endsection
@section('content')
    <!-- <ai-projects :user="{{ auth()->user()?auth()->user():'null' }}"></ai-projects> -->
    <dashboard-component :user="{{ auth()->user()?auth()->user():'null' }}"></dashboard-component>
@endsection