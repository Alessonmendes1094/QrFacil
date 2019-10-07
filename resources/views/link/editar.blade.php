@extends('layout.site')

@section('titulo','QrFacil')

@section('conteudo')
<div class="container">
	<div class="card">		
		<div class="card-content">
			<h3 class="center">Lista de Clientes Cadastrados</h3>
			<form method="POST" action="{{ route('link.salvar' , $cliente) }}" class="" id="form" enctype="multipart/form-data">
				{{csrf_field()}}

				<div class="row" style="display: none;">
					<div class="input-field">
						<input id="id" type="text"  name="id" value="{{ isset($registro->id)? $registro->id: old( 'id')}}">
						<label for="id">ID</label>
						@error('id')
						<span class="helper-text" style="color:red"  >{{ $message }}</span>
						@enderror
					</div>
				</div> 

				@include('link._form')

				<div class="card-action">
					<button type="" class="waves-effect waves-light btn green" >Salvar
						<i class="material-icons right">save</i>
					</button>
					<a href="{{route('cliente.home')}}" class="waves-effect waves-light btn deep-blue">Voltar
						<i class="material-icons right">reply</i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection