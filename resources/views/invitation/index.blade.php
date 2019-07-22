@extends('main')
@section('content')
<div class="row">
    <div class="col-md-10"> 
        <h1>All Invitations</h1>

    </div>
    <div class="col-md-2">
        <a href="{{route('invitations.create')}}" class="btn btn-primary btn-block btn-lg">Add Invitation</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Event Title</th>
                    <th>Email</th>
                    <th>Sent-At</th>
                    <th>Accepted-At</th>
                    <th>Rejected-At</th>
                </thead>
                <tbody>
                    @foreach($invitations as $invitation)
                    <tr>
                        <td>{{$invitation->id}}</td>
                        <td>{{$invitation->event->name}}</td>
                        <td>{{$invitation->email}}</td>
                        <td>{{$invitation->sent_at}}</td>
                        <td>{{$invitation->accepted_at}}</td>
                        <td>{{$invitation->rejected_at}}</td>
                        <td><a href="{{route('invitations.mailsend',$invitation->id)}}" class="btn btn-success">Send</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
</div>



@endsection
