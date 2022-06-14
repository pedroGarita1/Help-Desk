<!------ Include the above in your HEAD tag ---------->
<?php  require_once "view/modals/modal_contactanos.php";?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="public/img/hdlogo.png" id="icon" alt="User Icon" />
      <h1>Help-Desck</h1>
    </div>

    <!-- Login Form -->
    <form id="form_login" method="POST">
      <input type="text" id="login" class="fadeIn second input-login" name="login" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third input-login" name="password" placeholder="password" required>
      <span class="btn btn-primary mt-3 mb-3" id="btn_entrar">Entrar</span>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#" data-bs-toggle="modal" data-bs-target="#modal_contacto">Contactanos</a>
    </div>

  </div>
</div>
<script src="<?=SERVIDOR?>controller/user/controlador_login.js" type="module"></script>