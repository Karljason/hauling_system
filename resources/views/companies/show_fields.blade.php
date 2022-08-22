<!-- Company Id Field -->
<div class="col-sm-12">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $company->company_id }}</p>
</div>

<!-- Companyname Field -->
<div class="col-sm-12">
    {!! Form::label('CompanyName', 'Company Name:') !!}
    <p>{{ $company->CompanyName }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('Address', 'Address:') !!}
    <p>{{ $company->Address }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $company->email }}</p>
</div>

<!-- Contactperson Field -->
<div class="col-sm-12">
    {!! Form::label('ContactPerson', 'Contact Person:') !!}
    <p>{{ $company->ContactPerson }}</p>
</div>

<!-- Taxid Field -->
<div class="col-sm-12">
    {!! Form::label('TaxId', 'Tax ID #:') !!}
    <p>{{ $company->TaxId }}</p>
</div>

<!-- Cellphone Field -->
<div class="col-sm-12">
    {!! Form::label('Cellphone', 'Cellphone:') !!}
    <p>{{ $company->Cellphone }}</p>
</div>

<!-- Telephone Field -->
<div class="col-sm-12">
    {!! Form::label('Telephone', 'Telephone:') !!}
    <p>{{ $company->Telephone }}</p>
</div>

<!-- Faxnumber Field -->
<div class="col-sm-12">
    {!! Form::label('FaxNumber', 'Fax Number:') !!}
    <p>{{ $company->FaxNumber }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $company->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $company->updated_at }}</p>
</div>

