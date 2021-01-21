<table class="table table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Members</td>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Members</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($roles as $role)
                    <tr>
                        <td>{{$role->title}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                          @foreach($role->users as $user)
                              <a href="#" class="btn btn-success btn-sm mb-1">{{$user->name}}</a>
                          @endforeach  
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['role.destroy',$role->id]]) !!}
                                    <button class="dropdown-item">Delete</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>