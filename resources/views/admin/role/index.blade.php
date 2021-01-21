@extends('layouts.admin')

@section('content')

<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="m-0 font-weight-bold text-primary">
                    @if($onlyTrashed) Trashed Role @else Manage Role @endif
                  </h4>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <button type="button" class="dropdown-item" data-toggle="modal" data-target="#createRoleModal">Add New</button>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                @if($onlyTrashed)
                  @include('admin.role._trashedTable')
                @else
                  @include('admin.role._allTable')
                @endif
              </div>
                </div>
              </div>
<!--Create Role Model-->


<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::model($roleModel , ['method' => 'POST' , 'route' => 'role.store'])!!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
                    @error('title')
                      <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('description')!!}
                    {!! Form::textarea('description',null ,['class' => 'form-control', 'rows' => 2])!!}
                    @error('description')
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

<!--/Create Role Model-->
@endsection