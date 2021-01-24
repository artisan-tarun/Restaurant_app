@extends('layouts.app')

@section('content')
<div class="container">

        <h1>
            Restaurant App
        </h1>
        <h3>Welcome to our Resturant</h3>
        <a href="{{route('menu')}}" class="btn btn-primary btn-bg btn-block">Place Your Order</a>
            

</div>
@endsection
