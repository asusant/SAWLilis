<div class="form-group row {{ $errors->has('menu_id') ? 'has-error' : ''}}">
    <label for="menu_id" class="control-label text-right col-md-3">{{ 'Menu' }}</label>
    <div class="col-md-9">
      <select name="menu_id" class="form-control" id="menu_id" required>
        <option value="" {{ (!isset($module->menu_id)) ? 'selected' : ''}}>--- Pilih Menu ---</option>
        @foreach($module['menus'] as $key => $row)
          <option value="{{ $row->id }}" {{ (isset($module->menu_id) && $module->menu_id == $row->id) ? 'selected' : ''}}>{{ $row->menu }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('menu_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('module') ? 'has-error' : ''}}">
    <label for="module" class="control-label text-right col-md-3">{{ 'Module' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="module" type="text" id="module" value="{{ isset($module->module) ? $module->module : ''}}" required>
  </div>
    {!! $errors->first('module', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('route') ? 'has-error' : ''}}">
    <label for="route" class="control-label text-right col-md-3">{{ 'Route' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="route" type="text" id="route" value="{{ isset($module->route) ? $module->route : ''}}" required>
  </div>
    {!! $errors->first('route', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label text-right col-md-3">{{ 'Icon' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($module->icon) ? $module->icon : ''}}" required>
  </div>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('priority') ? 'has-error' : ''}}">
    <label for="priority" class="control-label text-right col-md-3">{{ 'Priority' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="priority" type="number" id="priority" value="{{ isset($module->priority) ? $module->priority : ''}}" required>
  </div>
    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
