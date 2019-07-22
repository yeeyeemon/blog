@extends('main')

@section('stylesheets')
 {{ Html::style('css/select2.min.css')}}
@endsection
@section('content')
    <div class="row">
    <div class="col-md-8">
        <h1>Create New Post</h1>
        {{ Form::open(array('route' => 'invitations.store')) }}
        <div class="form-group row">
            {!! Form::label('event_title','Event Title', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
            {!! Form::select('event_title', $events, null,[
                'class'=>$errors->has('slug') ? 'form-control is-invalid' : 'form-control',
                'autofocus'
                ])  !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('email','Email', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::email('email',old('email'), [
                'class'=>$errors->has('email') ? 'form-control is-invalid' : 'form-control',
                'autofocus'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('sent_at','Sent At', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
                {!! Form::date('sent_at',old('sent_at'), [
                'class'=>$errors->has('sent_at') ? 'form-control is-invalid' : 'form-control',
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

