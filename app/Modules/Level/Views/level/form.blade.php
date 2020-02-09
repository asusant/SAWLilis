<div class="form-group row {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label text-right col-md-3">{{ 'Level' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="level" type="text" id="level" value="{{ isset($level->level) ? $level->level : ''}}" required>
  </div>
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label text-right col-md-3">{{ 'Icon' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($level->icon) ? $level->icon : ''}}" required>
  </div>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label text-right col-md-3">{{ 'Description' }}</label>
    <div class="col-md-9">
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($level->description) ? $level->description : ''}}</textarea>
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
