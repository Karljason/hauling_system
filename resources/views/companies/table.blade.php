<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
        <tr>
            <th>Company Id</th>
        <th>Company Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact Person</th>
        <th>Tax ID #</th>
        <th>Cellphone</th>
        <th>Telephone</th>
        <th>Fax Number</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->company_id }}</td>
            <td>{{ $company->CompanyName }}</td>
            <td>{{ $company->Address }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->ContactPerson }}</td>
            <td>{{ $company->TaxId }}</td>
            <td>{{ $company->Cellphone }}</td>
            <td>{{ $company->Telephone }}</td>
            <td>{{ $company->FaxNumber }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$company->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('companies.edit', [$company->id]) }}"
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
