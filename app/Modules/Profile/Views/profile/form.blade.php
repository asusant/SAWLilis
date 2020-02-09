<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label text-right col-md-3">{{ 'Name' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($profile->name) ? $profile->name : ''}}" required>
  </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
    <label for="username" class="control-label text-right col-md-3">{{ 'Username' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="username" type="text" id="username" value="{{ isset($profile->username) ? $profile->username : ''}}" required>
  </div>
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label text-right col-md-3">{{ 'Email' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($profile->email) ? $profile->email : ''}}" required>
  </div>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label text-right col-md-3">{{ 'Password' }}</label>
    <div class="col-md-9">
    <input class="form-control" name="password" type="password" id="password" required>
  </div>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
