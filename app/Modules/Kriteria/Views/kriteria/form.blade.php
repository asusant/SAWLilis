<div class="form-group row {{ $errors->has('kode_kriteria') ? 'has-error' : ''}}">
    <label for="kode_kriteria" class="control-label text-right col-md-3">{{ 'Kode Kriteria' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="kode_kriteria" type="text" id="kode_kriteria" value="{{ isset($kriterium->kode_kriteria) ? $kriterium->kode_kriteria : old('kode_kriteria')}}" required>
    	{!! $errors->first('kode_kriteria', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('kriteria') ? 'has-error' : ''}}">
    <label for="kriteria" class="control-label text-right col-md-3">{{ 'Kriteria' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="kriteria" type="text" id="kriteria" value="{{ isset($kriterium->kriteria) ? $kriterium->kriteria : old('kriteria')}}" required>
    	{!! $errors->first('kriteria', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('bobot') ? 'has-error' : ''}}">
    <label for="bobot" class="control-label text-right col-md-3">{{ 'Bobot' }}</label>
    <div class="col-md-9">
    	<input class="form-control" step=".01" name="bobot" type="number" id="bobot" value="{{ isset($kriterium->bobot) ? $kriterium->bobot : old('bobot')}}" required>
    	{!! $errors->first('bobot', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('atribut') ? 'has-error' : ''}}">
    <label for="atribut" class="control-label text-right col-md-3">{{ 'Atribut' }}</label>
    <div class="col-md-9">
    	<select name="atribut" class="form-control" id="atribut" required>
    @foreach (json_decode('{"benefit":"Benefit","cost":"Cost"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($kriterium->atribut) && $kriterium->atribut == $optionKey) ? 'selected' : old('atribut')}}>{{ $optionValue }}</option>
    @endforeach
</select>
    	{!! $errors->first('atribut', '<p class="help-block">:message</p>') !!}
  	</div>
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
