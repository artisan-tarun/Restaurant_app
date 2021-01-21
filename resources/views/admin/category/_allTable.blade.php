<table class="table table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Items</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Items</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{$category->title}}</td>
                      <td>{{$category->description}}</td>
                      <td>
                        @foreach($category->items as $item)
                            <a href="#" class="btn btn-success">{{$item->title}}</a>
                        @endforeach
                      </td>
                      <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Options
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editCategoryModal_{{$category->id}}">Edit</button>
                              {!! Form::open(['method' => 'DELETE' , 'route' => ['category.destroy',$category->id]]) !!}
                              <button class="dropdown-item">Delete</button>
                              {!! Form::close() !!}
                            </div>
                        </div>
                      </td>
                      <!--Create Category Model-->
                        <div class="modal fade" id="editCategoryModal_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit({{$category->title}})</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    {!! Form::model($category , ['method' => 'PUT' , 'route' => ['category.update',$category->id]])!!}
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

                        <!--/Create Category Model-->
                    </tr>
                    @endforeach
                  </tbody>
                </table>