<div class="row">
    <div class="col-2"></div>
    <label class="col-8  btn btn-lg btn-info"
           for="logo">{{ __('Upload a Logo, max images sizes are 400x400') }}
    </label>
    @if ($errors->has('logo'))
        <span id="logo-error" class="error text-danger col-8 offset-2"
              for="input-logo">{{ $errors->first('logo') }}</span>
    @endif
    <div>
        <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
            <div class="form-group">
                <input type="file" class="form-control-file" name="logo"
                       id="logo" aria-describedby="fileHelpId" data-preview-file-type="any">
            </div>
        </div>
    </div>

</div>
