<div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Project Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
						<a  href="index.php/admin_project/show_form_to_create_project" class="btn btn-blue" id="create_project_button"> <i class="icon-plus-sign"></i>New Project</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-project-text" class="form-control"  value="{$keyword}" placeholder="Search project">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Project List</legend>
		  	<div class="row">
		  		<div class="span12" id ="project_list_show">
		  			{include file="admin_project/admin_view_list_project_form.php"}
		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
<!-- /.container --> 
