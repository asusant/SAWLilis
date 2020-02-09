<div class="form-group row {{ $errors->has('kode_section') ? 'has-error' : ''}}">
    <label for="kode_section" class="control-label text-right col-md-3">{{ 'Kode Section' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="kode_section" type="text" id="kode_section" value="{{ isset($section->kode_section) ? $section->kode_section : old('kode_section')}}" required>
    	{!! $errors->first('kode_section', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('section') ? 'has-error' : ''}}">
    <label for="section" class="control-label text-right col-md-3">{{ 'Section' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="section" type="text" id="section" value="{{ isset($section->section) ? $section->section : old('section')}}" required>
    	{!! $errors->first('section', '<p class="help-block">:message</p>') !!}
  	</div>
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
