@extends('layouts.app', ['activePage' => 'Tasks', 'titlePage' => __('Tasks')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$errors->first()}}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{' Tasks' }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert {{(session('status')=='You do not have the required permissions to complete this action.') ? 'alert-danger' : 'alert-success'}}">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Title') }}
                                    </th>
                                    <th>
                                        {{ __('Project') }}
                                    </th>
                                    <th>
                                        {{ __('User') }}
                                    </th>
                                    <th>
                                        {{ __('Date') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if(count($tasks)>0)
                                        @foreach($tasks as $task)
                                            <tr>
                                                <td>
                                                    <a href="/show_tasks/{{$task->project_id}}/{{$task->date}}">{{ ($task->title!='') ? $task->title : __('No Title') }}</a>
                                                </td>
                                                <td>
                                                    {{ $task->project_name }}
                                                </td>
                                                <td>
                                                    {{ $task->user_id }}
                                                </td>
                                                <td>
                                                    {{ $task->dateformat }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align: center;">
                                                No Record.
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
