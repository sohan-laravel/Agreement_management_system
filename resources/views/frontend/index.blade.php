@extends('frontend.layout.master')

@section('frontend-content')

<section class="AboutUs">
        <div class="container">

            @foreach ($about as $row)

            <div class="row mt-3">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/images/AboutImage/'.$row->image) }}" style="width: 100%;">
                </div>

                <div class="col-md-6">
                    <div class="aboutustext">
                        <span class="h3">{{ $row->name }}</span>
                        <p class="pt-1">{!! $row->description !!}</p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
</section>
    
@endsection