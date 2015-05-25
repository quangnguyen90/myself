/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	var  baseURL = window.location.origin+"/quangnguyen/"; // ---> http://localhost/quangnguyen
	config.baseHref = baseUrlQ+'userfiles/';

	/* Filebrowser routes */
  	// The location of an external file browser, that should be launched when "Browse Server" button is pressed.
	config.filebrowserBrowseUrl     = baseUrlQ+'assets/js/ckfinder/ckfinder.html';
	
	// The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Link tab of Image dialog.
  	//config.filebrowserImageBrowseLinkUrl = "/ckeditor/pictures";

  	// The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Image dialog.
	config.filebrowserImageBrowseUrl  = baseUrlQ+'assets/js/ckfinder/ckfinder.html?type=Images';
	
	// The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Flash dialog.
  	config.filebrowserFlashBrowseUrl  = baseUrlQ+'assets/js/ckfinder/ckfinder.html?type=Flash';
	
	// The location of a script that handles file uploads.
 	config.filebrowserUploadUrl     = baseUrlQ+'assets/js/core/connector/php/connector.php?command=QuickUpload&type=Files';
	
	// The location of a script that handles file uploads in the Image dialog.
  	config.filebrowserImageUploadUrl  = baseUrlQ+'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	
	// The location of a script that handles file uploads in the Flash dialog.
  	config.filebrowserFlashUploadUrl  = baseUrlQ+'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

  	  // Rails CSRF token
	  // config.filebrowserParams = function(){
	  //   var csrf_token, csrf_param, meta,
	  //       metas = document.getElementsByTagName('meta'),
	  //       params = new Object();

	  //   for ( var i = 0 ; i < metas.length ; i++ ){
	  //     meta = metas[i];

	  //     switch(meta.name) {
	  //       case "csrf-token":
	  //         csrf_token = meta.content;
	  //         break;
	  //       case "csrf-param":
	  //         csrf_param = meta.content;
	  //         break;
	  //       default:
	  //         continue;
	  //     }
	  //   }

	  //   if (csrf_param !== undefined && csrf_token !== undefined) {
	  //     params[csrf_param] = csrf_token;
	  //   }

	  //   return params;
	  // };

	  // config.addQueryString = function( url, params ){
	  //   var queryString = [];

	  //   if ( !params ) {
	  //     return url;
	  //   } else {
	  //     for ( var i in params )
	  //       queryString.push( i + "=" + encodeURIComponent( params[ i ] ) );
	  //   }

	  //   return url + ( ( url.indexOf( "?" ) != -1 ) ? "&" : "?" ) + queryString.join( "&" );
	  // };

	  // // Integrate Rails CSRF token into file upload dialogs (link, image, attachment and flash)
	  // CKEDITOR.on( 'dialogDefinition', function( ev ){
	  //   // Take the dialog name and its definition from the event data.
	  //   var dialogName = ev.data.name;
	  //   var dialogDefinition = ev.data.definition;
	  //   var content, upload;

	  //   if (CKEDITOR.tools.indexOf(['link', 'image', 'attachment', 'flash'], dialogName) > -1) {
	  //     content = (dialogDefinition.getContents('Upload') || dialogDefinition.getContents('upload'));
	  //     upload = (content == null ? null : content.get('upload'));

	  //     if (upload && upload.filebrowser && upload.filebrowser['params'] === undefined) {
	  //       upload.filebrowser['params'] = config.filebrowserParams();
	  //       upload.action = config.addQueryString(upload.action, upload.filebrowser['params']);
	  //     }
	  //   }
	  // });

};
