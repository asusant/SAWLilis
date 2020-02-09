@include('components.flash-message')

<div class="form-group row {{ $errors->has('alternatif_id') ? 'has-error' : ''}}">
    <label for="alternatif_id" class="control-label text-right col-md-3">{{ 'Alternatif' }}</label>
    <div class="col-md-9">
        @if(isset($evaluasi->alternatif_id))
            <input type="hidden" name="edit_alternatif_id" value="{{ $evaluasi->alternatif_id }}">
        @endif
    	<select name="alternatif_id" class="form-control" id="alternatif_id" required>
            <option disabled selected value> --- Pilih Alternatif --- </option>
            @foreach ($evaluasi['alternatifs'] as $key => $row)
            <option value="{{ $row->id }}" {{ (isset($evaluasi->alternatif_id) && $evaluasi->alternatif_id == $row->id ) ? 'selected' : (old('alternatif_id') == $row->id) ? 'selected' : '' }}>{{ $row->alternatif }}</option>
            @endforeach
        </select>
    	{!! $errors->first('alternatif_id', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
<!--
<div class="form-group row {{ $errors->has('kriteria_id') ? 'has-error' : ''}}">
    <label for="kriteria_id" class="control-label text-right col-md-3">{{ 'Kriteria Id' }}</label>
    <div class="col-md-9">
    	<select name="kriteria_id" class="form-control" id="kriteria_id" required>
        @foreach ($evaluasi['kriterias'] as $key => $row)
            <option value="{{ $row->id }}" {{ (isset($evaluasi->kriteria_id) && ($evaluasi->kriteria_id == $row->id || $evaluasi->kriteria_id == old('kriteria_id'))) ? 'selected' : ''}}>{{ $row->kriteria }}</option>
        @endforeach
        </select>
    	{!! $errors->first('kriteria_id', '<p class="help-block">:message</p>') !!}
  	</div>
</div>
-->
@foreach($evaluasi['kriterias'] as $key => $row)
    <div class="form-group row {{ $errors->has('nilai-'.$row->id) ? 'has-error' : ''}}">
        <label for="nilai-{{$row->id}}" class="control-label text-right col-md-3">{{ 'Nilai '.$row->kriteria }}</label>
        <div class="col-md-9">
            @if(isset($evaluasi->nilai[$row->id]))
                <input type="hidden" name="edit_nilai_{{$row->id}}" value="{{ $evaluasi->nilai[$row->id]->id }}">
            @endif
        	<input class="form-control" step=".01" name="nilai-{{$row->id}}" type="number" id="nilai-{{$row->id}}" value="{{ isset($evaluasi->nilai[$row->id]) ? $evaluasi->nilai[$row->id]->nilai : old('nilai-'.$row->id)}}" required>
        	{!! $errors->first('nilai-'.$row->id, '<p class="help-block">:message</p>') !!}
      	</div>
    </div>
@endforeach


<div class="form-action">
  <div class="row">
    <div class="offset-md-3 col-md-9">
    <input class="btn btn-info" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
  </div>
</div>
</div>
