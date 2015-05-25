function Project(){

}

Project.prototype = {

	//======================================================================================================================
	// delete function
	delete_project : function(project_id)
	{
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_project/delete_project",
			dataType		: 'json',
			data			: {
				project_id  	: 	project_id,
			},
			success	: function (data, status)
			{
				if(status != "success"){
            		alert("Error happens. The request is not successful. Please try again.").fadeIn();
            	}
            	else
                {
					 if(data.code == 0) 
                    {
                    	if(typeof data.info === 'undefined')
                        {
                            alert('Error happens. The request is undefined. Please try again.').fadeIn();
                        }
                        if(typeof data.info === 'object'){
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                           	alert(output);
                        } 
                        else 
                        {
                           alert("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.");
                        }
                    }
                    // Successfully
                    else 
                    {
                    	$(".recordPROJ[record-id=" + project_id + "]").fadeOut(500, function(){
								$(this).remove();
							});
						location.reload();
                    	//$('#project_list_show').html(data.datahtml)
                    	
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when delete this project. Please try again");
		    },
		});
	},

	//======================================================================================================================
	// Enable function
	enable_project : function(project_id, projElement)
    {
        var projButton = projElement;
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_project/change_status_project",
			dataType		: 'html',
			data			: {
				project_id  	: 	project_id,
				type 			: 	"enable",
			},
			success	: function (data, status)
			{
				if(status != "success"){
            		alert("Error happens. The request is not successful. Please try again.");
            	}
            	else
                {
					 if(data.code == 0) 
                    {
                    	if(typeof data.info === 'undefined')
                        {
                            alert('Error happens. The request is undefined. Please try again.');
                        }
                        if(typeof data.info === 'object'){
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                           	alert(output);
                        } 
                        else 
                        {
                           alert("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.");
                        }
                    }
                    // Successfully
                    else 
                    {
                    	$(".recordPROJ[record-id=" + project_id + "] td:nth-child(9)").html("On");
                        $(projButton).attr("action", "disable");
                        $(projButton).attr("title", "Disable");
                        $(projButton).removeClass("btn btn-gray");
                        $(projButton).addClass("btn btn-navy");
                        $(projButton).html('<i class="icon-lock-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when enable this project. Please try again");
		    },
		});
	},
	
	//======================================================================================================================
	// Disable function
	disable_project : function(project_id, projElement)
    {
        var projButton = projElement;
        $.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_project/change_status_project",
			dataType		: 'json',
			data			: {
				project_id  	: 	project_id,
				type 			: 	"disable",
			},
			success	: function (data, status)
			{
				if(status != "success"){
            		alert("Error happens. The request is not successful. Please try again.");
            	}
            	else
                {
					 if(data.code == 0) 
                    {
                    	if(typeof data.info === 'undefined')
                        {
                            alert('Error happens. The request is undefined. Please try again.');
                        }
                        if(typeof data.info === 'object'){
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                           	alert(output);
                        } 
                        else 
                        {
                           alert("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.");
                        }
                    }
                    // Successfully
                    else 
                    {
                    	$(".recordPROJ[record-id=" + project_id + "] td:nth-child(9)").html("Off");
                        $(projButton).attr("action", "enable");
                        $(projButton).attr("title", "Enable");
                        $(projButton).removeClass("btn btn-navy");
                        $(projButton).addClass("btn btn-gray");
                        $(projButton).html('<i class="icon-lock-open-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when disable this project. Please try again");
		    },
		});
	},

    //======================================================================================================================
    // Create project function
    create_project : function (element) 
    {
        var content = escape(CKEDITOR.instances['ad-project-description'].getData());
        document.getElementById("ad-project-description").innerHTML = content;

        var formData = new FormData(document.getElementById("upload-project-form"));
        // var formValues = $(this).serialize();
        // Check img file before send
        var ifiles = $("#ad-project-avatar")[0].files[0];
        // Create project with avatar
        if (ifiles != null)
        {
            var ifilesName = ifiles.name;
            var ifileType = ifiles.type;
            var ifileSize = ifiles.size;
            if(ifileType == "image/png" || ifileType == "image/jpeg" || ifileType == "image/jpg")
            {
                if(ifileSize <= 5242880)
                {
                    // send data
                    //$.ajaxFileUpload({ // Uncomment to use the second method ^___^
                    $.ajax({
                        type            : 'POST',
                        url             : "index.php/admin_project/create_new_project",
                        secureuri       : false,
                        processData     : false,
                        contentType     : false,
                        cache           : false,
                        fileElementId   : 'ad-project-avatar',
                        dataType        : 'json',
                        /*data          : {
                            "ad_project_title"      :   $('#ad-project-title').val(),
                            "ad_project_brief"      :   $('#ad-project-brief').val(),
                            "ad_project_catalog_id"     :   $('#ad-project-catalog').val(),
                            //"ad_project_description"      :   $('#ad-project-description').val(),
                            "ad_project_description"    :   "Hello Quang Dep trai",
                        },*/
                        data: formData,
                        xhr: function() {  // Custom XMLHttpRequest
                            var myXhr= $.ajaxSettings.xhr();
                            // Check if upload property exists
                            if(myXhr.upload) 
                            {
                                // =========== ON PROGRESS
                                myXhr.upload.addEventListener("progress", function (event) {
                                    console.log(event);
                                    if(event.lengthComputable){
                                        var percent = (event.loaded / event.total) * 100;
                                        document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                                        document.getElementById("progressBar").value = Math.round(percent);
                                    }
                                    else {
                                        document.getElementById("loaded_n_total").innerHTML = "0%";
                                        document.getElementById("progressBar").value = 0;
                                        document.getElementById("status_upload").innerHTML = "Can't compute length of file";
                                    }
                                }, false);

                                // =========== UPLOAD COMPLETED
                                myXhr.addEventListener("load", function (event) {
                                    console.log(event);
                                    var percent = (event.loaded / event.total) * 100;
                                    document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                                    document.getElementById("progressBar").value = Math.round(percent);
                                    document.getElementById("status_upload").innerHTML = "Upload image file OK";
                                }, false);
                                
                                // =========== UPLOAD ERROR
                                myXhr.addEventListener("error", function (event){
                                    console.log(event);
                                    document.getElementById("loaded_n_total").innerHTML = "0%";
                                    document.getElementById("status_upload").innerHTML = "Upload Failed";
                                    document.getElementById("progressBar").value = 0;
                                }, false);

                                // =========== UPLOAD ABORT
                                myXhr.addEventListener("abort", function (event) {
                                    console.log(event);
                                    document.getElementById("loaded_n_total").innerHTML = "0%";
                                    document.getElementById("status_upload").innerHTML = "Upload Aborted";
                                    document.getElementById("progressBar").value = 0;
                                }, false);
                            }
                            return myXhr;
                        },
                        success : function (data, status)
                        {

                            var dom = $('#project_danger');
                            if(status != "success"){
                                dom.html("Error happens. The request is not successful. Please try again.").fadeIn();
                            }
                            else
                            {
                                if(data.code == 0) 
                                {
                                    if(typeof data.info === 'undefined')
                                    {
                                        dom.html('Error happens. The request is undefined. Please try again.').fadeIn();
                                    }
                                    if(typeof data.info === 'object')
                                    {
                                        var output = '<ul>';
                                        // Loop
                                        for (var key in data.info){

                                         output += '<li>' + data.info[key]  + '</li>';
                                        }
                                        output += '</ul>';
                                        dom.html(output).fadeIn();  
                                    } 
                                    else 
                                    {
                                        dom.html("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.").fadeIn();  
                                    }
                                }
                                // Successfully
                                else {
                                    dom.html(data.info).fadeIn();
                                    setTimeout(function(){ 
                                        document.getElementById("loaded_n_total").innerHTML = "";
                                        document.getElementById("progressBar").value = 0;
                                        document.getElementById("status_upload").innerHTML = "";
                                    }, 2000);
                                    $('#project-loading-div').hide();
                                }
                            }
                        },
                        error: function() {
                          alert("Something went wrong when create new project. Please try again");
                        },
                    });
                    return false;
                }
                else {
                    document.getElementById("project_danger").innerHTML="Image size is larger than 5MB. Please try again";
                }
            }
            else{
                document.getElementById("project_danger").innerHTML="Only allow image type: jpg, jpeg, png. Please try again";
            }
        }
        // Create project without avatar
        else
        {
            $.ajax({
                type            : 'POST',
                url             : "index.php/admin_project/create_project",
                dataType        : 'json',
                data            : {
                    ad_project_id               :   $('#ad-project-id').val(),
                    ad_project_title            :   $('#ad-project-title').val(),
                    ad_project_brief            :   $('#ad-project-brief').val(),
                    ad_project_catalog_id       :   $('#ad-project-catalog').val(),
                    ad_project_description      :   content,
                },
                success : function (data, status)
                {
                    var dom = $('#project_danger');
                    if(status != "success"){
                        dom.html("Error happens. The request is not successful. Please try again.").fadeIn();
                    }
                    else
                    {
                        if(data.code == 0) 
                        {
                            if(typeof data.info === 'undefined')
                            {
                                dom.html('Error happens. The request is undefined. Please try again.').fadeIn();
                            }
                            if(typeof data.info === 'object')
                            {
                                var output = '<ul>';
                                // Loop
                                for (var key in data.info){

                                 output += '<li>' + data.info[key]  + '</li>';
                                }
                                output += '</ul>';
                                dom.html(output).fadeIn();  
                            } 
                            else 
                            {
                                dom.html("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.").fadeIn();  
                            }
                        }
                        // Successfully
                        else {
                            var percent = 100;
                            document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                            document.getElementById("progressBar").value = Math.round(percent);
                            document.getElementById("status_upload").innerHTML = "Update without avatar OK";

                            dom.html(data.info).fadeIn();

                            setTimeout(function(){ 
                                document.getElementById("loaded_n_total").innerHTML = "";
                                document.getElementById("progressBar").value = 0;
                                document.getElementById("status_upload").innerHTML = "";
                            }, 2000);
                            $('#project-loading-div').hide();
                        }
                    }
                },
                error: function() {
                  alert("Something went wrong when update this project. Please try again");
                },
            });
            return false;
        }       
    },

    //======================================================================================================================
    // Update project without avatar function
    update_project_without_avatar : function (element)
    {
        var content = escape(CKEDITOR.instances['ad-project-description'].getData());
        document.getElementById("ad-project-description").innerHTML = content;
         
        $.ajax({
            type            : 'POST',
            url             : "index.php/admin_project/update_project",
            dataType        : 'json',
            data            : {
                ad_project_id               :   $('#ad-project-id').val(),
                ad_project_title            :   $('#ad-project-title').val(),
                ad_project_brief            :   $('#ad-project-brief').val(),
                ad_project_catalog_id       :   $('#ad-project-catalog').val(),
                ad_project_description      :   content,
            },
            success : function (data, status)
            {
                var dom = $('#project_danger');
                if(status != "success"){
                    dom.html("Error happens. The request is not successful. Please try again.").fadeIn();
                }
                else
                {
                    if(data.code == 0) 
                    {
                        if(typeof data.info === 'undefined')
                        {
                            dom.html('Error happens. The request is undefined. Please try again.').fadeIn();
                        }
                        if(typeof data.info === 'object')
                        {
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                            dom.html(output).fadeIn();  
                        } 
                        else 
                        {
                            dom.html("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.").fadeIn();  
                        }
                    }
                    // Successfully
                    else {
                        var percent = 100;
                        document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                        document.getElementById("progressBar").value = Math.round(percent);
                        document.getElementById("status_upload").innerHTML = "Update without avatar OK";

                        dom.html(data.info).fadeIn();

                        setTimeout(function(){ 
                            document.getElementById("loaded_n_total").innerHTML = "";
                            document.getElementById("progressBar").value = 0;
                            document.getElementById("status_upload").innerHTML = "";
                        }, 2000);
                        $('#project-loading-div').hide();
                    }
                }
            },
            error: function() {
              alert("Something went wrong when update this project. Please try again");
            },
        });
        return false;
    },

    //======================================================================================================================
    // update project with avatar function
    update_project_with_avatar: function (element) 
    {
        var content = escape(CKEDITOR.instances['ad-project-description'].getData());
        document.getElementById("ad-project-description").innerHTML = content;

        var formData = new FormData(document.getElementById("upload-project-form"));

        $.ajax({
            type            : 'POST',
            url             : "index.php/admin_project/update_project_with_avatar",
            secureuri       : false,
            processData     : false,
            contentType     : false,
            cache           : false,
            fileElementId   : 'ad-project-avatar',
            dataType        : 'json',
            data: formData,
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr= $.ajaxSettings.xhr();
                // Check if upload property exists
                if(myXhr.upload) 
                {
                    // =========== ON PROGRESS
                    myXhr.upload.addEventListener("progress", function (event) {
                        console.log(event);
                        if(event.lengthComputable){
                            var percent = (event.loaded / event.total) * 100;
                            document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                            document.getElementById("progressBar").value = Math.round(percent);
                        }
                        else {
                            document.getElementById("loaded_n_total").innerHTML = "0%";
                            document.getElementById("progressBar").value = 0;
                            document.getElementById("status_upload").innerHTML = "Can't compute length of file";
                        }
                    }, false);

                    // =========== UPLOAD COMPLETED
                    myXhr.addEventListener("load", function (event) {
                        console.log(event);
                        var percent = (event.loaded / event.total) * 100;
                        document.getElementById("loaded_n_total").innerHTML = Math.round(percent) + "%";
                        document.getElementById("progressBar").value = Math.round(percent);
                        document.getElementById("status_upload").innerHTML = "Upload image file OK";
                    }, false);
                    
                    // =========== UPLOAD ERROR
                    myXhr.addEventListener("error", function (event){
                        console.log(event);
                        document.getElementById("loaded_n_total").innerHTML = "0%";
                        document.getElementById("status_upload").innerHTML = "Upload Failed";
                        document.getElementById("progressBar").value = 0;
                    }, false);

                    // =========== UPLOAD ABORT
                    myXhr.addEventListener("abort", function (event) {
                        console.log(event);
                        document.getElementById("loaded_n_total").innerHTML = "0%";
                        document.getElementById("status_upload").innerHTML = "Upload Aborted";
                        document.getElementById("progressBar").value = 0;
                    }, false);
                }
                return myXhr;
            },
            success : function (data, status)
            {
                var dom = $('#project_danger');
                if(status != "success"){
                    dom.html("Error happens. The request is not successful. Please try again.").fadeIn();
                }
                else
                {
                    if(data.code == 0) 
                    {
                        if(typeof data.info === 'undefined')
                        {
                            dom.html('Error happens. The request is undefined. Please try again.').fadeIn();
                        }
                        if(typeof data.info === 'object')
                        {
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                            dom.html(output).fadeIn();  
                        } 
                        else 
                        {
                            dom.html("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.").fadeIn();  
                        }
                    }
                    // Successfully
                    else {
                        dom.html(data.info).fadeIn();
                        setTimeout(function(){ 
                            document.getElementById("loaded_n_total").innerHTML = "";
                            document.getElementById("progressBar").value = 0;
                            document.getElementById("status_upload").innerHTML = "";
                        }, 2000);
                        $('#project-loading-div').hide();
                    }
                }
            },
            error: function() {
              alert("Something went wrong when update this project. Please try again");
            },
        });
        return false;
    },
};

project_instance = new Project();