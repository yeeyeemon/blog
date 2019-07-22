@extends('main')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <h3>Contact Me</h3>
        <hr>
        <form action="{{url('contact')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
               <label name="email">Email::</label>
               <input type="email" name="email" class="form-control">
               <label name="subject">Subject::</label>
               <input type="subject" name="subject" class="form-control">
                <label name="message">Maessage</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Type your Meassage here!!!!"></textarea>
                <input type="submit" class="btn-success" value="Send Message">
            </div>
        </form>
    </div>
    </div>
@endsection