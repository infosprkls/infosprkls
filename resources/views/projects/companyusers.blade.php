<label class="col-sm-2 col-form-label">{{ __('Responsible User') }}</label>
<div class="col-sm-7">
    <div class="form-group{{ $errors->has('responsible') ? ' has-danger' : '' }}">
        <select class="form-control" name="responsible" id="input-responsible">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->firstname . " " . $user->lastname}}</option>
            @endforeach
        </select>
        @if ($errors->has('responsible'))
            <span id="responsible-error" class="error text-danger"
                  for="input-responsible">{{ $errors->first('responsible') }}</span>
        @endif
    </div>
</div>
