<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label text-right col-md-3">{{ 'User' }}</label>
    <div class="col-md-9">
      <select name="user_id" class="form-control" id="user_id" required>
        <option value="" {{ (!isset($menu->user_id)) ? 'selected' : ''}}>--- Pilih User ---</option>
        @foreach($menu['users'] as $key => $user)
          <option value="{{ $user->id }}" {{ (isset($menu->user_id) && $menu->user_id == $user->id) ? 'selected' : ''}}>{{ $user->name.' | '.$user->email }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('level_id') ? 'has-error' : ''}}">
    <label for="level_id" class="control-label text-right col-md-3">{{ 'Level' }}</label>
    <div class="col-md-9">
      <select name="level_id" class="form-control" id="level_id" required>
        <option value="" {{ (!isset($menu->level_id)) ? 'selected' : ''}}>--- Pilih Level ---</option>
        @foreach($menu['levels'] as $key => $level)
          <option value="{{ $level->id }}" {{ (isset($menu->level_id) && $menu->level_id == $level->id) ? 'selected' : ''}}>{{ $level->level }}</option>
        @endforeach
      </select>
    </div>
    {!! $errors->first('level_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
