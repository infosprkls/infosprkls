@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __(env('APP_NAME')), 'titlePage' => __("Company Disabled")])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center" style="padding-top: 300px">
            <div class="col-12 text-center">
                <h1>Your company has been disabled</h1>
            </div>
            <div class="col-12 pt-5 text-center ">
                <h4>Please contact your company administrator</h4>
            </div>
        </div>
    </div>
@endsection
