@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9">
        <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-primary">Menu</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Popular</a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-{{$category->id}}" role="tab" aria-controls="pills-profile" aria-selected="false">{{$category->title}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
            @foreach($popular as $item)
                <div class="col-sm-3 mb-2">
                    <div class="card">
                        <img src="https://loremflickr.com/80/80/food?random={{$loop->iteration}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="font-size: 18px;">{{ $item->title }}</h5>
                            <p class="card-text mb-1 text-justify" style="height: 70px; font-size:14px">{{ str_limit($item->description,50)}}</p>
                            <h5><i class="fas fa-rupee-sign"></i> {{$item->price}} \-</h5>
                            <a href="{{route('addItem',$item)}}" class="btn btn-primary btn-block">Add To Table</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        @foreach($categories as $category_tabs)
            <div class="tab-pane fade" id="pills-{{$category_tabs->id}}" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                     @foreach($category_tabs->items as $tab_item)
                     <div class="col-sm-3 mb-2">
                     <div class="card">
                        <img src="https://loremflickr.com/80/80/food?random={{$loop->iteration}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="font-size: 15px;">{{$tab_item->title}}</h5>
                            <p class="card-text mb-1" style="height: 70px; font-size:13px">{{ str_limit($tab_item->description, 50)}}</p>
                            <h5><i class="fas fa-rupee-sign"></i> {{$tab_item->price}} \-</h5>
                            <a href="{{route('addItem',$tab_item)}}" class="btn btn-primary btn-block">Add To Table</a>
                        </div>
                    </div>
                     </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        </div>
                </div>
              </div>
        </div>
        <div class="col-sm-3">
        <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-primary">Your Table ({{session()->has('cart')?session()->get('cart')->totalQty : 0}})</h3>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                @if(Session::has('cart'))


                @foreach($carts->items as $cart)
                    <div class="row mb-0">
                        <div class="col-sm-4" style="padding:3px;margin:0">
                            <img src="https://loremflickr.com/30/30/food?random={{$loop->iteration}}" class="card-img-top img-fluid" alt="...">
                        </div>
                        <div class="col-sm-6 text-justify" style="padding:3px;margin:0">
                            <p style="font-size: .7rem;">
                                <b>{{$cart['title']}}</b> <br>
                                <form action="{{route('updateItem',$cart['id'])}}" method="POST">
                                    @csrf
                                    <b>Quantity</b> : <input type="number" value="{{$cart['qty']}}" name="qty" placeholder="{{$cart['qty']}}" style="width:3rem" min="1" max="10">
                                    <button type="submit" class="btn btn-sm"><i class="fas fa-sync" style="color: green;"></i></button>
                                </form>
                                <b>MRP</b> : <i class="fas fa-rupee-sign"></i> {{$cart['price']}} <br> 
                                <b>Total</b> : <i class="fas fa-rupee-sign"></i> {{$cart['price'] * $cart['qty']}} <br>
                            </p>
                        </div>              
                        <div class="col-sm-2">
                                <form action="{{route('removeItem',$cart['id'])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt" style="color: red;"></i></button>
                                </form>
                        </div>       
                    </div>
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <b> Total </b>
                    </div>
                    <div class="col-sm-8">
                         {{$carts->totalAmount}} /-
                    </div>
                </div>

                @endif
                <hr>
                <a href="{{route('saveOrder')}}" class="btn btn-warning btn-block btn-bg">Place Order</a>
                <hr>
                <a class="btn btn-success btn-block" href="{{route('resetSession')}}">Pay Online</a> 
                <p class="text-center mb-0"> <b> or </b> </p>
                <button class="btn btn-primary btn-block">Pay Offline</button>
                </div>
              </div>
        </div>
    </div>
    <div class="modal fade show" id="placeOrderModel" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
</div>
@endsection
