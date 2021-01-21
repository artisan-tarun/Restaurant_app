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
                                    <a class="dropdown-item" href="{{ route('item.restore',$item->id) }}">Restore</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['item.forceDelete',$item->id]]) !!}
                                    <button class="dropdown-item">Delete</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>