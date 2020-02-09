<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label text-right col-md-3">{{ 'User Id' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($log->user_id) ? $log->user_id : ''}}" required>
  </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('table') ? 'has-error' : ''}}">
    <label for="table" class="control-label text-right col-md-3">{{ 'Table' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="table" type="text" id="table" value="{{ isset($log->table) ? $log->table : ''}}" required>
  </div>
    {!! $errors->first('table', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('row_id') ? 'has-error' : ''}}">
    <label for="row_id" class="control-label text-right col-md-3">{{ 'Row Id' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="row_id" type="number" id="row_id" value="{{ isset($log->row_id) ? $log->row_id : ''}}" required>
  </div>
    {!! $errors->first('row_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('action') ? 'has-error' : ''}}">
    <label for="action" class="control-label text-right col-md-3">{{ 'Action' }}</label>
    <div class="col-md-9">
    <select name="action" class="form-control" id="action" required>
    @foreach (json_decode('{"index":"Index","create":"Create","store":"Store","show":"Show","edit":"Edit","update":"Update","destroy":"Destroy"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($log->action) && $log->action == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label text-right col-md-3">{{ 'Description' }}</label>
    <div class="col-md-9">
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($log->description) ? $log->description : ''}}</textarea>
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
