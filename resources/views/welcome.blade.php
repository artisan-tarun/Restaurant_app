@extends('layouts.app')

@section('content')
<div class="container">
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
                        <img src="http://placehold.it/300X300&text=No+Image" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text" style="height: 70px;">{{$item->description}}</p>
                            <h5><i class="fas fa-rupee-sign"></i> {{$item->price}} \-</h5>
                            <a href="#" class="btn btn-primary btn-block">Add To Table</a>
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
                        <img src="http://placehold.it/300X300&text=No+Image" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$tab_item->title}}</h5>
                            <p class="card-text" style="height: 70px;">{{$tab_item->description}}</p>
                            <h5><i class="fas fa-rupee-sign"></i> {{$tab_item->price}} \-</h5>
                            <a href="#" class="btn btn-primary btn-block">Add To Table</a>
                        </div>
                    </div>
                     </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
