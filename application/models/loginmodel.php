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

//$where="article_title='Article 2' or article_title='article one'";

// $where=array(
//   'article_title'=>'Article 2'
//   );
  //  $in=array(10,9,12);

    $id=$this->session->userdata('id');
   $q=$this->db->select('')
            ->from('articles')
            ->where(['user_id'=>$id])
         //   ->like('article_title','A','none')
           // ->where_not_in('id',$in)

           // ->or_where('article_title','Article 2')
           //->where('article_title!=','Article 2')
           // ->Where($where)
            ->limit($limit,$offset)
            ->get();
           
           return $q->result();
  }
  public function find_article($articleid)
  {
   $q=$this->db->select(['article_title','article_body','id'])
            ->where('id',$articleid)
            ->get('articles');
            return $q->row();


  }
  public function update_article($articleid,Array $article)
  {
    
   return $this->db->where('id',$articleid)
                   ->update('articles',$article);

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