<?php
class Users extends MY_controller
{
 public function index()
 {
  $this->load->view('Users/articleList');
 }
 public function register()
 {
  $this->load->view('admin/register');
 }
 public function sendemail()
 {
  
  $this->form_validation->set_rules('uname','User Name','required|alpha');
  $this->form_validation->set_rules('pass','Password','required|max_length[12]');
  $this->form_validation->set_rules('fname','First Name','required|alpha');
  $this->form_validation->set_rules('lname','last Name','required|alpha');
  $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {
    $this->load->library('email');
  
    $this->email->from(set_value('email'),set_value('fname'));
    $this->email->to("ajay.suneja1993@gmail.com");
    $this->email->subject("Registratiion Greeting..");

    $this->email->message("Thank  You for Registratiion");
    $this->email->set_newline("\r\n");
    $this->email->send();

     if (!$this->email->send()) {
    show_error($this->email->print_debugger()); }
  else {
    echo "Your e-mail has been sent!";
  }
  }
  else
  {
   $this->load->view('Admin/register');
  }
 }
}


?>