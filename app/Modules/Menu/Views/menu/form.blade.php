<div class="form-group row {{ $errors->has('group_menu_id') ? 'has-error' : ''}}">
    <label for="group_menu_id" class="control-label text-right col-md-3">{{ 'Group Menu' }}</label>
    <div class="col-md-9">
      <select name="group_menu_id" class="form-control" id="group_menu_id" required>
        <option value="" {{ (!isset($menu->group_menu_id)) ? 'selected' : ''}}>--- Pilih Group Menu ---</option>
        @foreach($menu['groupMenus'] as $key => $groupMenu)
          <option value="{{ $groupMenu->id }}" {{ (isset($menu->group_menu_id) && $menu->group_menu_id == $groupMenu->id) ? 'selected' : ''}}>{{ $groupMenu->group_name }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('group_menu_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('menu') ? 'has-error' : ''}}">
    <label for="menu" class="control-label text-right col-md-3">{{ 'Menu' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="menu" type="text" id="menu" value="{{ isset($menu->menu) ? $menu->menu : ''}}" required>
  </div>
    {!! $errors->first('menu', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label text-right col-md-3">{{ 'Icon' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($menu->icon) ? $menu->icon : ''}}" required>
  </div>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('priority') ? 'has-error' : ''}}">
    <label for="priority" class="control-label text-right col-md-3">{{ 'Priority' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="priority" type="number" id="priority" value="{{ isset($menu->priority) ? $menu->priority : ''}}" required>
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
