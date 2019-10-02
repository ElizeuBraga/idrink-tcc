@extends('layouts.app')
@section('style')
<style>
    /* style */
    body {
        /* font-family: inherit; */
    }

    .modal,
    .table {
        color: black;
        font-family: Arial, Helvetica, sans-serif !important;
    }

    .btn-primary {
        color: black !important;
        width: 20px !important;
        font-weight: bold;
        background-color: #007bff;
    }

    input {
        height: 50px !important;
    }

    .btn-secondary {
        color: black !important;
        font-weight: bold;
        width: 20px !important;
        background-color: #6c757d;
    }

    .btn-secondary:hover {
        color: white !important;
        background-color: #6c757;
    }

    .btn-primary:hover {
        color: white !important;
        background-color: #6c757;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: black;
    }

    .modal-title {
        font-size: 18px;
    }

    input {
        height: 12px;
        ;
    }

    label {
        font-size: 16px;
    }

    .edit {
        /* height: 0px!important; */
        /* width: 0px!important; */
    }

    .edit:focus {
        outline: 0;
    }

    thead {
        font-weight: bold;
        font-size: 18px;
    }
</style>
@endsection

@section('content')
{{-- content --}}
{{-- Table products --}}
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#newProductModal">
    Novo produto
</button>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">valor</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>

            {{-- Modal editar --}}
            <div class="modal fade" id="editProductModal{{$product->id}}" tabindex="-1" role="dialog"
                aria-labelledby="newProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newProductModalLabel">Editar</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('products.update', $product->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nome do produto:</label>
                                    <input type="hidden" value="{{Auth::user()->id}}" class="form-control"
                                        name="store_id" id="" aria-describedby="helpId" placeholder="" required>
                                    <input type="text" class="form-control" value="{{$product->name}}" name="name" id=""
                                        aria-describedby="helpId" placeholder="" required>
                                    <label for="">Valor:</label>
                                    <input type="text" class="form-control" value="{{$product->price}}" name="price"
                                        id="" aria-describedby="helpId" placeholder="" required>
                                </div>
                        </div>
                        <div class="modal-footer align-self-center">
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <td><button type="button" class="edit" data-toggle="modal" data-target="#editProductModal{{$product->id}}">
                    <i class="fas fa-pencil-alt"></i>
                </button></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- new product modal --}}
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel">Novo produto</h5>
            </div>
            <form action="{{route('products.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome do produto</label>
                        <input type="hidden" value="{{Auth::user()->id}}" class="form-control" name="store_id" id=""
                            aria-describedby="helpId" placeholder="" required>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" required>
                        <label for="">Valor</label>
                        <input type="text" class="form-control" name="price" id="" aria-describedby="helpId"
                            placeholder="" required>
                    </div>
                </div>
                <div class="modal-footer align-self-center">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    // script
    $('#newProductModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
    });
</script>
@endsection
