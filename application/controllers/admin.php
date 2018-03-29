<?php

class admin extends MY_controller
{
  
 public function welcome()
 {
    
  $this->load->model('loginmodel','ar');
  $articles=$this->ar->articleList();
  $this->load->view('admin/dashboard',['articles'=>$articles]);
 }

 public function adduser()
 {
    
   $this->load->view('admin/add_article');
  
 }
 public function userValidation()
 {

  if($this->form_validation->run('add_article_rules'))
  {
   echo "ok";
  }
  else
  {
   $this->load->view('admin/add_article');
  }

 }
 
 public function edituser()
 {

 }
 public function deluser()
 {


 }
 public function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
  }
  public function logout()
  {
    $this->session->unset_userdata('id');
    return redirect('login');
  }
 

	
}


?>