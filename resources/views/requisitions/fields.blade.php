<!-- Ctrl No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ctrl_no', 'Ctrl No:') !!}
    {!! Form::text('ctrl_no', null, ['class' => 'form-control','maxlength' => ired:max:50]) !!}
</div>

<!-- Truck Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('truck_id', 'Truck Id:') !!}
    {!! Form::text('truck_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    {!! Form::text('total_cost', null, ['class' => 'form-control']) !!}
</div>