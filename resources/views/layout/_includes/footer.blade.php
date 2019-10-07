

<!--JavaScript at end of body for optimized loading-->
<!-- Compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> <!--Scrips MArcaras https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html-->

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $(".dropdown-button").dropdown();
    $('.modal').modal();
    $('.button-collapse').sideNav();
    Materialize.toast();
    $('.money2').mask("0000.000", {reverse: true});

    $('.cpf').mask('000-000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');

    setTimeout( function() {
      $('.card-panel').fadeOut();
    },5000);

     $("#password3").on('blur', function(input){
            if (document.getElementById('password3').value != document.getElementById('password2').value) {
                document.getElementById('password3').setCustomValidity('Senhas Divegentes! Confirme os dados inseridos.');
            } else {
                // input is valid -- reset the error message
                document.getElementById('password3').setCustomValidity('');
            }
        });
  });    
</script>
@yield('script')
</body>
</html>
