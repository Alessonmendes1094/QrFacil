    
<div class="row">
    <div class="input-field">
        <input id="name" type="text" class="" name="name" value="{{ isset($registro->name)? $registro->name: old( 'name')}}"  autocomplete="name" autofocus>
        <label for="name">Título</label>
        @error('name')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>    
<div class="row">
    <div class="input-field">
        <input id="email" type="email" class="" name="email" value="{{ isset($registro->email)? $registro->email: old( 'email')}}">
        <label for="email">Email</label>
        @error('email')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>    
<div class="row">
    <div class="input-field">
        <input id="password" type="password" class="" name="password" value="{{ isset($registro->password)? $registro->password: old( 'password')}}">
        <label for="password">Senha</label>
        @error('password')
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

