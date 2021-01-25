<table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
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
                        <td>
                            {{$order->user->name}} <br>
                            {{$order->created_at->diffForHumans()}}
                        </td>
                        <td>
                        <table class="table table-sm">
                        <tbody>
                        @php
                          $xyz = unserialize($order->cart->cart_details);
                        @endphp
                        @foreach($xyz->items as $abc)
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$abc['title']}}</td>
                            <td>{{$abc['qty']}}</td>
                            <td>{{$abc['price']}}</td>
                            <td>{{$abc['qty'] * $abc['price']}}</td>
                          </tr>
                          @endforeach 
                          <tr>
                            <th></th>
                            <th>Total Quantity</th>
                            <th>{{$xyz->totalQty}}</th>
                            <th>Total Amount</th> 
                            <th>{{$xyz->totalAmount}}</th>
                          </tr>  
                        </tbody>
                      </table>                          
                                             
                        </td>
                        <td>
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$order->status}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('orderStatus',[$order->id,'In Process'])}}">In Process</a>
                            <a class="dropdown-item" href="{{route('orderStatus',[$order->id,'Ready'])}}">Ready</a>
                            <a class="dropdown-item" href="{{route('orderStatus',[$order->id,'Complete'])}}">Completed</a>
                          </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>