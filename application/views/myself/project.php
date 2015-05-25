<!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<div class="section-head">
  <div class="container">
    <h1>Projects</h1>
  </div>
  <!-- /.container --> 
</div>
{if (isset($code_project) AND $code_project == 1) }
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <p class="lead">Some info about my projects that I have joined</p>
    <div class="divide30"></div>
    <ul class="filter">
      <li><a class="active" href="#" data-filter="*">All</a></li>
      {foreach from=$project_category_list item=value }
        <li><a href="#" data-filter=".{$value->category_id}">{$value->category_title}</a></li>
      {/foreach}
    </ul>
    <!-- /.filter -->
    
    <ul class="items thumbs">
    {foreach from=$project_list item=value}
      <li class="item thumb {$value->category_id}"> 
        <a href="index.php/home/view_project_detail/{$value->id}" title="{$value->title}">
        <div class="overlay">
          <div class="info">
            <h4>{$value->title}</h4>
            <span>{$value->brief}</span> </div>
          <!-- /.info --> 
        </div>
        <!-- /.overlay --> 
        <img src="{if ($value->avatar_name != null && $value->avatar_name != "") } {$baseURL}userfiles/project/{$value->avatar_name}  {else} assets/style/images/art/nofound.jpg {/if}" alt="" />
        </a>
        <br> <h5>{$value->title}</h5><br> 
      </li>
    {/foreach}
      <!-- /.item -->
    </ul>
    <!--/.items--> 
  </div>
  <!--/.inner--> 
  <div class="text-center"> <a href="index.php/home/view_project_list" class="btn btn-blue"><i class="icon-layout"></i> View more</a> </div>
  
</div>
{else}
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No PROJECTS Posted</h3>
      <br>
    </div>
  </center>
{/if}
<!--/#lightbox-->
<!--END /#projects-->