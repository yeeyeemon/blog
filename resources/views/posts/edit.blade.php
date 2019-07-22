@extends('main')
@section('content')
<h2>Edit Post</h2>
<div class="row">

    <div class="col-md-8">
    {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT','files'=>true,'accept'=>'video/*']) !!}
        <div class="form-group row">
            {!! Form::label('title','Title', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title',$post->title, [
                'class'=>$errors->has('title') ? 'form-control is-invalid' : 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('body','Body', [ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('body', $post->body, ['class'=>$errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('featured_image','Upload Featured Image',[ 'class'=>'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-6">
            <input type="file">
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="well">
            <div class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{date('M j,Y h:ia',strtotime($post->created_at)) }}</dd>
            </div>
            <div class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j,Y h:ia',strtotime($post->updated_at))}}</dd>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                    {!! Html::linkRoute('posts.show','Cancel', array($post->id),array('class'=>'btn btn-danger btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                    {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])!!}

                    </div>
                </div>
        </div>
    </div>
</div>
{{ Form::close() }}
<hr>

@endsection