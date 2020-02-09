<div class="form-group row {{ $errors->has('group_name') ? 'has-error' : ''}}">
    <label for="group_name" class="control-label text-right col-md-3">{{ 'Group Name' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="group_name" type="text" id="group_name" value="{{ isset($groupmenu->group_name) ? $groupmenu->group_name : ''}}" required>
  </div>
    {!! $errors->first('group_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label text-right col-md-3">{{ 'Icon' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($groupmenu->icon) ? $groupmenu->icon : ''}}" required>
  </div>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
