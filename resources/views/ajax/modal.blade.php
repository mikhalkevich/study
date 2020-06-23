<h2>{{$obj->name}}</h2>
<img src="{{asset('uploads/'.$obj->user_id.'/'.$obj->picture)}}" width="100%" />
<div>
    <b>Цена:</b>{{$obj->price}}
</div>
<div>
    <b>Каталог:</b>{{$obj->catalogs->name}}
</div>
<div>
    {!! $obj->body !!}
</div>
