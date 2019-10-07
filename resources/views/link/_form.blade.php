    
<div class="row">
    <div class="input-field">
        <input id="titulo" type="text" class="" name="titulo" value="{{ isset($registro->titulo)? $registro->titulo: old( 'titulo')}}"  autocomplete="titulo" autofocus>
        <label for="titulo">Título</label>
        @error('titulo')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>    
<div class="row">
    <div class="input-field">
        <input id="url" type="text" class="" name="url" value="{{ isset($registro->url)? $registro->url: old( 'url')}}"  autocomplete="url">
        <label for="url">Nome url</label>
        @error('url')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>

@section('script')
@if(Session::has('errors'))
<script type="text/javascript">
    $(document).ready(function(){
       $('#modal-add').modal('open');
   });
</script>
@endif
@endsection

