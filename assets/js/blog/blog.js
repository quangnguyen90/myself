function Blog(){
   
}

Blog.prototype = {

	//======================================================================================================================
	// delete blog function
	delete_blog : function(blog_id)
	{
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_blog/delete_blog",
			dataType		: 'json',
			data			: {
				blog_id  	: 	blog_id,
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
                    	$(".recordBLOG[record-id=" + blog_id + "]").fadeOut(500, function(){
								$(this).remove();
							});
                    	location.reload();
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when delete this blog. Please try again");
		    },
		});
	},

	//======================================================================================================================
	// Enable blog function
	enable_blog : function(blog_id, blogElement)
    {
        var blogButton = blogElement;
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_blog/change_status_blog",
			dataType		: 'html',
			data			: {
				blog_id  	: 	blog_id,
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
                    	$(".recordBLOG[record-id=" + blog_id + "] td:nth-child(9)").html("On");
                    	$(blogButton).attr("action", "disable");
                        $(blogButton).attr("title", "Disable");
                        $(blogButton).removeClass("btn btn-gray");
                        $(blogButton).addClass("btn btn-navy");
                        $(blogButton).html('<i class="icon-lock-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when enable this blog. Please try again");
		    },
		});
	},

	//======================================================================================================================
	// Disable blog function
	disable_blog : function(blog_id, blogElement)
    {
        var blogButton = blogElement;
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_blog/change_status_blog",
			dataType		: 'json',
			data			: {
				blog_id  	: 	blog_id,
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
                    	$(".recordBLOG[record-id=" + blog_id + "] td:nth-child(9)").html("Off");
                        $(blogButton).attr("action", "enable");
                        $(blogButton).attr("title", "Enable");
                        $(blogButton).removeClass("btn btn-navy");
                        $(blogButton).addClass("btn btn-gray");
                        $(blogButton).html('<i class="icon-lock-open-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when disable this blog. Please try again");
		    },
		});
	},

    //======================================================================================================================
    // Create blog function
    create_blog : function (element) 
    {
        var content = escape(CKEDITOR.instances['ad-blog-description'].getData());
        document.getElementById("ad-blog-description").innerHTML = content;

        var formData = new FormData(document.getElementById("upload-blog-form"));
        // Check img file before send
        var ifiles = $("#ad-blog-avatar")[0].files[0];
        // Create new blog with avatar
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
                        url             : "index.php/admin_blog/create_new_blog",
                        secureuri       : false,
                        processData     : false,
                        contentType     : false,
                        cache           : false,
                        fileElementId   : 'ad-blog-avatar',
                        dataType        : 'json',
                        /*data          : {
                            "ad_blog_title"         :   $('#ad-blog-title').val(),
                            "ad_blog_brief"         :   $('#ad-blog-brief').val(),
                            "ad_blog_catalog_id"    :   $('#ad-blog-catalog').val(),
                            //"ad_blog_description"     :   $('#ad-blog-description').val(),
                            "ad_blog_description"   :   "Hello Quang Dep trai",
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
                            var dom = $('#blog_danger');
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
                                    $('#blog-loading-div').hide();
                                }
                            }
                        },
                        error: function() {
                          alert("Something went wrong when create new blog. Please try again");
                        },
                    });
                    return false;
                }
                else {
                    document.getElementById("blog_danger").innerHTML="Image size is larger than 5MB. Please try again";
                }
            }
            else{
                document.getElementById("blog_danger").innerHTML="Only allow image type: jpg, jpeg, png. Please try again";
            }
        }
        // Create blog without avatar
        else
        {
            $.ajax({
                type            : 'POST',
                url             : "index.php/admin_blog/create_blog",
                dataType        : 'json',
                data            : {
                    ad_blog_id              :   $('#ad-blog-id').val(),
                    ad_blog_title           :   $('#ad-blog-title').val(),
                    ad_blog_brief           :   $('#ad-blog-brief').val(),
                    ad_blog_catalog_id      :   $('#ad-blog-catalog').val(),
                    ad_blog_description     :   content,
                },
                success : function (data, status)
                {
                    var dom = $('#blog_danger');
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
                            document.getElementById("status_upload").innerHTML = "Create new blog without avatar OK";
                            dom.html(data.info).fadeIn();
                            setTimeout(function(){ 
                                document.getElementById("loaded_n_total").innerHTML = "";
                                document.getElementById("progressBar").value = 0;
                                document.getElementById("status_upload").innerHTML = "";
                            }, 2000);
                            $('#blog-loading-div').hide();
                        }
                    }
                },
                error: function() {
                  alert("Something went wrong when create blog. Please try again");
                },
            });
            return false;
        }
    },

    //======================================================================================================================
    // Update blog without avatar function
    update_blog_without_avatar : function (element) { 
        var content = escape(CKEDITOR.instances['ad-blog-description'].getData());
        document.getElementById("ad-blog-description").innerHTML = content;

        $.ajax({
            type            : 'POST',
            url             : "index.php/admin_blog/update_blog",
            dataType        : 'json',
            data            : {
                ad_blog_id              :   $('#ad-blog-id').val(),
                ad_blog_title           :   $('#ad-blog-title').val(),
                ad_blog_brief           :   $('#ad-blog-brief').val(),
                ad_blog_catalog_id      :   $('#ad-blog-catalog').val(),
                ad_blog_description     :   content,
            },
            success : function (data, status)
            {
                var dom = $('#blog_danger');
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
                        $('#blog-loading-div').hide();
                    }
                }
            },
            error: function() {
              alert("Something went wrong when create new blog. Please try again");
            },
        });
        return false;
    },

    //======================================================================================================================
    // update blog with avatar function
    update_blog_with_avatar: function (element) 
    {
        var content = escape(CKEDITOR.instances['ad-blog-description'].getData());
        document.getElementById("ad-blog-description").innerHTML = content;

        var formData = new FormData(document.getElementById("upload-blog-form"));

        $.ajax({
            type            : 'POST',
            url             : "index.php/admin_blog/update_blog_with_avatar",
            secureuri       : false,
            processData     : false,
            contentType     : false,
            cache           : false,
            fileElementId   : 'ad-blog-avatar',
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
                var dom = $('#blog_danger');
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
                        $('#blog-loading-div').hide();
                    }
                }
            },
            error: function() {
              alert("Something went wrong when create new blog. Please try again");
            },
        });
        return false;
    },

};

blog_instance = new Blog();