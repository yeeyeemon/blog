@extends('main')

@section('stylesheets')
 {{ Html::style('css/select2.min.css')}}
@endsection
@section('content')
    <div class="row">
    <div class="col-md-8">
        <h1>Create New Post</h1>
        {{ Form::open(array('route' => 'events.store')) }}
        <div class="form-group row">
            {!! Form::label('name','Event Name', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::text('name',old('name'), [
                'class'=>$errors->has('name') ? 'form-control is-invalid' : 'form-control',
                'placeholder' =>"Event Name",'autofocus'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('event_date','Event Date', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::date('event_date',old('event_date'), [
                'class'=>$errors->has('event_date') ? 'form-control is-invalid' : 'form-control',
                'autofocus'
                ]) !!}
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

