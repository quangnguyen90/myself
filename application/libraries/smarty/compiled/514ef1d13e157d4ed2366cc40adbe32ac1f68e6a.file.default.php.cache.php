<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:20:35
         compiled from "application\views\layout\default.php" */ ?>
<?php /*%%SmartyHeaderCode:31369563db453edf960-93887574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '514ef1d13e157d4ed2366cc40adbe32ac1f68e6a' => 
    array (
      0 => 'application\\views\\layout\\default.php',
      1 => 1427980470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31369563db453edf960-93887574',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'ext_css' => 0,
    'stylesheet' => 0,
    'ext_js' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db45403dd84_00664211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db45403dd84_00664211')) {function content_563db45403dd84_00664211($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
    <meta charset="utf-8" />
    <title>Quang Nguyen Phu's site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/style/images/favicon.png" />
    <link href="assets/style/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/style/css/settings.css" rel="stylesheet" />
    <link href="assets/style/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <link href="assets/style.css" rel="stylesheet" />
    <link href="assets/style/css/color/green.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link href="assets/style/type/fontello.css" rel="stylesheet" />

    <link href="assets/style/css/timeline.css" rel="stylesheet" />
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="assets/style/css/ie8.css" media="all" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="assets/style/js/html5shiv.js"></script>
    <![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php if (isset($_smarty_tpl->tpl_vars['ext_css']->value)&&$_smarty_tpl->tpl_vars['ext_css']->value) {?>
    <!--external css-->
    <?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ext_css']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
    <link href="<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
" rel="stylesheet">
    <?php } ?>
    <?php }?>
    <!-- =============================================================================================================================================================== -->
    <script type="text/javascript">
      var baseUrlQ = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
    </script>
    
</head>

<body data-spy="scroll" data-target=".nav-collapse" data-offset="100">
    <div class="body-wrapper">
        <!--header start-->
        <div id="header" class="navbar navbar-fixed-top">
        	<?php echo $_smarty_tpl->getSubTemplate ("layout/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        </div>
        <!--header end-->

        <!--main content start-->
        <div class="myself-content">
        	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['content_tpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        </div>
        <!--main content end-->

        <!-- footer start -->
        <footer class="light-wrapper text-center">
            <?php echo $_smarty_tpl->getSubTemplate ("layout/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
  
        </footer>
        <!-- /footer -->

    </div>
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<!--/.body-wrapper--> 
<script src="assets/style/js/jquery.js"></script> 
<script src="assets/style/js/bootstrap.min.js"></script> 
<script src="assets/style/js/twitter-bootstrap-hover-dropdown.min.js"></script> 
<script src="assets/style/js/jquery.themepunch.plugins.min.js"></script> 
<script src="assets/style/js/jquery.themepunch.revolution.min.js"></script> 
<script src="assets/style/js/jquery.themepunch.showbizpro.min.js"></script> 
<script src="assets/style/js/jquery.fitvids.js"></script> 
<script src="assets/style/js/jquery.slickforms.js"></script> 
<script src="assets/style/js/jquery.isotope.min.js"></script> 
<script src="assets/style/js/google-code-prettify/prettify.js"></script> 
<script src="assets/style/js/jquery.easytabs.min.js"></script> 
<script src="assets/style/js/jquery.jribbble-0.11.0.ugly.js"></script> 
<script src="assets/style/js/view.min.js?auto"></script> 
<script src="assets/style/js/scripts.js"></script>

<!-- DEMO ONLY -->
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/blue.css" title="blue-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/gray.css" title="gray-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/green.css" title="green-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/navy.css" title="navy-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/orange.css" title="orange-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/pink.css" title="pink-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/purple.css" title="purple-color" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/red.css" title="red-color" media="screen" />

<script type="text/javascript" src="assets/switcher/switchstylesheet.js"></script>
<script type="text/javascript">
    $(document).ready(function(){ 
        $(".changecolor").switchstylesheet( { seperator:"color"} );
    });
</script>

<?php if (isset($_smarty_tpl->tpl_vars['ext_js']->value)&&$_smarty_tpl->tpl_vars['ext_js']->value) {?>
<!--external script-->
<?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ext_js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value) {
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
<script src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"></script>
<?php } ?>
<?php }?>


<!--common script init for all pages-->

<!--script for this page-->
<script>
    $(function(){
       // Init the Dashboard appplication
       
   });
</script>

</body>

</html><?php }} ?>
