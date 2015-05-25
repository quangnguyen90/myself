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
      
       {if (isset($is_logged_in) AND ($is_logged_in == true)) }
        <li class="dropdown"> <a href="#" class="dropdown-toggle js-activated">Admin - {$username}</a>
          <ul class="dropdown-menu">
            <li><a href="index.php/admin_project/view_project_list">Project</a></li>
            <li><a href="index.php/admin_blog/view_blog_list">Blog</a></li>
            <li><a href="index.php/admin_category/view_category_list">Category</a></li>
            <li><a href="index.php/auth/logout">Logout</a></li>
          </ul>
        </li>
        {/if}
      </ul>
    </div>
  </div>
</div>