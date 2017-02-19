<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function get_ariticles_by_user($user_id)
    {
        $this->db->select('a.*, t.type_name');
        $this->db->from('t_artical a');
        $this->db->join('t_article_type t', 'a.type_id=t.type_id');
        $this->db->where('a.user_id',$user_id);
        $this->db->order_by('a.post_time','desc');
        return $this->db->get()->result();
    }
    public function get_types_by_user($user_id)
    {
        $sql = "select t.*, (select count(*) from t_artical a where a.type_id=t.type_id) num from  t_article_type t where t.user_id=$user_id";
        return $this->db->query($sql)->result();
    }
    public function save($title,$content,$type_id,$user_id){
        $this->db->insert('t_artical',array(
            'title'=>$title,
            'content'=>$content,
            'type_id'=>$type_id,
            'user_id'=>$user_id
        ));
        return $this->db->affected_rows();
    }
    public  function delete($str){
        $sql="delete from t_artical where article_id in($str)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_blog_by_id($id)
    {
        $sql="select * from t_artical where article_id=$id";
        return $this->db->query($sql)->row();
    }
    public function save_mood_by_user($user_id,$mood){
        $sql="update t_user set mood='$mood' where user_id=$user_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function save_pl($id,$content,$article_id){
        $this->db->insert('t_comment',array(
            'content'=>$content,
            'artical_id'=>$article_id,
            'user_id'=>$id
        ));
        return $this->db->affected_rows();
    }
    public function get_comment_by_article_id($article_id){
        //echo $article_id;
        $sql="select c.*,u.username from t_comment c,t_user u where c.user_id=u.user_id and c.artical_id=$article_id";
        return $this->db->query($sql)->result();
    }
    public function get_comment_by_user_id($id){
        $sql="select c.*,a.title,u.username,u.user_id from t_artical a,t_comment c,t_user u where c.artical_id=a.article_id and c.user_id=u.user_id and a.user_id=$id";
        return $this->db->query($sql)->result();
    }
    public function delete_com($comm_id){
        $this->db->delete('t_comment',array(
            'comm_id'=>$comm_id
        ));
        return $this->db->affected_rows();
    }
    public function delete_com_user($user_id,$user){
        $sql="delete from t_comment where user_id=$user_id and artical_id in (select t_artical.article_id from t_artical where user_id = $user)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function add_order($name,$order){
        $this->db->insert('t_article_type',array(
           'type_name'=>$name,
            'user_id'=>$order
        ));
        return $this->db->affected_rows();
    }
    public function update_type($name,$id){
        $this->db->set('type_name',$name);
        $this->db->where('type_id',$id);
        $this->db->update('t_article_type');
        return $this->db->affected_rows();
    }
    public function get_type_by_type_id($type){
        $sql="select * from t_article_type where type_id=$type";
        return  $this->db->query($sql)->row();
    }
    public function delete_article_type_by($type_id){
        $sql="delete from t_article_type where type_id=$type_id ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_comment_limit($n,$o,$user_id){
        if($o==''){$o=0;}
        $sql = "select c.*,a.title,u.username from t_artical a,t_comment c,t_user u where c.user_id = u.user_id and c.artical_id = a.article_id and a.user_id = $user_id limit $o,$n";
        $result = $this->db->query ($sql);
        $re = $result->result ();
        return $re;

    }
}











