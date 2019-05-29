<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string  Your facebook app ID.
|  facebook_app_secret           string  Your facebook app secret.
|  facebook_login_type           string  Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string  URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string  URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array   The permissions you need.
*/

$config['facebook_app_id']              = '374560093161722';
$config['facebook_app_secret']          = 'aaa0020f9892fdd42480f309209d97a9';
$config['facebook_token']          		= 'EAAFUqRFMyPoBAKN8EFDkTOrwqE4yrC7vEts4qa6t1cSnz6iyQEmiBvlbOPacjZA33JFhceS0gE1WWyJ65tFPESonyz3aHrX2WcmIuPmJ74WwWFBn9y9L4PwHwUT3632S7vLAWjrZAW3VsPkV4OwUA8UZC9Rlj1RkiMu3dvZC2zHvJ0f8OeaVrMh2GZAX6VSm6TpNHZAZC7GqAZDZD'; // Token page
$config['facebook_page_id']        		= '2498718550374641'; // Page ID
$config['facebook_login_type']          = 'web';
$config['facebook_permissions']         = array('email','user_profile','manage_pages','publish_actions','publish_pages');

?>