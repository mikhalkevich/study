@extends('layouts.app')
@push('scripts')
    <script src="{{asset('js/welcome.js')}}" defer></script>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Добро пожаловать на сайт</div>
                    <div class="card-body">
                       @foreach($all as $one)
                           <div>
                            <a href="{{asset('product/'.$one->id)}}" class="prod" data-body="{{$one->body}}" data-catalog="{{$one->catalogs->name}}" data-price="{{$one->price}}" data-picture="/uploads/{{$one->user_id}}/s_{{$one->picture}}">{{$one->name}}</a>
                           </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="empty_prod">
                    <h2 id="empty_prod_name"></h2>
                    <div id="empty_prod_catalog"></div>
                    <img id="empty_prod_picture" />
                    <div id="empty_prod_body"></div>
                    <div id="empty_prod_price"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
