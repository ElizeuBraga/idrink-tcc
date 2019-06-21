@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Entregas</h1>
    <ul id="entregas">
        <li v-for="delivery in deliveries">
            @{{delivery.id}} - @{{delivery.status}}
        </li>
    </ul>
    <div id="teste">
        @{{a}}
    </div>
</div>
<script>
    var app = new Vue({
        el: '#entregas',
        data () {
            return {
                deliveries: null
            }
        },
        mounted () {
            axios
            .get('http://localhost:8000/api/deliveries')
            .then(response => (this.deliveries = response.data))
        }
    });

    var teste = new Vue({
        el: '#teste',
        data: {
            a: ["Maçã", "Mama"]
        }
    });
    </script>
    @endsection