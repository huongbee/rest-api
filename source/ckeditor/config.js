/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.uiColor = '#cfd1cf';
	config.toolbar_Basic =
	[
	    [ 'Source', '-', 'Bold', 'Italic','Underline', 'Image', 'FontSize', 'Format' ]
	];
	config.toolbar = 'Basic';

	config.filebrowserBrowseUrl='source/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl='source/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl='source/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl='source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl='source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl='source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
