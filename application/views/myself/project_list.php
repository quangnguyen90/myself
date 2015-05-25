<!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<div class="light-wrapper offset">
<div class="section-head">
  <div class="container">
    <h1>Projects list</h1>
  </div>
  <!-- /.container --> 
</div>

{if (isset($code_project) AND $code_project == 1) }
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <legend> <a href="index.php/home/view_project_list" style="color:black;">All my project(s)</a> ({$total_rows})</legend>
    <p class="lead">Just click "Load more" button to see more project...</p>
    <div class="divide30"></div>
    <ul class="filter">
      <li><a class="active" href="#" data-filter="*">All</a></li>
      {foreach from=$project_category_list item=value }
        <li><a href="#" data-filter=".{$value->category_id}">{$value->category_title}</a></li>
      {/foreach}
    </ul>
    <!-- /.filter -->
    
    <ul class="items thumbs" id="frontend_project_list">
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
    <div class="text-center"> <a href="javascript:void(0)" class="load_more_project_list_button btn btn-blue"><i class="icon-layout"></i> Load more</a> </div>
  
  </div>
  <!--/.inner-->   
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
</div>
<!--/#lightbox-->
<!--END /#projects-->