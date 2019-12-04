<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8"/>
     <title>.::SISTEMA DE COMERCIALIZACIÓN - ABC::.</title>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta content="width=device-width, initial-scale=1.0" name="viewport"/>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
      {!!Html::style('assets/admin-lte/plugins/fontawesome-free/css/all.min.css')!!}
      {!!Html::style('assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')!!}
	  {!!Html::style('assets/admin-lte/dist/css/adminlte.min.css')!!}
	  {!!Html::style('assets/css/login.css')!!}
	  {!!Html::style('assets/css/style.css')!!}
</head>
<body class="login">
<div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="alerta alert-success display-hide">
                    <span style="font-size: 22px;" class="ion-checkmark-circled"></span> 
                    <span style="display: block; margin-top: -21px; margin-left: 35px;">
                        Inicio de sesión correcto. Redireccionando . . .
                    </span>
                </div>
                <div class="alerta alert-info display-hide">
                    <span style="font-size: 22px;" class="ion-android-sync"></span> 
                    <span style="display: block; margin-top: -21px; margin-left: 35px;">
                        Autenticando . . .
                    </span>
                </div>
            </div>
            <div class="col-md-4"></div>
            </div>
        </div>
        <div class="logo">
            <img src="{{asset('assets/img/visa.png')}}" alt="Sistema de Comercialización & ABC">
            <p>Sistema de Comercialización & ABC</p>
        </div>
        <div class="content">
            {!!Form::open(['route'=>'store', 'method'=>'POST', 'onsubmit'=>'return false;'])!!}
                <div class="alert alert-danger display-hide"></div>
                <h4 class="form-title">Inicio de Sesión</h4>
                <div class="form-group">
                     <label class="control-label">USUARIO:</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" autocomplete="off" placeholder="administrador" id="txtUsuario" name="txtUsuario" value='admin' required autofocus/>
                     </div>
                </div>
                <div class="form-group">
                    <label class="control-label">CONTRASEÑA:</label>
                    <div class="input-icon">
                           <i class="fa fa-lock"></i>
                        <input class="form-control" type="password" placeholder="******" name="txtPassword" id="txtPassword" value='admin' required/>
                    </div>
                </div>
                <hr />
                <div class="form-actions">
                    <button class="btn btn-success pull-right" onclick='validarLogin();'>
                        <i class="fa fa-sign-in"></i> Ingresar </button>
                </div>
                <hr />
            {!!Form::close()!!}
        </div>
        <div class="copyright">
            2018 &copy; Sistema de Comercialización & ABC.
        </div>
        {!!Html::script('/assets/admin-lte/plugins/jquery/jquery.min.js')!!}
        {!!Html::script('/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
        {!!Html::script('/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
        {!!Html::script('/assets/admin-lte/dist/js/adminlte.min.js')!!}
        {!!Html::script('/assets/admin-lte/dist/js/adminlte.min.js')!!}
 <script>
           

            function validarLogin(){            	
                var route = window.location;  
                var token = $("input[name=_token]").val();
                $(".alert-info").removeClass("display-hide");
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        usuario : $('#txtUsuario').val(),
                        password : $('#txtPassword').val()
                    },
                    success: function(data){
                        if(data.rpta === 'OK'){
                            $('.content').fadeOut(1000);
                            $(".alert-info").addClass("display-hide");
                            $(".alert-success").removeClass("display-hide");
                            window.location = "{{URL::to('home')}}";
                        }
                        else{
                            $(".alert").css('display', 'block');
                            $('#txtPassword').val('');
                            $(".alert").removeClass("display-hide");
                            $(".alert").html("<button type='button' class='close' data-close='alert'>×</button>"+
                                             "<span><b>Error!</b> Los datos que ha ingresado son incorrectos.</span>");
                        }
                    }
                });
            }
        </script>
</body>
</html>