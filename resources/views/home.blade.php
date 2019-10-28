@extends('layouts.eballot')
@section('pageTitle', 'Home')
@section('content')
<div class="content ">
    <div class="front-page container">
        <div class="card mb-3 border-success">
            <img class="card-img-top" src="/images/card.jpg" alt="Card image cap">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h4 class="card-title">Simple</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="card-title">Secure</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="card-title">Reliable</h4>
                    </div>
                </div>
                <hr class="success">

                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-center">
                            Our online voting system gets you the results you need to make the important decisions. Using our online voting system, eligible voters are able to cast their votes from anywhere, using any device. We ensure your data is secure, backed up, and there when you need it. Our convenient approach means a more enjoyable voting experience.
                        </p>
                    </div>
                </div>
                <p class="card-text">
                    <small class="text-muted">Elections starting in @include('layouts.countdown')
                </small>
            </p>
        </div>
    </div> 
</div>


</div>
@endsection
