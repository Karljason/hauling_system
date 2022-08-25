<div class="table-responsive">
    <table class="table" id="requisitions-table">
        <thead>
        <tr>
            <th>Ctrl No</th>
        <th>Truck Id</th>
        <th>Status</th>
        <th>Total Cost</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requisitions as $requisitions)
            <tr>
                <td>{{ $requisitions->ctrl_no }}</td>
            <td>{{ $requisitions->truck_id }}</td>
            <td>{{ $requisitions->status }}</td>
            <td>{{ $requisitions->total_cost }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['requisitions.destroy', $requisitions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requisitions.show', [$requisitions->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('requisitions.edit', [$requisitions->id]) }}"
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
