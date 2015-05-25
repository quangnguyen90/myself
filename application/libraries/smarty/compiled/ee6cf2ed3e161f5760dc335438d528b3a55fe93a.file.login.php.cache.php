<?php /* Smarty version Smarty-3.1.18, created on 2015-03-19 11:32:13
         compiled from "application\views\myself\login.php" */ ?>
<?php /*%%SmartyHeaderCode:13641550a514d8540d2-66955066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee6cf2ed3e161f5760dc335438d528b3a55fe93a' => 
    array (
      0 => 'application\\views\\myself\\login.php',
      1 => 1426739274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13641550a514d8540d2-66955066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_550a514d859355_02651917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550a514d859355_02651917')) {function content_550a514d859355_02651917($_smarty_tpl) {?><div class="light-wrapper offset">
  <div class="section-head">
    <div class="container">
      <h1>Login</h1>
    </div>
    <!-- /.container --> 
  </div>

  <div id="bodyLogin" style=" background-color: #444; background: url(assets/style/images/art/pick8_1.jpg);">
    <div class="container">
      <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">                                
              <div class="row-fluid user-row">
                <img src="assets/style/images/art/NPQ.png" class="img-responsive" alt="Conxole Admin"/>
              </div>
            </div>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" class="form-signin" action="<<?php ?>?php  echo ($this->uri->uri_string()); ?<?php ?>>">
                <fieldset>
                  <label class="panel-login">
                      <div class="login_result"></div>
                  </label>
                  <!-- USERNAME -->
                  <input class="form-control" placeholder="Username" id="username" type="text">
                  <input class="form-control" placeholder="Password" id="password" type="password">
                  <br></br>
                  <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php }} ?>
