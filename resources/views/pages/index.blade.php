@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Pages
                <button class="btn btn-primary float-right font-size-12-px">Add New Page</button>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($pages as $page)
                <li class="list-group-item"><span class="font-size-12-px">{{$page->name}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection