$(function() {
	//======================================================================================================================
	function refesh_category_info(){
		document.getElementById('ad-category-id').value = '';
		document.getElementById('ad-category-title').value = '';
		document.getElementById('ad-category-for').selectedIndex = 0;
		document.getElementById('ad-category-description').value = '';
		document.getElementById('category_danger').innerHTML="";
		document.getElementById('myCategoryModalLabel').innerHTML ="";
	}

	// Clean all character after create new category
	$("body").on('click','#ad-category-clean',function(){
		refesh_category_info();
	});
    
    //======================================================================================================================
	//Create category
    $("body").on('click','#create_category_button',function(e){
    	refesh_category_info();
		document.getElementById('myCategoryModalLabel').innerHTML ="Category Description - Create new Category";
		document.getElementById('category_danger').innerHTML ="";
		
	});

	$("body").on('click','#ad-category-close', function(e){
		window.location.href =  baseUrlQ+ "index.php/admin_category/view_category_list";
		//location.reload();
	});

	$("body").on('click','#ad-category-ok',function(e){
		e.preventDefault();
     	category_instance.create_category();
    });  
	
	//======================================================================================================================
	// Delete category
	$("body").on('click','.remove_category_button',function(e){
		e.preventDefault();
     	var category_id = $(this).attr("id");
     	var category_name = $(this).attr("name");

     	var del_confirm = confirm("Are you sure you  want to delete this category: "+ category_id+" - "+category_name +" ?");
    	if (del_confirm) {
    		category_instance.delete_category(category_id);
    	};
    });  
	
	//======================================================================================================================
	// Enable/Disable category
    $("body").on('click','.ed_cat_button',function(e){
		e.preventDefault();
		var action = $(this).attr("action");
     	if(action == "enable") {
     		category_instance.enable_category($(this).attr("id"), $(this));
     	}
     	else{
     		category_instance.disable_category($(this).attr("id"), $(this));
     	}
    }); 
    //======================================================================================================================
	// Update category functions
	// View detail category
	$("body").on('click','.edit_category_button',function(e){
		e.preventDefault();

     	$('#upload-category-form').modal('show');
     	refesh_category_info();

     	document.getElementById('myCategoryModalLabel').innerHTML = "Category Information";
     	$('#ad-category-id').val($(this).attr('categoryid'));
     	$('#ad-category-title').val($(this).attr('categoryname'));
     	$('#ad-category-description').val($(this).attr('categorydescription'));
     	
     	if($(this).attr('categorytype') == 'p') 
     	{
     		document.getElementById('ad-category-for').selectedIndex = 0;
    	}
    	else{
    		document.getElementById('ad-category-for').selectedIndex = 1;
    	}

     	$('#ad-category-ok').addClass('hide');
     	$('#ad-category-update').removeClass('hide');

     	$('#ad-category-close').addClass('hide');
     	$('#ad-category-update-close').removeClass('hide');
    }); 

	// Update
	$("body").on('click','#ad-category-update',function(e){
		e.preventDefault();
		category_instance.update_category();
    }); 

	//Close after update
    $("body").on('click','#ad-category-update-close',function(e){
		e.preventDefault();
		location.reload();
    }); 

    //======================================================================================================================
	// Search category
	$.extend($.expr[':'], 
	    {
	    	'containsi': function(elem, i, match, array) {
	        	return (elem.textContent || elem.innerText || '').toLowerCase()
	                .indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	});

	$('#search-category-text').keyup(function() {
	    var query = $(this).val();
	    $("div#categoryList-container")
            .hide()
            .filter(':containsi("' + query + '")')
            .show();
	});
	//======================================================================================================================			//count status length
	// count Category descripton
	$("#ad-category-description").keyup(function(){
		var len = $(this).val().length;
		$("#count-ad-category-description-content").text(len + "/500");
	});

})