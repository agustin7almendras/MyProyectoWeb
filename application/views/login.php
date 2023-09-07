<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN DE SISTEMA DE EMERGECIA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<!--CONTIENE EL PAQUETE LOGIN-->
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
    <h2>SISTEMA DE ALERTA PARA CONDUCTORES DE TAXIS</h2>
    <a href="../../index2.html"><b>-----</b>
    </a>
    
  </div>
  <!-- /.login-logo -->
  <div class="card" >
    <div class="card-body login-card-body" >

    <?php 
    
    switch($msg)
    {
      case '1':
        $mensaje="Error de ingreso";
        $clase="primary";
        break;
      case '2':
        $mensaje="Accseso no valido";
        $clase="danger";
        break;
      case '3':
        $mensaje="Gracias por usar el sistema";
        $clase="warning";
        break;
      default:
      $mensaje="Ingrese su usuario y clave para iniciar sesion";
      $clase="primary";
        break;
    }
    
    ?>

      <p class="login-box-msg text-<?php echo $clase; ?>"><?php echo $mensaje; ?> </p>
<?php 

#echo $msg; #para saber que id está logeandose.
?>

<?php 

echo form_open_multipart('usuarios/validarusuario', array('id'=>'form1','class'=>'needs-validation','method'=>'post'));

?>

      <!-- <form id="form1" class="needs-validation" action="../../index3.html" method="post"> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Login" name="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contrasena" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group m-3">
           <div class="col-11">
            <button type="submit" class="btn btn-primary btn-block">INICIAR</button>
          </div>
          
        </div>

        <div class="row">
          
     
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme contraseña
              </label>
            </div>
          </div>
      
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
      <!-- </form> -->
<?php 
echo form_close();
?>




      <div class="social-auth-links text-center mb-3">
        <p>- o -</p>

          <!--
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Registrarme usando Facebook
        </a>-->
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Registrarme con Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

    <p class="mb-1">
        <a href="forgot-password.html">olvide mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrar nuevo usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
