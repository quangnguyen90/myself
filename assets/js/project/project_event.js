$(function() {	
	//======================================================================================================================
	// Clean all character after create new project
	$("body").on('click','#ad-project-clean',function(){
		document.getElementById('ad-project-title').value = '';
		document.getElementById('ad-project-brief').value = '';
		document.getElementById('ad-project-catalog').value = '';
		document.getElementById('ad-project-catalog').selectedIndex = 0;
		document.getElementById('ad-project-description').value = '';
		document.getElementById('project_danger').innerHTML="";
		no_found_image();
	});
	
	//======================================================================================================================
	// Show project image after choose image
	function no_found_image()
	{
		$('#ad-project-img')
			            	.attr('src', 'assets/style/images/art/nofound.jpg')
			             	.width(400)
		                    .height(300);
		document.getElementById("ad-project-avatar").value = "";
	}

    function readURL(input) 
    {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        var mimeType=input.files[0].type; // You can get the mime type
			var mimeSize=input.files[0].size;

			if (mimeType == "image/jpeg" || mimeType == "image/jpg" || mimeType == "image/png") {
				if(mimeSize <= 5242880)
				{
					reader.onload = function (e) {
						$('#ad-project-img')
						            	.attr('src', e.target.result)
						             	.width(400)
					                    .height(300);
					}

        			reader.readAsDataURL(input.files[0]);
				}
				else {
					alert("Please choose image with size <= 5MB");
					no_found_image();
				}
			}
			else {
				alert("Only allow image type: jpg, jpeg, png");
				no_found_image();
			}
	        
	    }
    }
    
    $("#ad-project-avatar").change(function(){
        readURL(this);
    });
    
    //======================================================================================================================
	// Create/Update new project
	$('#upload-project-form').submit(function(e) {
		e.preventDefault(); //Avoid that the event 'submit' continues
		var URL = document.URL;
		$('#project-loading-div').show();
		//====================================================================================
		// Create new project
		if(URL.indexOf("show_form_to_create_project") > -1) {
			project_instance.create_project();
		}
		//====================================================================================
		// update the project
		else if (URL.indexOf("view_detail_project") >-1) {
			// Check img file before send
			var ifiles = $("#ad-project-avatar")[0].files[0];

			// Update project with avatar
			if (ifiles != null)
			{
				var ifilesName = ifiles.name;
				var ifileType = ifiles.type;
				var ifileSize = ifiles.size;
				if(ifileType == "image/png" || ifileType == "image/jpeg" || ifileType == "image/jpg")
				{
					if(ifileSize <= 5242880)
					{
						project_instance.update_project_with_avatar();
					}
					else 
					{
						document.getElementById("project_danger").innerHTML="Image size is larger than 5MB. Please try again";
					}
				}
				else{
					document.getElementById("project_danger").innerHTML="Only allow image type: jpg, jpeg, png. Please try again";
				}
			}
			// update project without avatar
			else
			{
				project_instance.update_project_without_avatar();
			}
		}
		//====================================================================================
		// show error
		else{
			//show_404();
		}
	});
		
	//======================================================================================================================
	// Delete project
	$("body").on('click','.remove_proj_button',function(e){
	//$(".remove_proj_button").click(function(e){
	//$(".remove_proj_button").live("click",function(){  
		e.preventDefault();
     	var project_id = $(this).attr("id");
     	var project_name = $(this).attr("name");

     	var del_confirm = confirm("Are you sure you  want to delete this project: "+ project_id+" - "+project_name +" ?");
    	if (del_confirm) {
    		project_instance.delete_project(project_id);
    	};
    });  

    //======================================================================================================================
	// Enable/Diable project
    $("body").on('click','.ed_proj_button',function(e){
		e.preventDefault();
		var action = $(this).attr("action");
     	if(action == "enable") {
     		project_instance.enable_project($(this).attr("id"), $(this));
     	}
     	else{
     		project_instance.disable_project($(this).attr("id"), $(this));
     	}
    });
     //======================================================================================================================
	// Search project
	$.extend($.expr[':'], 
	    {
	    	'containsi': function(elem, i, match, array) {
	        	return (elem.textContent || elem.innerText || '').toLowerCase()
	                .indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	});

	$('#search-project-text').keyup(function() {
	    var query = $(this).val();
	    $("div#projectList-container")
            .hide()
            .filter(':containsi("' + query + '")')
            .show();
	});
	//======================================================================================================================			//count status length
	// count project brief
	$("#ad-project-brief").keyup(function(){
		var len = $(this).val().length;
		$("#count-ad-project-brief-content").text(len + "/500");
	});
})