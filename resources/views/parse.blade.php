@extends('layouts.app')
@push('scripts')
    <script src="{{asset('js/parse.js')}}"></script>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Парсинг сайтов</div>
                    <div class="card-body">
                        <nav>
                            <a href="#" class="btn btn-success" id="parse_onliner">Onliner.by</a>
                            <a href="#" class="btn btn-primary" id="parse_24">24.by</a>
                        </nav>
                        <div id="parse_empty">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
