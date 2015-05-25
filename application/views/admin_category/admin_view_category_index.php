<div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Category Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
		      			<!-- Uncomment if don't want to show dialog  -->
						<!-- <a  href="index.php/admin_category/show_form_to_create_category" class="btn btn-blue" id="create_category_button"> <i class="icon-plus-sign"></i>New category</a> -->
		      			<a href="#upload-category-form" class="btn btn-blue" data-toggle="modal" id="create_category_button"> <i class="icon-plus-sign"></i>New category</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-category-text" class="form-control"  value="{$keyword}" placeholder="Search category">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Category List</legend>
		  	<div class="row">
		  		<div class="span12" id ="category_list_show">
		  			{include file="admin_category/admin_view_list_category_form.php"}
		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
{include file="admin_category/admin_view_describe_category_form.php"}
<!-- /.container --> 
