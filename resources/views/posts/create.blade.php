@extends('main')

@section('stylesheets')
 {{ Html::style('css/select2.min.css')}}
@endsection
@section('content')
    <div class="row">
    <div class="col-md-8">
        <h1>Create New Post</h1>
        {{ Form::open(array('route' => 'posts.store','files'=>true)) }}
        <div class="form-group row">
            {!! Form::label('title','Title', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::text('title',old('title'), [
                'class'=>$errors->has('title') ? 'form-control is-invalid' : 'form-control',
                'placeholder' =>"Post Title",'autofocus'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('slug','Slug', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::text('slug',old('slug'), [
                'class'=>$errors->has('slug') ? 'form-control is-invalid' : 'form-control',
                'autofocus'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('body','Body', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::textarea('body', null, ['class'=>$errors->has('body') ? 'form-control is-invalid' : 'form-control','placeholder' =>"Post Body",'autofocus']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('featured_image','Upload Featured Image',[ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::file('featured_image') !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('tags','Tag',[ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
               <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
               </select>
            </div>
        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
            {{ Form::close() }}

    </div>
    </div>
   
@endsection

