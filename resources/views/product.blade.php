@extends('layouts.main')
@section('content')



<div class="row mt-5">
    @forelse ($products as $row)
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('assets/photo-1505740420928-5e560c06d30e.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $row->name }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <h3>{{ $row->price }}</h3>
                <a data-product-id="{{$row->id}}" href="javascript:void(0)" class="cart btn btn-primary">Added to Cart</a>
            </div>
        </div>
    </div>
    @empty

    @endforelse

</div>

@endsection

