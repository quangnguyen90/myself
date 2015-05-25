//Constructor
function Category(){
	this.base_url = window.location.origin+"/quangnguyen/";
    // This article:
    // http://stackoverflow.com/questions/21246818/how-to-get-the-base-url-in-javascript

    //var base_url = window.location.origin;
    // "http://stackoverflow.com"

    //var host = window.location.host;
    // stackoverflow.com

    //var pathArray = window.location.pathname.split( '/' );
    // ["", "questions", "21246818", "how-to-get-the-base-url-in-javascript"]

}

//function
Category.prototype = {
	// Create new category
	create_category : function()
	{
		// send data
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_category/create_new_category",
			dataType		: 'json',
			data			: {
				category_title 			: 	$('#ad-category-title').val(),
		    	category_description  	: 	$('#ad-category-description').val(),
		    	category_for 			: 	$('#ad-category-for').val(),
		    },
			success	: function (data, status)
			{
				var dom = $('#category_danger');
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
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when create new category. Please try again");
		    },
		});
		return false;
	},

	//======================================================================================================================
	// delete function
	delete_category : function(category_id)
	{
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_category/delete_category",
			dataType		: 'json',
			data			: {
				category_id  	: 	category_id,
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
                    	$(".recordCATEGORY[record-id=" + category_id + "]").fadeOut(500, function(){
								$(this).remove();
							});
                    	location.reload();
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when delete this category. Please try again");
		    },
		});
	},

	//======================================================================================================================
	// Enable function
	enable_category : function(category_id, categoryElement)
	{
        var categoryButton = categoryElement;
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_category/change_status_category",
			dataType		: 'html',
			data			: {
				category_id  	: 	category_id,
				type 			: 	"enable",
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
                    	$(".recordCATEGORY[record-id=" + category_id + "] td:nth-child(6)").html("On");
                        $(categoryButton).attr("action", "disable");
                        $(categoryButton).attr("title", "Disable");
                        $(categoryButton).removeClass("btn btn-gray");
                        $(categoryButton).addClass("btn btn-navy");
                        $(categoryButton).html('<i class="icon-lock-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when enable this category. Please try again");
		    },
		});
	}, 

	//======================================================================================================================
	// Disable function
	disable_category : function(category_id, categoryElement)
    {
        var categoryButton = categoryElement;
		$.ajax({
			type 			: 'POST',
			url 			: "index.php/admin_category/change_status_category",
			dataType		: 'json',
			data			: {
				category_id  	: 	category_id,
				type 			: 	"disable",
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
                    	$(".recordCATEGORY[record-id=" + category_id + "] td:nth-child(6)").html("Off");
                        $(categoryButton).attr("action", "enable");
                        $(categoryButton).attr("title", "Enable");
                        $(categoryButton).removeClass("btn btn-navy");
                        $(categoryButton).addClass("btn btn-gray");
                        $(categoryButton).html('<i class="icon-lock-open-1"></i>');
                    }
                }
			},
			error: function() {
		      alert("Something went wrong when disable this category. Please try again");
		    },
		});
	},

    //======================================================================================================================
    // update category function
    update_category : function(category_id)
    {
        $.ajax({
            type            : 'POST',
            url             : "index.php/admin_category/update_category",
            dataType        : 'json',
            data            : {
                category_id             :   $('#ad-category-id').val(),
                category_title          :   $('#ad-category-title').val(),
                category_description    :   $('#ad-category-description').val(),
                category_for            :   $('#ad-category-for').val(),
            },
            success : function (data, status)
            {
                var dom = $('#category_danger');
                if(status != "success"){
                    alert("Error happens. The request is not successful. Please try again.").fadeIn();
                }
                else
                {
                     if(data.code == 0) 
                    {
                        if(typeof data.info === 'undefined')
                        {
                           dom.html("Error happens. The request is not successful. Please try again.").fadeIn();
                        }
                        if(typeof data.info === 'object'){
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
                    else 
                    {
                        dom.html(data.info).fadeIn();
                    }
                }
            },
            error: function() {
              alert("Something went wrong when update this category. Please try again");
            },
        });
    },

};	

//Instance
category_instance = new Category();