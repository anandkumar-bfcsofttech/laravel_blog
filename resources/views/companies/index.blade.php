@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Company Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="add-form-company"> Add New Company</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Select</a>
    <a class="dropdown-item" href="employees">Employee</a>
    <a class="dropdown-item" href="companies">Company</a>
  </div>
</div>        
</div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Logo</th>
            <th>E-mail</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>


            <td><img src="http://localhost:70/blog/public/logos/{{$company->logo}}" height="100px" width="100px"></td>
            <td>{{$company->website}}</td>
            <td>
                <form action="delete-company/{{$company->id}}" method="POST">
   
                    <a class="btn btn-info" href="show-form-company/{{$company->id}}">Show</a>
    
                    <a class="btn btn-primary" href="edit-form-company/{{$company->id}}">Edit</a>
   
                    @csrf
                    <!-- method('DELETE') -->
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $companies->links() !!}
      
@endsection