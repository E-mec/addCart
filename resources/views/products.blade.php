
@extends('layout')

@section('content')

<div class="row">
    @foreach ($products as $product )
        <div class="col-xs-12 col-md-4 col-sm-6" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                <img src="{{ asset('img/'.$product->photo) }}" alt="" class="img-fluid img-thumbnail">
                <div class="caption">
                    <h4>{{ $product->product_name }}</h4>
                    <p>{{ $product->product_description }}</p>
                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                    <p class="btn-holder">
                        <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection


