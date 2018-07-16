<div class="alert alert-info">
    <strong>Masukan Data Mobil</strong><br/>
</div>
{{ Form::open(array('route' => 'admin.car.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
<div class="form-group">
    {{ Form::label('make', 'Merk', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('make','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('model', 'Model', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('model','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('reg_num', 'Nomor Polisi', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('registration_num','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Mileage</label>
    <div class="col-md-3">
        {{ Form::text('mileage','',array('class' => 'form-control spinner required','min' => 0)) }}
       
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
    <label class="col-md-3">KM</label>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Lokasi</label>
    <div class="col-md-5">
        {{ Form::select('location_id', $selectbox,'',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Type </label>
    <div class="col-md-3">
        @foreach($types as $type)
        <label class="checkbox">
            {{Form::checkbox('type[]', $type['id'])}}
            {{ $type['type'] }}
        </label> 
        @endforeach
    </div>
</div>
<div class="form-actions">
    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}