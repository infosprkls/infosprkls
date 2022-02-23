@if (count($errors) > 0)
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
