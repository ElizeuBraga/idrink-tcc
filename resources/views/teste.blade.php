@extends('layouts.app')
@section('content')
{{-- @{{name}} --}}
<form action="/teste" method="post">
    @csrf
    <input type="text" name='store_id' value="{{Auth::user()->id}}">
    <input type="text" name='customer_id' value="{{Auth::user()->id}}">
    <textarea name="message">
        
    </textarea>
    <input type="submit" value="Enviar">
</form>
{{-- <example-component/> --}}
@endsection
@section('script')
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('dfc0cf5a19460300aeda', {
    cluster: 'us2',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    alert(JSON.stringify(data));
  });
</script>
@endsection