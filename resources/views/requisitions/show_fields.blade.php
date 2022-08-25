<!-- Ctrl No Field -->
<div class="col-sm-12">
    {!! Form::label('ctrl_no', 'Ctrl No:') !!}
    <p>{{ $requisitions->ctrl_no }}</p>
</div>

<!-- Truck Id Field -->
<div class="col-sm-12">
    {!! Form::label('truck_id', 'Truck Id:') !!}
    <p>{{ $requisitions->truck_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $requisitions->status }}</p>
</div>

<!-- Total Cost Field -->
<div class="col-sm-12">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    <p>{{ $requisitions->total_cost }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $requisitions->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $requisitions->updated_at }}</p>
</div>

