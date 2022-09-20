@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Employee Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="add-form"> Add New Employee</a>
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
            <th>Company</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Profile Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->getCompany->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td><img src="http://localhost/laravel_blog/public/uploads/{{$employee->profile_picture}}" height="100px" width="100px"></td>
            <td>
                <form action="delete/{{$employee->id}}" method="POST">
   
                    <a class="btn btn-info" href="show-form/{{$employee->id}}">Show</a>
    
                    <a class="btn btn-primary" href="{{url('edit-form/'.$employee->id)}}">Edit</a>
   
                    @csrf
                    <!-- method('DELETE') -->
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employees->links() !!}
      
@endsection