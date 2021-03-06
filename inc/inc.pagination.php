<?php
class Pagination {
 private $type = 'pagination-sm';
 private $url = null;
 private $page = 1;
 private $perpage = 5;
 private $prev = 1;
 private $next = 2;
 private $total_record = 0;
 private $link = null;
 private $response = null;
 private $html = null;

 public function __construct($request = array()) {
  $this->type = isset($request['type']) ? $request['type'] : $this->type;
  $this->url = isset($request['url']) ? $request['url'] : $this->url;
  $this->page = isset($request['page']) ? (int) $request['page'] : $this->page;
  $this->perpage = isset($request['perpage']) ? (int) $request['perpage'] : $this->perpage;
  $this->total_record = isset($request['total_record']) ? (int) $request['total_record'] : $this->total_record;
  $this->prev = isset($request['prev']) ? (int) $request['prev'] : $this->prev;
  $this->next = isset($request['next']) ? (int) $request['next'] : $this->next;
 }

 public function get() {
  $this->html = null;
  if ($this->total_page() > 1) {
   $this->html .= '<ul class="pagination '.$this->type.' custom-pagination">';
   if($this->page > ($this->prev + 1)) {
    $this->html .= '<li><a href="'.$this->url.'?page=1'.$this->parameters().'"><i class="fa fa-angle-double-left"></i></a></li>';
    $this->html .= '<li><a href="'.$this->url.'?page='.($this->page - 1).$this->parameters().'"><i class="fa fa-angle-left"></i></a>';
   }
   for($i=$this->start(); $i<=$this->display(); $i++){
    if($i == (int) $this->page){
     $this->html .= '<li class="active"><a href="#'.$i.'/">'.$i.'</a></li>';
    }else{
     $this->html .= '<li><a href="'.$this->url.'?page='.$i.$this->parameters().'">'.$i.'</a></li>';
    }
   }
   if($this->total_page() > $this->display()){
    $this->html .= '<li><a href="'.$this->url.'?page='.((int) $this->page + 1).$this->parameters().'"><i class="fa fa-angle-right"></i></a></li>';
    $this->html .= '<li><a href="'.$this->url.'?page='.$this->total_page().$this->parameters().'"><i class="fa fa-angle-double-right"></i></a></li>';
   }
   $this->html .= '</ul>';
  }
  return $this->html;
 }

 public function ordering($ordering = null, $sorting = null) {
  $url = array();
  $parameters = explode('&', $this->parameters());
  foreach ($parameters as $parameter) {
   if (!empty($parameter)) {
    list ($key, $val) = explode('=', $parameter);
    $url[$key] = $val;
   }
  }
  
  $url['ordering'] = $ordering;
  $url['sorting'] = $sorting;
  $this->link = $this->url.'?page='.$this->page;
  $this->link .= '&'.http_build_query($url, '&');
  return $this->link;
 }

 public function page_active() {
  return $this->page;
 }

 public function total_page() {
  return ceil((int) $this->total_record / (int) $this->perpage);
 }

 private function start() {
  return ((int) $this->page - (int) $this->prev) < 1 ? 1 : (int) $this->page - (int) $this->prev;
 }

 private function display() {
  $this->response = null;
  $this->response = $this->start() + (int) $this->prev + (int) $this->next;
  if($this->response > $this->total_page()) {
   $this->response = $this->total_page();
  }
  return $this->response;
 }

 private function parameters() {
  $this->response = null;
  if (isset($_GET)) {
   foreach ($_GET as $key=>$val) {
    if ($key != 'page') {
     $this->response .= '&'.$key.'='.$val;
    }
   }
  }
  return $this->response;
 }
}
