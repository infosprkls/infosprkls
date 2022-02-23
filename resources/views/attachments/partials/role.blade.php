<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
            <select class="form-control" name="role" id="input-role">
                @if(isset($user))
                    @if(isset($user->roles->first()->name))
                        <option value="{{$user->roles->first()->name}}">{{$user->roles->first()->name}}</option>
                    @else
                        <option value="null">User has no role yet</option>
                    @endif
                @endif
                @foreach(\Spatie\Permission\Models\Role::all()->except('super admin') as $role)
                            <option
                        value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('role'))
                <span id="role-error" class="error text-danger"
                      for="input-role">{{ $errors->first('role') }}</span>
            @endif
        </div>
    </div>
</div>
