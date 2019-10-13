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
        text-decoration: none;
        background-color: none;
    }

    .trash,
    .edit:focus {
        outline: 0;
    }

    .add:focus {
        outline: 0;
    }

    thead {
        font-weight: bold;
        font-size: 18px;
    }

    .fas:hover {
        color: black;
    }
</style>
@endsection

@section('content')
{{-- content --}}
{{-- Table products --}}
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">@sortablelink('id')</th>
            <th scope="col">@sortablelink('name', 'Nome')</th>
            <th scope="col">@sortablelink('price', 'Preço')</th>
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
            <td>
                <form id="delete-form" action="{{route('products.update', $product->id)}}", method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="inactive" name="status">
                </form>
                <a href="#" class="edit" data-toggle="modal" data-target="#editProductModal{{$product->id}}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="{{route('products.update', $product->id)}}" class="trash" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                    <i class="fas fa-trash-alt"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <button type="button" class="add" data-toggle="modal" data-target="#newProductModal">
        <i class="fas fa-plus-circle fa-3x"></i>
    </button>
    {!! $products->appends(\Request::except('page'))->render() !!}
</div>
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
