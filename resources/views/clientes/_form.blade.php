    
<div class="row">
    <div class="input-field">
        <input id="nome" type="text" class="" name="nome" value="{{ isset($registro->nome)? $registro->nome: old( 'nome')}}"  autocomplete="nome" autofocus>
        <label for="nome">Nome (nome utilizado no link)</label>
        @error('nome')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>    
<div class="row">
    <div class="input-field">
        <input id="fantasia" type="text" class="" name="fantasia" value="{{ isset($registro->fantasia)? $registro->fantasia: old( 'fantasia')}}"  autocomplete="fantasia" autofocus>
        <label for="fantasia">Nome Fantasia</label>
        @error('fantasia')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field">
        <input id="email" type="email" class="validate" name="email" value="{{ isset($registro->email)? $registro->email: old('email')}}"  autocomplete="email">
        <label for="email">Email</label>
        @error('email')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="input-field">
        <input type="text" id="cnpj" name="cnpj" class="cnpj" value="{{ isset($registro->cnpj)? $registro->cnpj: old('cnpj')}}">
        <label for="cnpj">CNPJ</label>
        @error('cnpj')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="input-field">
        <input type="number" id="telefone" name="telefone" value="{{ isset($registro->telefone)? $registro->telefone : old('telefone')}}">
        <label for="telefone">Telefone</label>
        @error('telefone')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>      
<div class="row">
    <div class="input-field">
        <input type="text" id="endereco" name="endereco" value="{{ isset($registro->endereco)? $registro->endereco : old('endereco')}}">
        <label for="endereco">Endereço</label>
        @error('endereco')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>      
<div class="row">
    <div class="input-field">
        <input type="text" id="cidade" name="cidade" value="{{ isset($registro->cidade)? $registro->cidade : old('cidade')}}">
        <label for="cidade">Cidade</label>
        @error('cidade')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>      
<div class="row">
    <div class="input-field">
        <input type="text" id="contato" name="contato" value="{{ isset($registro->contato)? $registro->contato : old('contato')}}">
        <label for="contato">Nome do Contato</label>
        @error('contato')
        <span class="helper-text" style="color:red"  >{{ $message }}</span>
        @enderror
    </div>
</div>            

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#email").on('blur', function(input){
            if (document.getElementById('email').value != document.getElementById('email1').value) {
                document.getElementById('email').setCustomValidity('Emails Divegentes! Confirme os dados inseridos.');
            } else {
                // input is valid -- reset the error message
                document.getElementById('email').setCustomValidity('');
            }
        });
        $("#password-confirm").on('blur', function(input){
            if (document.getElementById('password-confirm').value != document.getElementById('password').value) {
                document.getElementById('password-confirm').setCustomValidity('Senhas Divegentes! Confirme os dados inseridos.');
            } else {
                // input is valid -- reset the error message
                document.getElementById('password-confirm').setCustomValidity('');
            }
        })
    });
</script>
@if(Session::has('errors'))
<script type="text/javascript">
    $(document).ready(function(){
       $('#modal-add').modal('open');
   });
</script>
@endif
@endsection

