<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    public function get_by_name_pwd($name,$pwd){
       $query= $this->db->get_where('t_user',array(
            'username'=>$name,
            'password'=>$pwd
        ));
//        $this->db->query("select *from t_user where username='$name'and password='$pwd'");有sql注入危险  一般不用
        return $query->row();      //->result();查很多条

    }
    public function get_by_name_name($name){
        $query= $this->db->get_where('t_user',array(
            'username'=>$name
        ));
//        $this->db->query("select *from t_user where username='$name'and password='$pwd'");有sql注入危险  一般不用
        return $query->row();      //->result();查很多条
    }
    public function save($email,$username,$password,$gender){
        $query= $this->db->insert('t_user',array(
            'emal'=>$email,
            'username'=>$username,
            'password'=>$password,
            'sex'=>$gender
           // 'provice'=>$province,
           // 'city'=>$city
        ));
        return $this->db->affected_rows();
    }
    public function get_user_by_user_id($id){
        $query= $this->db->get_where('t_user',array(
            'user_id'=>$id
        ));
        return $query->row();
    }
}
