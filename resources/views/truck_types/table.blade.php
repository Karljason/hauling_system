<div class="table-responsive">
    <table class="table" id="truckTypes-table">
        <thead>
        <tr>
            <th>Truckid</th>
        <th>Description</th>
        <th>Capacity</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($truckTypes as $truckType)
            <tr>
                <td>{{ $truckType->TruckID }}</td>
            <td>{{ $truckType->Description }}</td>
            <td>{{ $truckType->Capacity }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['truckTypes.destroy', $truckType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('truckTypes.show', [$truckType->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('truckTypes.edit', [$truckType->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
