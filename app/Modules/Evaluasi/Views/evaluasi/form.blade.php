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
@foreach($evaluasi['kriterias'] as $key => $row)
    <div class="form-group row {{ $errors->has('nilai-'.$row->id) ? 'has-error' : ''}}">
        <label for="nilai-{{$row->id}}" class="control-label text-right col-md-3">{{ 'Nilai '.$row->kriteria }}</label>
        <div class="col-md-9">
            @if(isset($evaluasi->nilai[$row->id]))
                <input type="hidden" name="edit_nilai_{{$row->id}}" value="{{ $evaluasi->nilai[$row->id]->id }}">
            @endif
            <select name="nilai-{{$row->id}}" id="nilai-{{$row->id}}" class="form-control" required>
                @foreach ($row->nilai as $r_nilai)
                    {{ isset($evaluasi->nilai[$row->id]) ? $evaluasi->nilai[$row->id]->nilai : old('nilai-'.$row->id)}}
                    @php
                    $selected = '';
                    $selected = ((isset($evaluasi->nilai[$row->id]) && $evaluasi->nilai[$row->id]->nilai == $r_nilai->nilai) ? 'selected' : '');
                    if(old('nilai-'.$row->id) && old('nilai-'.$row->id) == $r_nilai->nilai)
                    {
                        $selected = 'selected';
                    }
                    @endphp
                    <option value="{{ $r_nilai->nilai }}" {{ $selected }}>{{ $r_nilai->nilai.' ('.$r_nilai->deskripsi.')' }}</option>
                @endforeach
            </select>
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
