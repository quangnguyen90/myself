<div class="light-wrapper offset">
  <div class="section-head">
    <div class="container">
      <h1>Blog brief</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="container inner">
    <div class="row classic-blog">
      {if (isset($code_blog_detail) && $code_blog_detail == 1) }
      <div class="span8 content wide">
        <div class="post">
          <h1 class="post-title">{$blog_detail.blog_title}</h1>
          {if isset($blog_detail) AND ($blog_detail.blog_avatar_name != null && $blog_detail.blog_avatar_name != "") }
            <figure class="overlay"><img src="{$baseURL}userfiles/blog/{$blog_detail.blog_avatar_name}" alt=""/></figure>
          {/if}
          <div class="meta">
            <div class="pull-right">
              <div class="date">{$blog_detail.blog_date|truncate:10:""}</div>
              <div class="sep">|</div>
              <div class="categories"><a href="#">{$blog_detail.category_title}</a></div>
            </div>
          </div>
          
          <p><b>{$blog_detail.blog_brief}</b></p>
          <p>{$blog_detail.blog_description}</p>
        </div>
        <!--/.post-->
        
        <hr />
        <div id="comments">
          <h3 class="section-title">Comments</h3>
          <div class="fb-like" data-href="{$baseURL}index.php/home/view_blog_brief" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          <div class="fb-comments" data-href="{$baseURL}index.php/home/view_blog_brief" data-numposts="5" data-colorscheme="light"></div>
        </div>
        <!-- /#comments -->
        
        <hr />
        <!-- /.comment-form-wrapper --> 
        
      </div>
      {else}
        <center>
          <div class='jumbotron'>
            <br>
              <h3>No Blog Found</h3>
            <br>
          </div>
        </center>
      {/if}
      <!--/.span8 -->
      
      <aside class="span4 sidebar lp30">
        <div class="sidebox widget">
          <h3>Top newest blogs</h3>
          <ul class="post-list">
            {foreach from=$blog_list key=no item=value }
            <li>
              <!-- <figure class="overlay"> <a href="blog-post.html"><img src="assets/style/images/art/a1.jpg" alt="" />
                <div></div>
                </a> </figure>
              <div class="meta"> -->
              <h6><a href="index.php/home/view_blog_detail/{$value->blog_id}"><img src="assets/style/images/favicon.png" alt="" /> <em>{$no+1} - </em>{$value->blog_title}</a></h6>
              <!-- </div>-->
            </li>
            {/foreach}
          </ul>
          <a href="index.php/home/view_blog_list"> <i class="icon-right-hand"></i> View all blog</a>
          <!-- /.post-list --> 
        </div>
        <!-- <div class="sidebox widget">
          <h3>Categories</h3>
          <ul class="bullet">
            <li><a href="#">Web Design (21)</a></li>
            <li><a href="#">Photography (19)</a></li>
            <li><a href="#">Graphic Design (16)</a></li>
            <li><a href="#">Manipulation (15)</a></li>
            <li><a href="#">Motion Graphics (12)</a></li>
          </ul>
        </div> -->
      </aside>
      <!-- /.span4 .sidebar --> 
    </div>
    <!--/.row--> 
  </div>
  <!-- /.container --> 
</div>