<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

 
class Breadcrumb
{
 protected $data = array();
 
 function __construct() 
 {
    error_reporting(0);
 }
 
 
 public function add($title, $uri='') 
 {
  $this->data[] = array('title'=>$title, 'uri'=>$uri);
  return $this;
 }
 
 
 public function fetch() 
 {
  return $this->data;
 }
 
 public function reset() 
 {
  $this->data = array();
 }
 
 public function show($home_site ="Home", $id = "crumbs"  ) 
 {
  $ci = &get_instance();
  $site = $home_site;
  $breadcrumbs = $this->data;
  $out  = '<ul id="'.$id.'">';
  if ($breadcrumbs && count($breadcrumbs) > 0) {
   $out .= '<li><a class="pathway" href="' . base_url() .'"/>'. $site . '</a></li> > ';
   $i=1;
   foreach ($breadcrumbs as $crumb): 
 
    if ($i != count($breadcrumbs)) {
     $out .= $sep . '<li><a class="pathway" href="' .base_url($crumb['title']). '">'. $crumb['title'] .'</a></li> > ';
    } else {
     $out .= $sep . '<li class="selected">'. $crumb['title'] .'</li>';
    }
    $i++;
   endforeach;
  } else {
   $out .= '<li class="selected">' . $site . '</li>';
  }
  $out .= '</ul>';
  return $out; 
 }
 
}
 
// END  Breadcrumb class