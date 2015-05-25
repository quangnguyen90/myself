<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<base href="{$base_url}">
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

    {if isset($ext_css) and $ext_css}
    <!--external css-->
    {foreach from=$ext_css item=stylesheet}
    <link href="{$stylesheet}" rel="stylesheet">
    {/foreach}
    {/if}
    <!-- =============================================================================================================================================================== -->
    <script type="text/javascript">
      var baseUrlQ = "{$base_url}";
    </script>
    
</head>

<body data-spy="scroll" data-target=".nav-collapse" data-offset="100">
    <div class="body-wrapper">
        <!--header start-->
        <div id="header" class="navbar navbar-fixed-top">
        	{include file="layout/header.php"}
        </div>
        <!--header end-->

        <!--main content start-->
        <div class="myself-content">
        	{include file="$content_tpl"}
        </div>
        <!--main content end-->

        <!-- footer start -->
        <footer class="light-wrapper text-center">
            {include file="layout/footer.php"}  
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

{if isset($ext_js) and $ext_js}
<!--external script-->
{foreach from=$ext_js item=script}
<script src="{$script}"></script>
{/foreach}
{/if}


<!--common script init for all pages-->

<!--script for this page-->
<script>
    $(function(){
       // Init the Dashboard appplication
       
   });
</script>

</body>

</html>