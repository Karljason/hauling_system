<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company ID:') !!}
    {!! Form::text('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CompanyName', 'Company Name:') !!}
    {!! Form::text('CompanyName', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Address', 'Address:') !!}
    {!! Form::text('Address', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contactperson Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ContactPerson', 'Contact Person:') !!}
    {!! Form::text('ContactPerson', null, ['class' => 'form-control']) !!}
</div>

<!-- Taxid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TaxId', 'Tax ID #:') !!}
    {!! Form::text('TaxId', null, ['class' => 'form-control']) !!}
</div>

<!-- Cellphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cellphone', 'Cellphone:') !!}
    {!! Form::text('Cellphone', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Telephone', 'Telephone:') !!}
    {!! Form::text('Telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Faxnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FaxNumber', 'Fax Number:') !!}
    {!! Form::text('FaxNumber', null, ['class' => 'form-control']) !!}
</div>