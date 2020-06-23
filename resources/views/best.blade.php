@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Кабинет пользователя</div>
                    <div class="card-body">
                        <ul>
                        @foreach($catalogs as $cat)
                                <li>{{$cat->name}}
                                    <ul>
                                        @foreach($cat->products()->get() as $one)
                                            <li>
                                                {{$one->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                        @endforeach
                        </ul>
                        <h3>{{$vip->name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
