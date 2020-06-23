@extends('layouts.app')
@push('scripts')
    <script src="{{asset('js/modal.js')}}" defer></script>
@endpush
@push('styles')
    <link href="{{asset('css/modal.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container">
        <h2>{{$catalog->name}}</h2>
        <div class="row justify-content-center">
            @foreach($objs as $one)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('uploads/'.$one->user_id.'/s_'.$one->picture)}}" class="card-img-top"/>
                        <div class="card-body">
                            <h5 class="card-title">{{$one->name}}</h5>
                            <p class="card-text"> {{$one->price}} руб.</p>
                            <a href="{{asset('product/'.$one->id)}}" class="btn btn-primary">Перейти</a>
                            <a href="#" data-id="{{$one->id}}" class="btn btn-primary my_mod">Открыть</a>
                            <a href="#html" id="good-{{$one->id}}-{{$one->price}}" class="btn btn-sm btn-primary btn-cart addCart"> <span class="glyphicon glyphicon-list"></span> Add to cart </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <p align="center">{!! $objs->links() !!}</p>


        </div>
    </div>
@endsection
