/*

Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.

For licensing, see LICENSE.html or http://ckeditor.com/license

*/
CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'http://127.0.0.1:8000/admin/ckeditor/kcfinder/upload.php?type=flash';
};