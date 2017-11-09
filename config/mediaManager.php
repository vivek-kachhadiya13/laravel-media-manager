<?php
return [
	/*
	 * filesystem disk
	 */
	'storage_disk' => 'public',

	/*
	 * allow uploading files with the following mimetypes
	 * https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
	 */
	'allowed_mimes' => ['application'],

	'image_types' => ['original', 'medium', 'small','extra_small'],

	'allowed_extension' => ['txt','pdf','doc','docx','ppt', 'xlsx', 'png'],
];