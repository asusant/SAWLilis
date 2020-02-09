<div class="form-group row {{ $errors->has('level_id') ? 'has-error' : ''}}">
    <label for="level_id" class="control-label text-right col-md-3">{{ 'Level' }}</label>
    <div class="col-md-9">
      <select name="level_id" class="form-control" id="level_id" required>
        <option value="" {{ (!isset($privilege->level_id)) ? 'selected' : ''}}>--- Choose Level ---</option>
        @foreach($privilege['levels'] as $key => $row)
          <option value="{{ $row->id }}" {{ (isset($privilege->level_id) && $privilege->level_id == $row->id) ? 'selected' : ''}}>{{ $row->level }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('level_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('module_id') ? 'has-error' : ''}}">
    <label for="module_id" class="control-label text-right col-md-3">{{ 'Module' }}</label>
    <div class="col-md-9">
      <select name="module_id" class="form-control" id="module_id" required>
        <option value="" {{ (!isset($privilege->module_id)) ? 'selected' : ''}}>--- Choose Module ---</option>
        @foreach($privilege['modules'] as $key => $row)
          <option value="{{ $row->id }}" {{ (isset($privilege->module_id) && $privilege->module_id == $row->id) ? 'selected' : ''}}>{{ $row->module }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('module_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('index') ? 'has-error' : ''}}">
    <label for="index" class="control-label text-right col-md-3">{{ 'Index' }}</label>
    <div class="col-md-9">
    <select name="index" class="form-control" id="index" required>
    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($privilege->index) && $privilege->index == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('index', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('show') ? 'has-error' : ''}}">
    <label for="show" class="control-label text-right col-md-3">{{ 'Show' }}</label>
    <div class="col-md-9">
    <select name="show" class="form-control" id="show" required>
    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($privilege->show) && $privilege->show == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('show', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('create') ? 'has-error' : ''}}">
    <label for="create" class="control-label text-right col-md-3">{{ 'Create' }}</label>
    <div class="col-md-9">
    <select name="create" class="form-control" id="create" required>
    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($privilege->create) && $privilege->create == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('create', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('store') ? 'has-error' : ''}}">
    <label for="store" class="control-label text-right col-md-3">{{ 'Store' }}</label>
    <div class="col-md-9">
    <select name="store" class="form-control" id="store" required>

    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)

        <option value="{{ $optionKey }}" {{ (isset($privilege->store) && $privilege->store == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('store', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('edit') ? 'has-error' : ''}}">
    <label for="edit" class="control-label text-right col-md-3">{{ 'Edit' }}</label>
    <div class="col-md-9">
    <select name="edit" class="form-control" id="edit" required>

    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)

        <option value="{{ $optionKey }}" {{ (isset($privilege->edit) && $privilege->edit == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('edit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('update') ? 'has-error' : ''}}">
    <label for="update" class="control-label text-right col-md-3">{{ 'Update' }}</label>
    <div class="col-md-9">
    <select name="update" class="form-control" id="update" required>

    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)

        <option value="{{ $optionKey }}" {{ (isset($privilege->update) && $privilege->update == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('update', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('destroy') ? 'has-error' : ''}}">
    <label for="destroy" class="control-label text-right col-md-3">{{ 'destroy' }}</label>
    <div class="col-md-9">
    <select name="destroy" class="form-control" id="destroy" required>

    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)

        <option value="{{ $optionKey }}" {{ (isset($privilege->destroy) && $privilege->destroy == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('destroy', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('custom') ? 'has-error' : ''}}">
    <label for="custom" class="control-label text-right col-md-3">{{ 'Custom' }}</label>
    <div class="col-md-9">
    <select name="custom" class="form-control" id="custom" required>

    @foreach (json_decode('{"0":"Block","1":"Allow"}', true) as $optionKey => $optionValue)

        <option value="{{ $optionKey }}" {{ (isset($privilege->custom) && $privilege->custom == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
  </div>
    {!! $errors->first('custom', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
