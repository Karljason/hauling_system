<!-- Truckid Field -->
<div class="col-sm-12">
    {!! Form::label('TruckID', 'Truckid:') !!}
    <p>{{ $truckType->TruckID }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('Description', 'Description:') !!}
    <p>{{ $truckType->Description }}</p>
</div>

<!-- Capacity Field -->
<div class="col-sm-12">
    {!! Form::label('Capacity', 'Capacity:') !!}
    <p>{{ $truckType->Capacity }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $truckType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $truckType->updated_at }}</p>
</div>

