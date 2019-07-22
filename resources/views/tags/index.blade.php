@extends('main')
@section('content')
<div class="row">
    <div class="col-md-10"> 
        <h1>All Tags</h1>

    </div>
    
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Tag Name</th>
                   
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
        <div class="col-md-4">
        <div class="well">
        {{ Form::open(array('route' => 'tags.store')) }}
            <div class="dl-horizontal">
            {!! Form::label('title','Title', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            </div>
            <div class="dl-horizontal">
            {!! Form::text('name',old('name'), [
                'class'=>$errors->has('title') ? 'form-control is-invalid' : 'form-control',
                'placeholder' =>"Tag Name",'autofocus'
                ]) !!}    
            </div>
            <br>
            <div class="dl-horizontal">
            <button type="submit" class="btn btn-primary form-control">
                {{ __('Create') }}
            </button>
            </div>
            {{ Form::close() }}   
        </div>
    </div>
       
</div>



@endsection
