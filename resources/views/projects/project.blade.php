@extends('layouts.app', ['activePage' => 'Projects', 'titlePage' => __('Projects')])

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
                            <h4 class="card-title ">{{ $filter.' PROJECTS' }}</h4>
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
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Type') }}
                                    </th>
                                    <th>
                                        {{ __('Assigned To') }}
                                    </th>
                                    <th>
                                        {{ __('Hours') }}
                                    </th>
                                    <th>
                                        {{ __('Started') }}
                                    </th>
                                    <th>
                                        {{ __('Deadline') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if(count($projects)>0)
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>
                                                    {{ $project->name }}
                                                </td>
                                                <td>
                                                    {{ $project->project_type }}
                                                </td>
                                                <td>
                                                <?php if(isset($project->responsibleUser->fullname)): ?>
                                                    <?php echo e($project->responsibleUser->fullname); ?>

                                                <?php endif; ?>
                                                </td>
                                                <td>
                                                    {{ $project->hours }}
                                                </td>
                                                <td>
                                                    {{ $project->started_at }}
                                                </td>
                                                <td>
                                                    {{ $project->deadline }}
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
                            @if (isset($projects))
                                @if(count($projects) > 0)
                                    {{-- {{ $projects->links() }} --}}
                                    {{ $projects->links('vendor.pagination.custom') }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
