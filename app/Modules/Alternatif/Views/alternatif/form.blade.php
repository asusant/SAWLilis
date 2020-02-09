<div class="form-group row {{ $errors->has('section_id') ? 'has-error' : ''}}">
    <label for="section_id" class="control-label text-right col-md-3">{{ 'Section' }}</label>
    <div class="col-md-9">
        <select name="section_id" class="form-control" id="section_id" required>
            <option disabled selected value> --- Pilih Section --- </option>
            @foreach ($sections as $key => $row)
                <option value="{{ $row->id }}" {{ (isset($alternatif) && isset($alternatif->section_id) && $alternatif->section_id == $row->id ) ? 'selected' : (old('section_id') == $row->id) ? 'selected' : '' }}>{{ $row->kode_section.' - '.$row->section }}</option>
            @endforeach
        </select>
    	{!! $errors->first('section_id', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('alternatif') ? 'has-error' : ''}}">
    <label for="alternatif" class="control-label text-right col-md-3">{{ 'Nama/Alternatif' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="alternatif" type="text" id="alternatif" value="{{ isset($alternatif->alternatif) ? $alternatif->alternatif : old('alternatif')}}" required>
    	{!! $errors->first('alternatif', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('nip') ? 'has-error' : ''}}">
    <label for="nip" class="control-label text-right col-md-3">{{ 'NIP' }}</label>
    <div class="col-md-9">
    	<input class="form-control" name="nip" type="text" id="nip" value="{{ isset($alternatif->nip) ? $alternatif->nip : old('nip')}}" required>
    	{!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<div class="form-group row {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label text-right col-md-3">{{ 'Keterangan' }}</label>
    <div class="col-md-9">
    	<textarea class="form-control" rows="5" name="keterangan" type="textarea" id="keterangan">{{ isset($alternatif->keterangan) ? $alternatif->keterangan : old('keterangan')}}</textarea>
    	{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
  	</div>
</div>


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
