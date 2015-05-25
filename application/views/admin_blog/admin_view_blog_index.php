<div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Blog Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
						<a  href="index.php/admin_blog/show_form_to_create_blog" class="btn btn-blue" id="create_blog_button"> <i class="icon-plus-sign"></i>New Blog</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-blog-text" class="form-control"  value="{$keyword}" placeholder="Search blog">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Blog List</legend>
		  	<div class="row">
		  		<div class="span12" id ="blog_list_show">
		  			{include file="admin_blog/admin_view_list_blog_form.php"}
		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
<!-- /.container --> 
