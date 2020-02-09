<input type="hidden" name="kriteria_id" value="{{ $kriteria->id }}">
<div class="form-group row {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label text-right col-md-3">{{ 'Deskripsi' }}</label>
    <div class="col-md-9">
        <input class="form-control" name="deskripsi" type="text" id="deskripsi"
            value="{{ isset($nilaikriterium->deskripsi) ? $nilaikriterium->deskripsi : old('deskripsi')}}" required>
        {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('nilai') ? 'has-error' : ''}}">
    <label for="nilai" class="control-label text-right col-md-3">{{ 'Nilai' }}</label>
    <div class="col-md-9">
        <input class="form-control" name="nilai" type="number" id="nilai"
            value="{{ isset($nilaikriterium->nilai) ? $nilaikriterium->nilai : old('nilai')}}" required>
        {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-action">
    <div class="row">
        <div class="offset-md-3 col-md-9">
            <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>
    </div>
</div>
