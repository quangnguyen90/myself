<?php /* Smarty version Smarty-3.1.18, created on 2015-05-25 21:42:58
         compiled from "application\views\layout\header.php" */ ?>
<?php /*%%SmartyHeaderCode:20217556334f2c843c6-91197035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26513e9ba60b8caafe0fa1726923939fbbdefb3' => 
    array (
      0 => 'application\\views\\layout\\header.php',
      1 => 1427171601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20217556334f2c843c6-91197035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_logged_in' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556334f2ccbd97_58194717',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556334f2ccbd97_58194717')) {function content_556334f2ccbd97_58194717($_smarty_tpl) {?><div class="navbar-inner">
  <div class="container"> <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".nav-collapse"><i class='icon-menu-1'></i></a> <a class="brand" href="#"><img src="assets/style/images/logo.png" alt="" /></a>
    <div class="nav-collapse pull-right collapse">
      <ul class="nav">
        <li><a href="#home">Home</a></li>
        <li class="dropdown"> <a href="#about" class="dropdown-toggle js-activated">About</a>
        </li>
        <li class="dropdown"> <a href="#accomplishment" class="dropdown-toggle js-activated">Resume</a>
          <ul class="dropdown-menu">
           <li><a href="#accomplishment">Accomplishment</a></li>
            <li><a href="#skill-set">Skills set</a></li>
            <li><a href="#projects">Projects</a></li>
          </ul>
        </li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
      
       <?php if ((isset($_smarty_tpl->tpl_vars['is_logged_in']->value)&&($_smarty_tpl->tpl_vars['is_logged_in']->value==true))) {?>
        <li class="dropdown"> <a href="#" class="dropdown-toggle js-activated">Admin - <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a>
          <ul class="dropdown-menu">
            <li><a href="index.php/admin_project/view_project_list">Project</a></li>
            <li><a href="index.php/admin_blog/view_blog_list">Blog</a></li>
            <li><a href="index.php/admin_category/view_category_list">Category</a></li>
            <li><a href="index.php/auth/logout">Logout</a></li>
          </ul>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
</div><?php }} ?>
