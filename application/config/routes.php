<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Reserved Routes
$route['default_controller'] = 'content';
// $route['404_override']       = 'error404';

// admin routes
$route['^admin$']            = 'admin/dashboard';
$route['admin/auth']         = 'admin/auth/login';
$route['admin/(.+)']         = 'admin/$1';

// RSS feed, YML feed, sitemap.xml, robots.txt routes
$route['rss(.)*']            = 'content/rss';
$route['yml(.)*']            = 'content/yml';
$route['sitemap.xml']        = 'content/sitemap_xml';
$route['robots.txt']         = 'content/robots_txt';

$route['(.)+']               = 'content';