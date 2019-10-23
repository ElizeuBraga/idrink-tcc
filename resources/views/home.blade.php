@extends('layouts.app')
@section('style')
<style>
    /* style */
</style>
@endsection

@section('content')
    {{-- content --}}
    <h1>Home</h1>
    <example-component/>
    <form action="" method="post">
        @csrf
        <input type="text" name='store_id' value="{{Auth::user()->id}}">
        <input type="text" name='customer_id' value="{{Auth::user()->id}}">
        <textarea name="message">
            
        </textarea>
        <input type="submit" value="Enviar">
    </form>
{{-- {{Auth::user()->avatar}} - Avatar --}}
@endsection

@section('script')
<script>
    // script
</script>
@endsection
