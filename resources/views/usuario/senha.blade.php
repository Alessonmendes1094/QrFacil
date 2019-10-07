@extends('layout.site')

@section('titulo','QrFacil')

@section('conteudo')
<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="modal-content">
                <h4>Atualizar Senha</h4>
                <form method="POST" action="{{ route('usuario.alterarsenha') }}" class="" id="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="input-field">
                            <input type="password" id="password" name="password" class="password" value="{{ old('password')}}">
                            <label for="password">Senha Atual</label>
                            @error('password')
                            <span class="helper-text" style="color:red"  >{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field">
                            <input type="password" id="password2" name="password2" class="password2" value="{{ old('password2')}}" required>
                            <label for="password2">Nova Senha</label>
                            @error('password2')
                            <span class="helper-text" style="color:red"  >{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input type="password" id="password3" name="password3" class="password3" value="{{ old('password3')}}" required>
                            <label for="password3">Confirmar Senha</label>
                            @error('password2')
                            <span class="helper-text" style="color:red"  >{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="waves-effect waves-light btn deep-blue modal-action modal-close">Fechar
                            <i class="material-icons right">close</i>
                        </a>
                        <button type="" class="waves-effect waves-light btn green" >Salvar
                            <i class="material-icons right">save</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection