@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        } );
    </script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Кабинет пользователя {{$user}}</div>
                <div class="card-body">
                    <form method="post" action="{{asset('home')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="catalog_id">Каталог</label>
                            <select class="form-control" id="catalog_id" name="catalog_id">
                                @foreach($catalogs as $one)
                                <option value="{{$one->id}}">{{$one->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="body">Описание товара</label>
                            <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                            @error('body')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture1">Изображение</label>
                            <input type="file" class="form-control-file" id="picture1" name="picture1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th>Название</th>
                            <th width="300px">Изображение</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$prod->name}}</td>
                                <td with="300px">
                                    @if($prod->picture)
                                    <img src="{{asset('uploads/'.$prod->user_id.'/s_'.$prod->picture)}}" width="100%">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{$prod->catalogs->name}}</td>
                                <td width="200px">
                                    <a href="{{asset('home/delete/'.$prod->id)}}" class="btn btn-default btn-block">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <p align="center">{!! $products->links() !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
