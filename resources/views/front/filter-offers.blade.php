@extends('front.layouts.master')
@section('content')
    @include('front.partial.breadcum')
    <div class="space vs-cart-wrapper">
        <div class="container">
           <div class="row">
            @foreach ($offers as $offer)
              <div class="col-lg-4 col-md-6">
                 <div class="card payment-card">
                    <div class="box-body">
                       <img src="{{$offer->payment_patform_image()}}" style="width: 10%;">
                       <h4>{{$offer->payment_platform->name}}</h4>
                       <p>{{$offer->description}}.</p>
                       <button class="vs-btn style4 choose-btn">
                       <a href="{{$offer->aff_link}}" target="_blank" class="choose-payment-btn">Choose </a> 
                       </button>
                    </div>
                 </div>
              </div>
            @endforeach
           </div>
        </div>
     </div>
@endsection