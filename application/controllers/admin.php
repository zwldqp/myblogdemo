<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function adminIndex()
    {
         $this->load->view('adminIndex');
    }
    public function new_blog()
    {
        $loginID = $this -> session -> userdata('logindata');
        $user_id = $loginID -> user_id;
        $this -> load -> model('article_model');
        $type=$this->article_model->get_types_by_user($user_id);
        $this->load->view('new_blog',array(
            'types'=>$type
        ));
    }

    public function post_blog()
    {
        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $type_id=$this->input->post('type_id');
        $loginID = $this -> session -> userdata('logindata');
        $user_id = $loginID -> user_id;
        $this->load->model('article_model');
        $this->article_model->save($title,$content,$type_id,$user_id);
        redirect('admin/blogs');
    }
    public function blogs()
    {
        $loginID = $this -> session -> userdata('logindata');
        $user_id = $loginID -> user_id;
        $this->load->model('article_model');
        $articles=$this->article_model->get_ariticles_by_user($user_id);
        $this->load->view('blogs',array(
            'articles'=>$articles
        ));
    }

    public function check()
    {
        $str=$this->input->get('str');
//        echo $str;
        $this->load->model('article_model');
        $query=$this->article_model->delete($str);
        if($query>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function view_post()
    {
        $id=$this->input->get('id');
        $this->load->model('article_model');
        $user_id = $this -> session -> userdata('logindata')->user_id;
        $results=$this->article_model->get_ariticles_by_user($user_id);
        $artical=$this->article_model->get_blog_by_id($id);
        $comments=$this->article_model->get_comment_by_article_id($id);
        $prev=null;
        $next=null;
        foreach($results as $index=>$result){
        if($id==$result->article_id){
            $row=$result;
            if($index>0){
                $prev=$results[$index-1];
            }
            if($index<count($results)-1){
                $next=$results[$index+1];
            }
        }
    }

        if($results){
            $this->load->view('view_post',array(
                'result'=> $artical,
                'prev'=>$prev,
                'next'=>$next,
                'comments'=>$comments,
                'results'=>$results
            ));
        }
        else{
            echo 'fail';
        }
    }

    public function user_setting()
    {
        $this->load->view('user_settings');
    }

    public function save_mood()
    {
        $mood=$this->input->post('mood');
        $loginID = $this -> session -> userdata('logindata');
        $user_id = $loginID -> user_id;
        $this->load->model('article_model');
        $row=$this->article_model->save_mood_by_user($user_id,$mood);
        if($row>0){
            $this->load->model('user_model');
            $loginID = $this->user_model->get_user_by_user_id($user_id);
            $this->session->set_userdata('logindata',$loginID);
            $this->load->view('user_settings');
        }else{
            echo 'fdsfd';
        }
    }
    public function pinglun(){
        $user_id=$this->input->post('id');
        $content=$this->input->post('content');
        $article_id=$this->input->get('article_id');
        $this->load->model('article_model');
        $row=$this->article_model->save_pl($user_id,$content,$article_id);
        if($row>0){
            redirect("admin/view_post?id=$article_id");
        }else{
            echo fail;
        }
    }
    public function blog_comments(){
        $user_id = $this -> session -> userdata('logindata')->user_id;
        $this->load->model('article_model');
        $results=$this->article_model->get_comment_by_user_id($user_id);
        $this->load->library('pagination');
        $add='admin/blog_comments';
        $count=count($results);
        $config=$this->page_config($count,$add);
        $this->pagination->initialize($config);
        $data['page']=$this->pagination->create_links();
        $data['list']=$this->article_model->get_comment_limit($config['per_page'],$this->uri->segment(3),$user_id);
        if($results>0){
            $this->load->view('blog_comments',$data);
        }
        else if($results=0){
            $this->load->view('blog_comments');
        }
    }
    public function delete_comm(){
        $comm_id=$this->input->get('comm_id');
        $this->load->model('article_model');
        $row=$this->article_model->delete_com($comm_id);
        if($row>0){
            redirect('admin/blog_comments');
        }
    }
    public function delete_comm_user(){
        $user = $this -> session -> userdata('logindata')->user_id;
        $user_id=$this->input->get('user_id');
        $this->load->model('article_model');
        $row=$this->article_model->delete_com_user($user_id,$user);
        if($row>0){
            redirect('admin/blog_comments');
        }
    }

    public function blogcatalogs()
    {
        $order=$this -> session -> userdata('logindata')->user_id;
        $this->load->model('article_model');
        $results=$this->article_model->get_types_by_user($order);
        $this->load->view('blogCatalogs',array(
            'results'=>$results
        ));
    }

    public function add()
    {
        $name=$this->input->post('name');
        $order=$this -> session -> userdata('logindata')->user_id;
        $this->load->model('article_model');
        $row=$this->article_model->add_order($name,$order);
        if($row>0){
           redirect('admin/blogcatalogs');
        }
    }

    public function update_type()
    {
        $name=$this->input->post('name');
        $num=$this->input->get('id');
        $this->load->model('article_model');
        $row=$this->article_model->update_type($name,$num);
        if($row>0){
            redirect('admin/blogcatalogs');
        }
    }

    public function editcatalog()
    {
        $num=$this->input->get('id');
        $user_id=$this -> session -> userdata('logindata')->user_id;
        $this->load->model('article_model');
        $results=$this->article_model->get_types_by_user($user_id);
        $row=$this->article_model->get_type_by_type_id($num);
        if($row){
            $this->load->view('editcatalog',array(
                'results'=>$results,
                'row'=>$row
            ));
        }
    }

    public function delete_article_type()
    {
        $type_id=$this->input->get('id');
        $this->load->model('article_model');
        $row=$this->article_model->delete_article_type_by($type_id);
        if($row){
//            $results= $user_id=$this -> session -> userdata('logindata');
//            $this->load->view('editcatalog',array(
//                'results'=>$results
//            ));
            redirect('admin/blogcatalogs');
        }
    }

    public function profile()
    {
        $result=$this -> session -> userdata('logindata');
        $this->load->view('profile',array(
            'result'=>$result
        ));
    }
    function page_config($count,$add){
        $config['base_url']=$add;
        $config['uri_segment']=3;
        $config['total_rows']=$count;
        $config['per_page']=5;
        $config['first_link']='首页';
        $config['last_link']='末页';
        $config['next_link']='下一页>';
        $config['prev_link']='<上一页';
        return $config;
    }

}

