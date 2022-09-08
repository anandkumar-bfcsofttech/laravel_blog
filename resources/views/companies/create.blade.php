@extends('employees.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="http://localhost:70/blog/public/companies"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="add-company" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Company Name">
            </div>
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <strong>Logo</strong>
                <input type="file" name="logo" class="form-control" placeholder="Logo">
            </div>
            <div class="form-group">
                <strong>Website</strong>
                <input type="text" name="website" class="form-control" placeholder="Website">
            </div>
            
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection