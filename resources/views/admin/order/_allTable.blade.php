<table class="table table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Table</th>
                      <th>Details</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Table</th>
                      <th>Details</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($orders as $order)
                    <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->cart->cart_details}}</td>
                        
                        <td>
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$order->status}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">In Process</a>
                            <a class="dropdown-item" href="#">Ready</a>
                            <a class="dropdown-item" href="#">Completed</a>
                          </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>