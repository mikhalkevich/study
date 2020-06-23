@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{asset('catalog/'.$obj->catalog_id)}}">{{$obj->catalogs->name}}</a>
                    {{$obj->name}}</div>
                <div class="card-body">
                    <img src="{{asset('uploads/'.$obj->user_id.'/'.$obj->picture)}}" class="card-img-top"/>
                    {!! $obj->body !!}
                    <hr />
                    {{$obj->price}} руб.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
