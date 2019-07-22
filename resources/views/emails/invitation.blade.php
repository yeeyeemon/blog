Hello,

Here's is your invitation to the event.

<a href="{{route('invitations.send',[$invitation->id,'accept'])}}">Click Here to accept the invitation.</a>

<a href="{{route('invitations.send',[$invitation->id,'reject'])}}">Click here to reject the invitation.</a>