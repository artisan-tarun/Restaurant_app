<table class="table table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Details</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($items as $item)
                    <tr>
                        <td><img src="http://placehold.it/100X100&text=No+Image" class="card-img-top img-fluid" alt="..."></td>
                        <td>
                            <b>{{$item->title}}</b> <br>
                            {{$item->description}} <br>
                            Category: {{$item->category->title}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editItemModal_{{$item->id}}">Edit</button>
                                    {!! Form::open(['method' => 'DELETE','route' => ['item.destroy',$item->id]]) !!}
                                    <button class="dropdown-item">Delete</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                        <!--Edit Item Model-->
                        <div class="modal fade" id="editItemModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit( {{ $item->title }} )</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    {!! Form::model($item , ['method' => 'PUT' , 'route' => ['item.update',$item->id]])!!}
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
                                        <div class="form-group">
                                          {!! Form::label('category_id','Category') !!}
                                          {!! Form::select('category_id', App\Category::pluck('title','id'), null, ['class' => 'form-control','placeholder' => 'Choose Category'])!!}
                                          @error('category_id')
                                            <span style="color: red;">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('price') !!}
                                          {!! Form::number('price', null ,['class' => 'form-control'])!!}
                                          @error('price')
                                              <span style="color: red;">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('status') !!}
                                          {!! Form::select('status', ['1' => 'Active', 'S' => 'Inactive'], '1' ,['class' => 'form-control']) !!}
                                          @error('status')
                                              <span style="color: red;">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('image') !!}
                                          {!! Form::file('image') !!}
                                          @error('image')
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

                        <!--/Create Item Model-->
                    </tr>
                    @endforeach
                  </tbody>
                </table>