<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 07/06/2016
 * Time: 09:05 AM
 */
?>
<?php $this->load->view('panel/includes/tags'); ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="box-login">
              <h1>Login</h1>
              <div>
                <input type="text" id="user" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" id="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div style="color: #ff1f1f;" id="div-alert"></div>
              <br>
              <div>
                <button type="submit" id="buttonLogin" class="btn btn-sm m-r-5">Continuar</button>
                <a class="reset_pass" href="<?= base_url() ?>panel/recuperarcontrasenia">olvidaste tu contraseña?</a>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>



              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  <!-- Javascript variables -->
  <script type="text/javascript">
    var base_url = '<?= base_url() ?>';
  </script>

  <!-- Javascript Libraries -->
  <!-- jQuery -->
  <script src="<?=base_url()?>resources/panel/js/jquery.min.js"></script> <!-- jQuery Library -->
  <!-- Bootstrap -->
  <script src="<?=base_url()?>resources/panel/js/bootstrap.min.js"></script>


  <script src="<?=base_url()?>resources/panel/js/ingresar.js"></script>