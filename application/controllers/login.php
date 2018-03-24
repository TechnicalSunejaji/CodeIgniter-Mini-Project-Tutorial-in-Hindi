<?php
class login extends MY_Controller
{
public function index()
 {
  $this->form_validation->set_rules('uname','User Name','required|alpha');
  $this->form_validation->set_rules('pass','Password','required|max_length[12]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {
   $uname=$this->input->post('uname');
   $pass=$this->input->post('pass');
   $this->load->model('loginmodel');
   $login_id=$this->loginmodel->isvalidate($uname,$pass);
   if($login_id)
   {
       $this->session->set_userdata('id',$login_id);
       return redirect('admin/welcome');
  }
   else
   {
      $this->session->set_flashdata('Login_failed','Invalid Username/Password');
      return redirect('login');
   }


  }
  else
  {
   $this->load->view('Admin/Login');
  }

 }

}