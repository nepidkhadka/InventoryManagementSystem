@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    {{-- <p>Add, Delete, Update Users</p> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
    Add User
    </button>
    <hr>

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    @if(\Session::has('delete'))
    <div class="alert alert-danger">
        <h6>{{ \Session::get('delete') }}</h6>
    </div>
        
    @endif

    @if(\Session::has('superadmin'))
    <div class="alert alert-warning">
        <h6>{{ \Session::get('superadmin') }}</h6>
    </div>
        
    @endif
      
  <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="post" action="/adduser">
                  {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter User Fullname">
                    </div> 
                    <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">BRS will never share users email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="User Password">
                    </div>                                      
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add User</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    
  <hr>

    <h3>Registered Users List</h3>
    <hr>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        @foreach($usersdata as $usersdata)

            <tbody>
              <tr>  
                <td>{{$usersdata->id}}</td>         
                <td>{{$usersdata->name}}</td>         
                <td>{{$usersdata->email}}</td>
                <td> 
                  <a class="btn btn-outline-danger btn-sm" href={{"deleteuser/".$usersdata['id']}}> Delete </a> 
              </td>
              </tr>             
            </tbody>
            @endforeach
      </table>
@stop




