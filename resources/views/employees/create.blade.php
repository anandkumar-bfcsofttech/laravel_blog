@extends('employees.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="http://localhost:70/blog/public/employees"> Back</a>
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
   
<form action="add" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <strong>Company</strong>
                <input type="text" name="company" class="form-control" placeholder="Company">
            </div>
            <div class="form-group">
                <strong>E-mail</strong>
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <strong>Phone No.</strong>
                <input type="number" name="phone" class="form-control" placeholder="Phone No.">
            </div>
            <div class="form-group">
                <strong>Profile Image</strong>
                <input type="file" name="profile_picture" class="form-control" placeholder="Profile Image">
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection