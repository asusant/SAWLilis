<div class="form-group row {{ $errors->has('config_name') ? 'has-error' : ''}}">
    <label for="config_name" class="control-label text-right col-md-3">{{ 'Config Name' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="config_name" type="text" id="config_name" value="{{ isset($config->config_name) ? $config->config_name : ''}}" required>
  </div>
    {!! $errors->first('config_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label text-right col-md-3">{{ 'Key' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($config->key) ? $config->key : ''}}" required>
  </div>
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="control-label text-right col-md-3">{{ 'Value' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="value" type="text" id="value" value="{{ isset($config->value) ? $config->value : ''}}" required>
  </div>
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label text-right col-md-3">{{ 'Description' }}</label>
    <div class="col-md-9">
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($config->description) ? $config->description : ''}}</textarea>
  </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
