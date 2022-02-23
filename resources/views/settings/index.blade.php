@extends('layouts.vue_app')
@section('page-script-head')
<!-- <link href="{{ asset('material') }}/css/style.css" rel="stylesheet" /> -->
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/card.css?v=1.1')}}" media="print" onload="this.media='all'" />
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_horizontal-tabs.css?v=1.1')}}" media="print" onload="this.media='all'" />
<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_table.css?v=1.1')}}" media="print" onload="this.media='all'" />
@endsection
@section('content')
    <!-- <admin-settings :user="{{ auth()->user()?auth()->user():'null' }}"></admin-settings> -->
    <dashboard-component :user="{{ auth()->user()?auth()->user():'null' }}"></dashboard-component>
@endsection