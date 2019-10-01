@extends('layouts.app')
@section('style')
<style>
    /* style */

    .btn-primary{
        color: black!important;
        width: 20px!important;
        font-weight: bold;
        background-color: #007bff;
    }

    .btn-secondary{
        color: black!important;
        font-weight: bold;
        width: 20px!important;
        background-color: #6c757d;
    }

    .btn-secondary:hover{
        color: white!important;
        background-color: #6c757;
    }

    .btn-primary:hover{
        color: white!important;
        background-color: #6c757;
    }

    h1, h2, h3, h4, h5, h6{
        color: black;
    }

    .close {
        float: right;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: .5;
    }

    .modal-title{
        font-size: 18px;
    }
</style>
@endsection

@section('content')
    {{-- content --}}
    <h1>Products</h1>

    {{-- Table products --}}
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
          </tr>
        </tbody>
      </table>

    {{-- new product modal --}}
    <div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newProductModalLabel">Novo produto</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
            <div class="modal-body">
            <form action="{{route('products.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="">Nome do produto</label>
                    <input type="hidden" value="{{Auth::user()->id}}" class="form-control" name="store_id" id="" aria-describedby="helpId" placeholder="" required>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" required>
                    <label for="">Valor</label>
                    <input type="text" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="" required>
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
        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#newProductModal">
            Novo produto
        </button>
@endsection

@section('script')
<script>

    // script
    $('#newProductModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
    });
</script>
@endsection
