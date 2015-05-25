<?php /* Smarty version Smarty-3.1.18, created on 2015-05-25 21:42:59
         compiled from "application\views\myself\blog.php" */ ?>
<?php /*%%SmartyHeaderCode:10456556334f32e00f3-57288987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b65e648b78f33e6e48e6cfb2f4890343da101143' => 
    array (
      0 => 'application\\views\\myself\\blog.php',
      1 => 1427391830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10456556334f32e00f3-57288987',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code_blog' => 0,
    'blog_list' => 0,
    'value' => 0,
    'baseURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556334f343ef13_34397177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556334f343ef13_34397177')) {function content_556334f343ef13_34397177($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\xampp\\htdocs\\myself\\application\\libraries\\smarty\\libs\\plugins\\modifier.truncate.php';
?><!-- =============================================================================================================================================================== -->
<!--/#blog -->
<div class="section-head">
  <div class="container">
    <h1>Lastest Blogs</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
<?php if ((isset($_smarty_tpl->tpl_vars['code_blog']->value)&&$_smarty_tpl->tpl_vars['code_blog']->value==1)) {?>
<div class="container inner">
  <div class="row grid-blog">

      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blog_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"> 
            <img src="<?php if (($_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!=null&&$_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!='')) {?> <?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
userfiles/blog/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_avatar_name;?>
  <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->blog_date,10,'');?>
</div>
              <div class="sep">|</div>
              <div class="categories"><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_title;?>
</a></h4>
            <p><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_brief;?>
</p>
          </div>
          <!-- /.post-content -->
        </div>
      <?php } ?>
  </div>
  <!--/.row -->
    <div class="text-center"> <a href="index.php/home/view_blog_list" class="btn btn-blue"><i class="icon-layout"></i> View all</a> </div>
 
  <!-- /.pagination --> 
</div>
<?php } else { ?>
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No Blogs Posted</h3>
      <br>
    </div>
  </center>
<?php }?>
<!--END /#blog --><?php }} ?>
