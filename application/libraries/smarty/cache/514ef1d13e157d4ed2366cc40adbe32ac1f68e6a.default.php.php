<?php /*%%SmartyHeaderCode:25024556334f2a08706-62308476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '514ef1d13e157d4ed2366cc40adbe32ac1f68e6a' => 
    array (
      0 => 'application\\views\\layout\\default.php',
      1 => 1427980470,
      2 => 'file',
    ),
    'c26513e9ba60b8caafe0fa1726923939fbbdefb3' => 
    array (
      0 => 'application\\views\\layout\\header.php',
      1 => 1427171601,
      2 => 'file',
    ),
    'ce8cad3bf43f6ae595c1672f2a8801e34dd4edd5' => 
    array (
      0 => 'application\\views\\myself\\index.php',
      1 => 1427980473,
      2 => 'file',
    ),
    '4ead027e51ecc22f7f0984155ae887d4d22971e0' => 
    array (
      0 => 'application\\views\\layout\\slide_page.php',
      1 => 1424092796,
      2 => 'file',
    ),
    'e2889ce27fb929429ee008fe9108fd8484f5ebf7' => 
    array (
      0 => 'application\\views\\myself\\about.php',
      1 => 1427298947,
      2 => 'file',
    ),
    '19d976cce1a39ce0f84d22cbf66079fa4250ed66' => 
    array (
      0 => 'application\\views\\myself\\accomplishment.php',
      1 => 1427978598,
      2 => 'file',
    ),
    '864888cb191db90c9b4edcd34646aa1b42053164' => 
    array (
      0 => 'application\\views\\myself\\skill_set.php',
      1 => 1427980682,
      2 => 'file',
    ),
    'cf23c39cb09cb5d700ea32462ed193e4a0d6d184' => 
    array (
      0 => 'application\\views\\myself\\project.php',
      1 => 1426435271,
      2 => 'file',
    ),
    'b65e648b78f33e6e48e6cfb2f4890343da101143' => 
    array (
      0 => 'application\\views\\myself\\blog.php',
      1 => 1427391830,
      2 => 'file',
    ),
    '7553a0ffaa4ee7a3f00d2327a5bfa08f02dff74c' => 
    array (
      0 => 'application\\views\\layout\\footer.php',
      1 => 1426746306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25024556334f2a08706-62308476',
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
  'unifunc' => 'content_556334f357f078_37881616',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556334f357f078_37881616')) {function content_556334f357f078_37881616($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<base href="http://localhost/myself/">
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

        <!-- =============================================================================================================================================================== -->
    <script type="text/javascript">
      var baseUrlQ = "http://localhost/myself/";
    </script>
    
</head>

<body data-spy="scroll" data-target=".nav-collapse" data-offset="100">
    <div class="body-wrapper">
        <!--header start-->
        <div id="header" class="navbar navbar-fixed-top">
        	<div class="navbar-inner">
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
      
             </ul>
    </div>
  </div>
</div>
        </div>
        <!--header end-->

        <!--main content start-->
        <div class="myself-content">
        	<!-- slide page start -->
<section id="home" class="offset">
  <div class="fullwidthbanner-container revolution">
  <div class="fullwidthbanner">
    <ul>
      <li data-transition="fade"> <img src="assets/style/images/art/slider1.png" alt="" />
        <div class="caption sfl bold bg text-center" data-x="center" data-y="220" data-speed="500" data-start="500" data-easing="easeOutExpo">Hello world</div>
        <div class="caption sfr lite bg text-center" data-x="center" data-y="359" data-speed="500" data-start="900" data-easing="easeOutExpo">I'm Quang Nguyen <br> A web developer</div>
          <div class="caption sfb icon bg" data-x="440" data-y="500" data-speed="500" data-start="1200" data-easing="easeOutExpo"><a href="https://www.facebook.com/quang.nguyenphu.14"><i class="icon-s-facebook"></i></a></div>
          <div class="caption sfb icon bg" data-x="490" data-y="500" data-speed="500" data-start="1400" data-easing="easeOutExpo"><a href="https://github.com/quangnguyen90"><i class="icon-s-github"></i></a></div>
          <div class="caption sfb icon bg" data-x="540" data-y="500" data-speed="500" data-start="1600" data-easing="easeOutExpo"><a href="https://plus.google.com/u/0/108506522243213728592/posts"><i class="icon-gplus"></i></a></div>
          <div class="caption sfb icon bg" data-x="590" data-y="500" data-speed="500" data-start="1800" data-easing="easeOutExpo"><a href="http://lnkd.in/bQxqy-Q"><i class="icon-s-linkedin"></i></a></div>
          <div class="caption sfb icon bg" data-x="640" data-y="500" data-speed="500" data-start="2000" data-easing="easeOutExpo"><a href="https://www.youtube.com/channel/UCc508fgvYhNOwbMeOAVm69Q/videos"><i class="icon-s-youtube"></i></a></div>
      </li>
     <li data-transition="fade"> <img src="assets/style/images/art/slider-transparent.png" alt="" style="background-color:#2a2a2a" />
       <div class="caption sfl bold mid text-center" data-x="center" data-y="190" data-speed="500" data-start="500" data-easing="easeOutExpo">From the passion to ambitous</div>
       <div class="caption sfr lite mid text-center" data-x="center" data-y="306" data-speed="500" data-start="900" data-easing="easeOutExpo">This is How I Do My Awesome Works</div>
       <div class="caption sfb" data-x="96" data-y="412" data-speed="500" data-start="1400" data-easing="easeOutExpo"><img src="assets/style/images/icons/icon-heart.png" alt="" /></div>
       <div class="caption sft icon-arrow" data-x="287" data-y="442" data-speed="500" data-start="1600" data-easing="easeOutExpo"><i class="icon-right-open-1"></i></div>
       <div class="caption sfb" data-x="389" data-y="412" data-speed="500" data-start="1800" data-easing="easeOutExpo"><img src="assets/style/images/icons/icon-statistics.png" alt="" /></div>
       <div class="caption sft icon-arrow" data-x="579" data-y="442" data-speed="500" data-start="2000" data-easing="easeOutExpo"><i class="icon-right-open-1"></i></div>
       <div class="caption sfb" data-x="677" data-y="412" data-speed="500" data-start="2200" data-easing="easeOutExpo"><img src="assets/style/images/icons/icon-notes.png" alt="" /></div>
       <div class="caption sft icon-arrow" data-x="871" data-y="442" data-speed="500" data-start="2400" data-easing="easeOutExpo"><i class="icon-right-open-1"></i></div>
       <div class="caption sfb" data-x="969" data-y="412" data-speed="500" data-start="2600" data-easing="easeOutExpo"><img src="assets/style/images/icons/icon-portfolio.png" alt="" /></div>
     </li>
      <li data-transition="fade"> <img src="assets/style/images/art/slider3.png" alt="" />
        <div class="caption sfl bold bg text-center" data-x="center" data-y="220" data-speed="500" data-start="500" data-easing="easeOutExpo">Simple & Different</div>
        <div class="caption sfr lite bg text-center" data-x="center" data-y="359" data-speed="500" data-start="900" data-easing="easeOutExpo">Live once, live forever</div>
        <div class="caption sfb text-center" data-x="center" data-y="470" data-speed="500" data-start="1400" data-easing="easeOutExpo">
         <div class="scroll"><a href="#accomplishment" class="btn btn-large">See my resume</a></div>
       </div>
      </li>
    </ul>
    <div class="tp-bannertimer tp-bottom"></div>
  </div>
  <!-- /.fullscreen-banner --> 
</div>
<!-- /.fullscreen-container --> 
</section>
<!-- slide page end -->

<!-- #home/aabout -->
<section id="about" class="light-wrapper">
  <div class="section-head">
  <div class="container">
    <h1>About me</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
<div class="container inner">
  <div class="row">
    <div class="span3 rp10"> <img src="assets/style/images/art/ceo.jpg" class="round" alt="" /> </div>
    <!-- /.span3 -->
    <div class="span9">
      <div class="divide10"></div>
      <MARQUEE> <p class="lead"> Funny guy, friendly, hard work, careful, active, enjoy learning new things, passion & ambitious. </p> </MARQUEE>
      <div class="divide10"></div> 
      
      <!-- ============================ SOMETHINGs TO SAY -->
      <div class="accordion-group">
        <div class="accordion-heading"> 
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            Some words... <i class="icon-comment-1"></i>  
          </a> 
        </div>
        <div id="collapseOne" class="accordion-body collapse">
          <div class="accordion-inner"> 
            <blockquote>
              <p> <span class="dropcap">I</span> always want to make simple & different software products by myself to help people in their life.
                  I learn every days to get more experiences as much as possible & think a lot about my career path: Who will I become to in the future? What will I have to do ? What will I get ?
                  </p>

              <p> After graduated from my Van Lang university, major in Software engineering (based on Canergie Mellon University program), my first objective is become project 
                  manager. So that, I have been started to research & read a lot of newspaper about economical, successfull people, unique ideas, human resource management, etc to 
                  promote my passion on IT. I also imporve my technical skill, soft skill because it's my current working & enjoy learn new things when I have free time.
              </p>

              <p> <span class="dropcap">M</span> oreover, I also have a passion on music. I can play cajon drum, harmonica, guitar, flute, ukulele & I am learning keyboard, also. It helps me relax when I feel stress & tired. 
                  I believe that playing instruments & working IT will make me become more confident. Music make us sometime have some unique ideas, logic better, open mind & think different. 
                  I am not lucky as many people when I was born with a weakness health, I know that there are many people who have worse status than me, but some of them still
                  beome successfull people and make a lot of others know them. Therefore, life is only once & no one have to live for the other's life, I believe that with all the passion & ambitous in IT, I will become 
                  a successfull people.
                </p>
            </blockquote>
          </div>
        </div>
      </div>
      <!-- ============================  END SOMETHINGs TO SAY-->
    </div>

    <!-- /.span9 --> 
  </div>
  <!-- /.row -->
  
  <div class="divide80"></div>
  <div class="row">
    <div class="span4">
      <h4>What I Do?</h4>
      <p>Working with PHP projects with new challenges that requires hard working & high responsibly since graduated from university, I also research & learn new programming 
       language/technology, design architecture, make ideas, testing, analyses requirement, write software documents, 
       ability in planning working, work independently or work on team, self-schedule management, 
       reading English materials & English communication. 
      </p>
      <!-- <p>Aenean lacinia bibendum nulla sed consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus sed posuere. Praesent commodo cursus magna, vel scelerisque nisl.</p> -->
    </div>
    <!-- /.span4 -->
    <div class="span4">
      <h4>What is My Process?</h4>
      <p>My overall working process when I start a new project</p>
      <ol>
        <li>Planning what I have to do (RE, Architectect & Design, Code, Test, Master Plan, 
Configuration, Risk, Change, Timelog, Working style....)</li>
        <li>Choose proecess model - usally is ACDM of Professor Anthony Latanze from CMU & combine it with one of methodologies: traditional/agile</li>
        <li>Gather & analyse requirements, validation, verfication, also</li>
        <li>Desgin overall architecture, component, quality attribute</li>
        <li>Implement & trakinng changes, risk, time, bugbet to improve the products when necessary</li>
        <li>Test & note to track isssues, bugs & errors</li>
        <li>Deploy</li>
      </ol>
    </div>
    <!-- /.span4 -->
    <div class="span4">
      <h4>Why Choose Me?</h4>
      <p>My working type to ensure progress</p>
      <ul class="bullet">
        <li>Check email every day to catch up the progress</li>
        <li>Note & tracking every things what I done & what I will do</li>
        <li>Make a check list to know what I have to do for today & also tomorrow</li>
        <li>Ask some one when have some troubles</li>
        <li>Think carefully before implementing code</li>
        <li>Report when task is done </li>
        <li>Log everything for more experiences, timelog everyday</li>
        <li>Always ready when have new task</li>
        <li>Enjoy learning new things when I have free time</li>
      </ul>
    </div>
    <!-- /.span4 --> 
  </div>
  <!-- /.row -->
  <div class="divide30"></div>
  <div class="text-center scroll"> <a href="#contact" class="btn btn-blue"><i class="icon-thumbs-up"></i> Contact me now</a> </div>
  
</div>
<!-- /.container --> 
</section>
<!-- END #home/about -->
<!-- =============================================================================================================================================================== -->
<!-- #accomplishment -->
<section id="accomplishment" class="dark-wrapper">
  <!-- =============================================================================================================================================================== -->
 <!-- #accomplishment -->
<div class="section-head">
  <div class="container">
    <h1>Accomplishment</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
<div class="container inner">
  <div class="container">
    <div class="row">
      <div class="timeline-centered">
        <!-- ============================================== GREEN-->
       <!--  <article class="timeline-entry">
         <div class="timeline-entry-inner">
           <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span> <span>Today</span></time>
           
           <div class="timeline-icon bg-success">
             <i class="entypo-feather"></i>
           </div>
       
           <div class="timeline-label">
             <h2><a href="#">Art Ramadani</a> <span>posted a status update</span></h2>
             <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
           </div>
       
         </div>
       </article> -->
        
        <!-- ============================================== RED-->
        <!-- <article class="timeline-entry left-aligned">
          <div class="timeline-entry-inner">
            <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span> <span>Today</span></time>
            
            <div class="timeline-icon bg-secondary">
              <i class="entypo-suitcase"></i>
            </div>
            
            <div class="timeline-label">
              <h2><a href="#">Job Meeting</a></h2>
              <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
            </div>
          </div>
        </article> -->
        
        <!-- ============================================== BLUE - SOftfoundry-->
        <article class="timeline-entry">
          <div class="timeline-entry-inner">
            <time class="timeline-time" datetime="2014-01-09T13:22"><span>7/2013-present</span></time>
            
            <div class="timeline-icon bg-info">
              <i class="entypo-location"></i>
            </div>
            
            <div class="timeline-label">
              <h2>PHP Web developer at Softfoundry VN</h2>
              <blockquote>
                <ul class="bullet">
                  <li>Develop PHP web base on Yii & CI Framework</li>
                </ul>
              </blockquote>
              <img src="assets/style/images/art/softfoundry.png" class="img-responsive img-rounded full-width">
            </div>
          </div>
        </article>
    
        <!-- ============================================== YELLOW - VLU-->
        <article class="timeline-entry left-aligned">
          <div class="timeline-entry-inner">
            <time class="timeline-time" datetime="2014-01-10T03:45"><span>2009-2013</span></time>
            
            <div class="timeline-icon bg-warning">
              <i class="entypo-camera"></i>
            </div>
            
            <div class="timeline-label">
              <h2>Graduated from Van Lang University, major in Software Engineering</h2>
              <blockquote>
                <ul class="bullet">
                  <li>Team Leader during University</li>
                  <li>GPA: 7.75</li>
                  <li>Learn IT base on Carnegie Mellon University program - USA</li>
                  <li>Get 2 Boeing & 1 USAID Sholarships on 1st & 2nd year</li>
                  <li>Get all the Awards Scholarship of each semester of IT department at Van Lang University (7 VLU Scholarships)</li>
                </ul>
              </blockquote>
              <img src="assets/style/images/art/VLU.png" class="img-responsive img-rounded full-width">
            </div>
          </div>
        </article>
    
        <!-- ============================================== WHITE-->
        <article class="timeline-entry begin">
          <div class="timeline-entry-inner">
            <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
              <i class="entypo-flight"></i>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
</section>
<!-- END #accomplishment -->
<!-- =============================================================================================================================================================== -->
<!-- #skills set -->
<section id="skill-set" class="light-wrapper">
  <!-- =============================================================================================================================================================== -->
 <!-- #skills set -->
<div class="section-head">
  <div class="container">
    <h1>Skills set</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- =================================================================================================================================== -->
<div class="container inner">
  <div class="row">
    <div class="span4">
      <h4>Technical skill</h4>
      <ul class="bullet">
        <li><strong>Programming language:</strong><br>
          <!-- ========================================================= PHP -->
           <div class="panel panel-default">
            <a data-toggle="collapse" data-target="#collapse_PHP"><i class="icon-sort-down"></i>&nbsp;<b>PHP</b></a>
            <div id="collapse_PHP" class="collapse in collapse-group">
              <div class="progress progress-success progress-striped active">
                <div class="bar" style="width: 75%">Advance</div>
              </div>
              <div class = "description">
                <p><b>-</b> Yii & CI framework (Smarty, CkEditor, CkFinder, Tank auth)</p>
                <p><b>-</b> RESTFUL & SOAP API (JSON)</p>
              </div>
            </div>
          </div>
          
          <!-- ========================================================= JAVA -->
          <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapse_JAVA">
                <i class="icon-sort-down"></i>&nbsp;<b>JAVA</b>
            </a>
            <div id="collapse_JAVA" class="panel-collapse collapse">
              <div class="progress progress-info progress-striped active">
                <div class="bar" style="width: 65%">Advance</div>
              </div>
              <div class = "description">
                <p><b>-</b> Struts 2 MVC</p>
                <p><b>-</b> Android</p>
                <p><b>-</b> Java swings </p>
              </div>
            </div>
          </div>

          <!-- ========================================================= C# -->
          <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapse_CSHARP">
                <i class="icon-sort-down"></i>&nbsp;<b>C#</b>
            </a>
            <div id="collapse_CSHARP" class="panel-collapse collapse">
              <div class="progress progress-warning progress-striped active">
                <div class="bar" style="width: 65%">Advance</div>
              </div>
              <div class = "description">
                <p><b>-</b> LinQ</p>
              </div>
            </div>
          </div>
          
          <!-- ========================================================= C++ -->
        <!--   <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapse_CPP">
                <i class="icon-sort-down"></i>&nbsp;<b>C++</b>
            </a>
            <div id="collapse_CPP" class="panel-collapse collapse">
              <div class="progress progress-danger progress-striped active">
                <div class="bar" style="width: 30%">Basic</div>
              </div>
              <div class = "description">
                <p><b>-</b> OOP</p>
              </div>
            </div>
          </div> -->
        </li>
        <li><strong>Database:</strong> <br> 
          <!-- ========================================================= MySQL -->
          <div class="panel panel-default">
            <a data-toggle="collapse" data-target="#collapse_MySQL"><i class="icon-sort-down"></i>&nbsp;<b>MySQL</b></a>
            <div id="collapse_MySQL" class="collapse in collapse-group">
              <div class="progress progress-success progress-striped active">
                <div class="bar" style="width: 90%">Skilled</div>
              </div>
            </div>
          </div>
          
          <!-- ========================================================= MongoDB -->
          <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapse_MongoDB">
                <i class="icon-sort-down"></i>&nbsp;<b>MONGODB</b>
            </a>
            <div id="collapse_MongoDB" class="panel-collapse collapse">
              <div class="progress progress-info progress-striped active">
                <div class="bar" style="width: 30%">Basic</div>
              </div>
            </div>
          </div>
          
          <!-- ========================================================= MS-SQL -->
          <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapse_MSSQL">
                <i class="icon-sort-down"></i>&nbsp;<b>MS-SQL</b>
            </a>
            <div id="collapse_MSSQL" class="panel-collapse collapse">
              <div class="progress progress-warning progress-striped active">
                <div class="bar" style="width: 66%">Advance</div>
              </div>
            </div>
          </div>

        </li>
        <li><strong>Front-end:</strong> HTML, CSS, JavaScript, jQuery, Ajax, Bootstrap, Strophe.js</li>
        <li><strong>Development tools:</strong> Visual Studio, Eclipse, SublimeText, Netbeans, XAMPP, Navicat, Ant, Tomcat, VMWare, FireBug, Putty, Notepad ++, Rational Rose, Git bash, Git hub, Google code, Tortoise, Dropbox, WinSCP, Filezilla, SVN</li>
        <li><strong>Operating system & Application servers:</strong> Windows, Ubuntu, Apache</li>
        <li><strong>Methodology:</strong> XP, ACDM, Waterfall </li>
        <li><strong>Others:</strong> WebRTC, SIPml5, XMPP, Photoshop, UML, XML</li>
      </ul>
    </div>
    <!-- =================================================================================================================================== -->
    <div class="span4">
      <h4>Management skill</h4>
      <ul class="bullet">
        <li><strong>Planning:</strong> Master plan, Work Breakdown Structure (WBS)</li>
        <li><strong>Management:</strong> Risk/Change/Configuration documentation, Time log & Team meeting, Software development process model specification, Reflection, Status report, Weekly report, Weekly plan</li>
        <li><strong>Requirement:</strong> Requirement Plan, Proposal, Concept of operation, User requirement Documentation, Software requirement specification, Business Rule, Operational Requirement Document, Use case document</li>
        <li><strong>Architectural:</strong> Architectural plan, Architecture Evaluation Plan, Architecture driver, Architectural design, Architecture Evaluation Document, Database document</li>
        <li><strong>Testing:</strong> Test plan, System test specification, Unit test specification, Acceptance test specification, Defect recording</li>
      </ul>
    </div>
    <!-- =================================================================================================================================== -->
    <div class="span4">
      <h4>Soft skill</h4>
      <ul class="bullet">
        <li>Team work<br>
          <div class="progress progress-success progress-striped active">
            <div class="bar" style="width: 100%">Skilled</div>
          </div>
        </li>
        <li>Self Learning<br>
          <div class="progress progress-danger progress-striped active">
            <div class="bar" style="width: 100%">Skilled</div>
          </div>
        </li>
        <li>Leadership <br>
          <div class="progress progress-info progress-striped active">
            <div class="bar" style="width: 70%">Advance</div>
          </div>
        </li>
        <li>Comunication<br>
          <div class="progress progress-success progress-striped active">
            <div class="bar" style="width: 90%">Skilled</div>
          </div>
        </li>
        <li>Personal management <br> 
          <div class="progress progress-warning progress-striped active">
            <div class="bar" style="width: 100%">Skilled</div>
          </div>
        </li>
        <li>Presentation <br> 
          <div class="progress progress-info progress-striped active">
            <div class="bar" style="width: 90%">Skilled</div>
          </div>
        </li>
      </ul>
    </div>
    <!-- /.span4 --> 
  </div>
</div>
<!-- /.container --> 
</section>
<!-- END #skill set-->
<!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<section id="projects" class="light-wrapper">
 <!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<div class="section-head">
  <div class="container">
    <h1>Projects</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <p class="lead">Some info about my projects that I have joined</p>
    <div class="divide30"></div>
    <ul class="filter">
      <li><a class="active" href="#" data-filter="*">All</a></li>
              <li><a href="#" data-filter=".6">University</a></li>
              <li><a href="#" data-filter=".3">Company</a></li>
              <li><a href="#" data-filter=".2">With Friend</a></li>
              <li><a href="#" data-filter=".1">Myself</a></li>
          </ul>
    <!-- /.filter -->
    
    <ul class="items thumbs">
          <li class="item thumb 6"> 
        <a href="index.php/home/view_project_detail/14" title="YALA">
        <div class="overlay">
          <div class="info">
            <h4>YALA</h4>
            <span>Hello world</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" assets/style/images/art/nofound.jpg " alt="" />
        </a>
        <br> <h5>YALA</h5><br> 
      </li>
          <li class="item thumb 6"> 
        <a href="index.php/home/view_project_detail/13" title="Yolo">
        <div class="overlay">
          <div class="info">
            <h4>Yolo</h4>
            <span>Yolo</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" assets/style/images/art/nofound.jpg " alt="" />
        </a>
        <br> <h5>Yolo</h5><br> 
      </li>
          <li class="item thumb 2"> 
        <a href="index.php/home/view_project_detail/12" title="Hoi">
        <div class="overlay">
          <div class="info">
            <h4>Hoi</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_FngSExPkpJpI.jpg  " alt="" />
        </a>
        <br> <h5>Hoi</h5><br> 
      </li>
          <li class="item thumb 3"> 
        <a href="index.php/home/view_project_detail/11" title="Tuat">
        <div class="overlay">
          <div class="info">
            <h4>Tuat</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_8OhgDiWHvG8g.jpg  " alt="" />
        </a>
        <br> <h5>Tuat</h5><br> 
      </li>
          <li class="item thumb 6"> 
        <a href="index.php/home/view_project_detail/10" title="Dau">
        <div class="overlay">
          <div class="info">
            <h4>Dau</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_u5GsCpTIb24r.jpg  " alt="" />
        </a>
        <br> <h5>Dau</h5><br> 
      </li>
          <li class="item thumb 1"> 
        <a href="index.php/home/view_project_detail/9" title="Than">
        <div class="overlay">
          <div class="info">
            <h4>Than</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_JeTREZVpri8W.jpg  " alt="" />
        </a>
        <br> <h5>Than</h5><br> 
      </li>
          <li class="item thumb 2"> 
        <a href="index.php/home/view_project_detail/8" title="Mui">
        <div class="overlay">
          <div class="info">
            <h4>Mui</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_eBDK7EaX4BPM.jpg  " alt="" />
        </a>
        <br> <h5>Mui</h5><br> 
      </li>
          <li class="item thumb 1"> 
        <a href="index.php/home/view_project_detail/7" title="Ngo">
        <div class="overlay">
          <div class="info">
            <h4>Ngo</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src=" http://localhost/myself/userfiles/project/project_AqpmGSmG7Yzp.jpg  " alt="" />
        </a>
        <br> <h5>Ngo</h5><br> 
      </li>
          <!-- /.item -->
    </ul>
    <!--/.items--> 
  </div>
  <!--/.inner--> 
  <div class="text-center"> <a href="index.php/home/view_project_list" class="btn btn-blue"><i class="icon-layout"></i> View more</a> </div>
  
</div>
<!--/#lightbox-->
<!--END /#projects-->
</section>
<!--/#lightbox-->
<!--END /#projects-->
<!-- =============================================================================================================================================================== -->  
<!-- /.testimonials -->
<div class="parallax testimonials">
  <div class="container inner text-center">
    <h2>My favorites words</h2>
    <div class="divide10"></div>
    <div id="our-testimonials" class="testimonials-tab tab-container">
      <div class="panel-container">
        <div id="tst1" class="tab-block"> I can do it <span class="author">Nguyen Phu Quang</span> </div>
        <div id="tst2" class="tab-block"> Learn by doing <span class="author">Quang Nguyen Phu</span> </div>
        <div id="tst3" class="tab-block"> Just try me <span class="author">Phu Quang Nguyen</span> </div>
        <div id="tst4" class="tab-block"> Be a leader <span class="author"> Quang Phu Nguyen</span> </div>
      </div>
      <!-- /.panel-container -->
      <ul class="etabs">
        <li class="tab"><a href="#tst1">1</a></li>
        <li class="tab"><a href="#tst2">2</a></li>
        <li class="tab"><a href="#tst3">3</a></li>
        <li class="tab"><a href="#tst4">4</a></li>
      </ul>
      <!-- /.etabs -->
    </div>
    <!-- /.testimonials-tab --> 
  </div>
  <!-- /.container --> 
</div>
<!-- END /.testimonials -->
<!-- =============================================================================================================================================================== -->
<!--/#blog -->
<section id="blog" class="dark-wrapper">
  <!-- =============================================================================================================================================================== -->
<!--/#blog -->
<div class="section-head">
  <div class="container">
    <h1>Lastest Blogs</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
<div class="container inner">
  <div class="row grid-blog">

              <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/4"> 
            <img src=" http://localhost/myself/userfiles/blog/blog_o0uu7DSkF3s8.jpg  " alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date">2015-03-07</div>
              <div class="sep">|</div>
              <div class="categories">My dream</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/4">Hakuna matata</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</p>
          </div>
          <!-- /.post-content -->
        </div>
              <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/3"> 
            <img src=" http://localhost/myself/userfiles/blog/blog_tNDsWM5353i8.jpg  " alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date">2015-03-07</div>
              <div class="sep">|</div>
              <div class="categories">Career path</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/3">Cuoi rung ron</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</p>
          </div>
          <!-- /.post-content -->
        </div>
              <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/2"> 
            <img src=" http://localhost/myself/userfiles/blog/blog_Txp2xTeEXacb.jpg  " alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date">2015-03-07</div>
              <div class="sep">|</div>
              <div class="categories">I and IT</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/2">Kinh ngac den kho tin</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum accumsan massa sed malesuada. Quisque eu tortor et sapien condimentum condimentum. Nam nec viverra urna. Fusce ut eleifend risus, bibendum pellentesque risus. Fusce consectetur a elit nec consectetur. Proin vel felis ut mi rutrum semper. Nulla a quam ut lorem luctus convallis. Nunc eget purus egestas, tempor arcu nec, tempor ante. Nullam arcu magna, placerat id scelerisque eu, rhoncus molestie lacus. Vivamus vulputate orci eget varius blandit. Integer non commodo libero. Quisque laoreet diam dolor, sed malesuada leo commodo eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec et ipsum leo.</p>
          </div>
          <!-- /.post-content -->
        </div>
              <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/1"> 
            <img src=" http://localhost/myself/userfiles/blog/blog_xbHUNPQKA973.jpg  " alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date">2015-03-07</div>
              <div class="sep">|</div>
              <div class="categories">My dream</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/1">An nhau dau nam</a></h4>
            <p>Hello world</p>
          </div>
          <!-- /.post-content -->
        </div>
        </div>
  <!--/.row -->
    <div class="text-center"> <a href="index.php/home/view_blog_list" class="btn btn-blue"><i class="icon-layout"></i> View all</a> </div>
 
  <!-- /.pagination --> 
</div>
<!--END /#blog -->
</section>
<!--END /#blog -->
<!-- =============================================================================================================================================================== -->
<!-- /#contact -->
<section id="contact">
  <div class="section-head">
    <div class="container">
      <h1>Get In Touch</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="parallax contact">
    <div class="container inner">
      <div class="row">
        <!-- <div class="span8">
          <div class="form-container">
            <div class="response alert alert-success"></div>
            <form class="forms" action="contact/form-handler.php" method="post" />
              <fieldset>
                <ol>
                  <li class="form-row text-input-row name-field">
                    <input type="text" name="name" class="text-input defaultText required" title="Name (Required)" />
                  </li>
                  <li class="form-row text-input-row email-field">
                    <input type="text" name="email" class="text-input defaultText required email" title="Email (Required)" />
                  </li>
                  <li class="form-row text-input-row subject-field">
                    <input type="text" name="subject" class="text-input defaultText" title="Subject" />
                  </li>
                  <li class="form-row text-area-row">
                    <textarea name="message" class="text-area required"></textarea>
                  </li>
                  <li class="form-row hidden-row">
                    <input type="hidden" name="hidden" value="" />
                  </li>
                  <li class="button-row">
                    <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0" />
                  </li>
                </ol>
                <input type="hidden" name="v_error" id="v-error" value="Required" />
                <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
              </fieldset>
            </form>
          </div>
        </div> -->
        <!-- /.span8 -->
        <center class="span12 sidebar lp10">
          <div class="sidebox widget">
            <h4>Contact Details</h4>
            <p>Feel freee to simply contact me and I will get in touch as soon as possible. </p>
            <ul class="contact-info">
              <!-- <li><i class="icon-location"></i> Moon St. 14/05 Light, Jupiter</li> -->
              <li><i class="icon-phone"></i>0986240402</li>
              <li><i class="icon-s-skype"></i>the.cen</li>
              <li><i class="icon-mail"></i>nguyenphuquang90@gmail.com</li>
            </ul>
          </div>
          <!-- /.widget -->
          <!-- <div class="sidebox widget">
            <h4>Custom Text</h4>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem.</p>
          </div> -->
          <!-- /.widget --> 
        </center>
        <!-- /.span4 --> 
      </div>
      <!-- /.row -->
      <div class="clearfix"></div>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.contact -->
</section>
<!-- END /#contact -->
        </div>
        <!--main content end-->

        <!-- footer start -->
        <footer class="light-wrapper text-center">
            <div class="container inner">
  <p><a href="index.php/auth/login" style="color:black">©</a> 2015 Developed by Quang Nguyen Phu. All rights reserved - version 0.1. Theme by elemis.</p>
  <ul class="social gray">
    <!-- <li><a href="#"><i class="icon-s-twitter"></i></a></li> -->
    <li><a href="https://www.facebook.com/quang.nguyenphu.14"><i class="icon-s-facebook"></i></a></li>
    <li><a href="https://github.com/quangnguyen90"><i class="icon-s-github"></i></a></li>
    <!-- <li><a href="#"><i class="icon-s-instagram"></i></a></li> -->
    <li><a href="https://plus.google.com/u/0/108506522243213728592/posts"><i class="icon-gplus"></i></a></li>
    <li><a href="http://lnkd.in/bQxqy-Q"><i class="icon-s-linkedin"></i></a></li>
    <li><a href="https://www.youtube.com/channel/UCc508fgvYhNOwbMeOAVm69Q/videos"><i class="icon-s-youtube"></i></li>
  </ul>
  <!-- /.social --> 
</div>
    <!-- /.container -->  
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



<!--common script init for all pages-->

<!--script for this page-->
<script>
    $(function(){
       // Init the Dashboard appplication
       
   });
</script>

</body>

</html><?php }} ?>
