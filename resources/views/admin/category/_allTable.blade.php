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
                              <a class="dropdown-item" href="#">Edit</a>
                              {!! Form::open(['method' => 'DELETE' , 'route' => ['category.destroy',$category->id]]) !!}
                              <button class="dropdown-item">Delete</button>
                              {!! Form::close() !!}
                            </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>