<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:20:24
         compiled from "application\views\myself\project.php" */ ?>
<?php /*%%SmartyHeaderCode:32268563db448232911-25943905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf23c39cb09cb5d700ea32462ed193e4a0d6d184' => 
    array (
      0 => 'application\\views\\myself\\project.php',
      1 => 1426435271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32268563db448232911-25943905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code_project' => 0,
    'project_category_list' => 0,
    'value' => 0,
    'project_list' => 0,
    'baseURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db4482a8464_82771928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db4482a8464_82771928')) {function content_563db4482a8464_82771928($_smarty_tpl) {?><!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<div class="section-head">
  <div class="container">
    <h1>Projects</h1>
  </div>
  <!-- /.container --> 
</div>
<?php if ((isset($_smarty_tpl->tpl_vars['code_project']->value)&&$_smarty_tpl->tpl_vars['code_project']->value==1)) {?>
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <p class="lead">Some info about my projects that I have joined</p>
    <div class="divide30"></div>
    <ul class="filter">
      <li><a class="active" href="#" data-filter="*">All</a></li>
      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <li><a href="#" data-filter=".<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</a></li>
      <?php } ?>
    </ul>
    <!-- /.filter -->
    
    <ul class="items thumbs">
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
      <li class="item thumb <?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"> 
        <a href="index.php/home/view_project_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
">
        <div class="overlay">
          <div class="info">
            <h4><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</h4>
            <span><?php echo $_smarty_tpl->tpl_vars['value']->value->brief;?>
</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src="<?php if (($_smarty_tpl->tpl_vars['value']->value->avatar_name!=null&&$_smarty_tpl->tpl_vars['value']->value->avatar_name!='')) {?> <?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
userfiles/project/<?php echo $_smarty_tpl->tpl_vars['value']->value->avatar_name;?>
  <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" />
        </a>
        <br> <h5><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</h5><br> 
      </li>
    <?php } ?>
      <!-- /.item -->
    </ul>
    <!--/.items--> 
  </div>
  <!--/.inner--> 
  <div class="text-center"> <a href="index.php/home/view_project_list" class="btn btn-blue"><i class="icon-layout"></i> View more</a> </div>
  
</div>
<?php } else { ?>
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No PROJECTS Posted</h3>
      <br>
    </div>
  </center>
<?php }?>
<!--/#lightbox-->
<!--END /#projects--><?php }} ?>
