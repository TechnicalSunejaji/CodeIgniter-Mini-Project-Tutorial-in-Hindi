<?php
class loginmodel extends CI_Model
{
  public function isvalidate($username,$password)
  {
   $q=$this->db->where(['username'=>$username,'password'=>$password])
               ->get('users');
              
   //select * from users where username=$username and password=$password
        
           if($q->num_rows())     
           {
           return $q->row()->id;
           }   
           else
           {
           	return false;
           }
   
  	//True
  }
  public function articleList($limit,$offset)
  {


    $id=$this->session->userdata('id');
   $q=$this->db->select()
            ->from('articles')
            ->where(['user_id'=>$id])
            ->limit($limit,$offset)
            ->get();
           
           return $q->result();
  }
  public function num_rows()
  {
$id=$this->session->userdata('id');
   $q=$this->db->select()
            ->from('articles')
            ->where(['user_id'=>$id])
            ->get();
           return $q->num_rows();

  }
  public function add_articles($array)
  {
     return $this->db->insert('articles',$array);
  }
  public function add_user($array)
  {
    
    return $this->db->insert('users',$array);
  }

  public function del($id)
  {
  return $this->db->delete('articles',['id'=>$id]);


  // return  $this->db->delete('articles')
  //           ->where(['id'=>$id]);
  }



}