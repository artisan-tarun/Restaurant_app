@extends('layouts.admin')

@section('content')

<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Categories</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <button type="button" class="dropdown-item" data-toggle="modal" data-target="#createUserModal">Add New</button>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <<th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                </div>
              </div>
<!--Create User Model-->


      <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::model($userModel , ['method' => 'POST' , 'route' => 'user.store'])!!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name') !!}
                    {!! Form::text('name',null, ['class' => 'form-control']) !!}
                    @error('name')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                  {!! Form::label('email') !!}
                  {!! Form::email('email',null, ['class' => 'form-control']) !!}
                  @error('email')
                  <span style="color: red;">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  {!! Form::label('role_id', 'Role') !!}
                  {!! Form::select('role_id', App\Role::pluck('title','id'), null , ['class' => 'form-control' , 'placeholder' => 'Choose Role'])!!}
                  @error('category_id')
                  <span style="color: red;">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  {!! Form::label('password') !!}
                  {!! Form::password('password', ['class' => 'form-control']) !!}
                  @error('password')
                  <span style="color: red;">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  {!! Form::label('password', 'Confirm Password') !!}
                  {!! Form::password('password_confirmation',['class' => 'form-control'])!!}
                  @error('password')
                  <span style="color: red;">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>

<!--/Create User Model-->
@endsection