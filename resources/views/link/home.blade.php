@extends('layout.site')

@section('titulo','QrFacil')

@section('conteudo')
<div class="container">
    <div class="card" style="overflow:scroll;overflow:auto">
        <div class="card-content">
            <div class="row">
                <h3 class="center">Lista de Links do Cliente</h3>
                <hr>
                @if(Session::has('success'))
                <div class="card-panel green lighten-2">
                    {{session::get('success')}}
                </div>
                @endif
                @if(Session::has('delete'))
                <div class="card-panel red lighten-1">
                    {{session::get('delete')}}
                </div>
                @endif
                <div class="col s12 m9 l10 xl10">
                    <table id="table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>URL Destino</th>
                                <th>URL Local</th>
                                <th>Acesso</th>
                                <th>Opções</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($registros as $reg)
                            <tr>
                                <td>{{ $reg->id }}</td>
                                <td>{{ $reg->titulo }}</td>
                                <td>{{ $reg->url}}</td>
                                <td data-nome="www.qrfacil.com.br/{{$cliente}}/{{$reg->titulo}}">www.qrfacil.com.br/{{$cliente}}/{{$reg->titulo}}/</td>
                                <td><a class="waves-effect waves btn grey copiar" >
                                        <i class="material-icons">content_copy</i>
                                    </a>
                                    <a href="{{ route( 'link.acesso', ['cliente'=>$cliente , 'reg'=>$reg->titulo ]) }}" class="waves-effect waves-light btn blue">
                                        <i class="material-icons">home</i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route( 'link.editar', ['cliente'=>$cliente , 'reg'=>$reg->id ]) }}" class="waves-effect waves-light btn orange">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{ route('link.deletar' ,['cliente'=>$cliente , 'id'=>$reg->id]) }}" onclick="return confirm('Deseja deletar o Link {{$reg->titulo}}')" class="waves-effect waves-light btn red">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>

                <div class="card-action">
                    <a class="waves-effect waves-light btn green modal-trigger" href="#modal-add">Adicionar
                        <i class="material-icons right">add</i>
                    </a>
                    <a href="{{route('cliente.home')}}" class="waves-effect waves-light btn deep-blue">Voltar
                        <i class="material-icons right">reply</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-add" class="modal">
    <div class="modal-content">
        <h4>Adicionar registro</h4>
        <p>Preencha os dados do formulário abaixo</p>

        <form method="POST" action="{{ route('link.salvar' , $cliente) }}" class="" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('link._form')
            <div class="modal-footer">
                <a class="waves-effect waves-light btn deep-blue modal-action modal-close">Fechar
                    <i class="material-icons right">close</i>
                </a>
                <button type="" class="waves-effect waves-light btn green">Salvar
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
