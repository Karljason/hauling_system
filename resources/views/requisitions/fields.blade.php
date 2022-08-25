<!-- Ctrl No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ctrl_no', 'Requisition Control No:') !!}
    <br>
    <h2><span class = "badge badge-secondary" >{{$txtReqCtrlNo}}</span><h2>
    {!! Form::hidden('ctrl_no', $txtReqCtrlNo, ['class' => 'form-control']) !!}
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

<div class="form-group col-sm-12" style = "">
    <label for = "" >Items to Deliver</label>
    <!--Create generating input text that can be add edit delete-->
</div>