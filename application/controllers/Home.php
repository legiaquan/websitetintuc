<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//@Author: Trần Quốc Danh	
//@Student Code: DH51500943
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->model('home/M_tin_tuc');
		$data['danhmuctt'] = $this->M_tin_tuc->ds_nhomtin();
		$this->load->view('user/head');
		$this->load->view('user/nav-bar',$data);
		
	}
	public function index()
	{
		$data['tincongnghe'] = $this->M_tin_tuc->ds_tintuc_category('ai');
		$data['ttxemnhieu'] = $this->M_tin_tuc->ds_tintuc_xemnhieu();
		$data['dstt_hot'] = $this->M_tin_tuc->ds_tintuc_hot();
		$this->load->view('user/index',$data);
		$this->load->view('user/footer');
	}
	public function register_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','Họ và chữ lót','trim|required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)
		);
		$this->form_validation->set_rules('lastname','Tên','trim|required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)								 
		);
		$this->form_validation->set_rules('user','Tên tài khoản','trim|required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)
		);
		$this->form_validation->set_rules('password','Mật khẩu','trim|required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)								 
		);
		$this->form_validation->set_rules('repassword', 'Xác nhận mật khẩu', 'trim|required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)
		);
		$this->form_validation->set_rules('email', 'Email', 'required',
			array(
					'required' => 'Bạn phải điền vào ô %s.',
				)	
		);
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else {
			$first_name = $this->input->post('firstname');
			$last_name = $this->input->post('lastname');
			$user_name = $this->input->post('user');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$passconf = $this->input->post('repassword');
			
			//query
			if($password == $passconf){
				$check_username = $this->M_tin_tuc->check_username($user_name);
				$check_email = $this->M_tin_tuc->check_email($email);
				if($check_username or $check_email){
					redirect('index?msg=reg_error_dup');
				}else {
					$password = md5($password);
					$result = $this->M_tin_tuc->register($first_name,$last_name,$user_name,$email,$password);
					redirect('index?msg=successfully');
				}
				
			}else {
				redirect('index?msg=reg_error');
			}
			
		}
	}
	public function loginAjax(){
		$sessArray = array();
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		
		//query
		$result = $this->M_tin_tuc->login($username,$password);
		if($result) {
			foreach($result as $row) {
				$sessArray = array(
					'user_name' 	=> $row->username,
					'last_name'		=> $row->last_name,
					'is_authenticated' => TRUE,
				);
				$this->session->set_userdata($sessArray);
			}
			echo '{"success": "Ok"}';
			exit;
		}else {
			echo '{"error": "Thông tin tài khoản hoặc mật khẩu không chính xác"}';
			exit;
		}
	}
	public function logout() {
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url());
    }
	
	public function baiviet($slug, $id)
	{
		$count = $this->M_tin_tuc->count_luotxem($id);
		if($count){
			foreach($count as $rows){
				$luotxem = $rows->solanxem;
				$this->M_tin_tuc->update_luotxem($id,$luotxem);
			}
		}
		$data['id'] = $id;
		$data['ds_binhluan'] = $this->M_tin_tuc->ds_binhluan($id);
		$data['numbl'] = $numbl = $this->M_tin_tuc->count_binhluan($id);
		$data['baiviet'] = $this->M_tin_tuc->chitiet_tintuc($id);
		$data['ttxemnhieu'] = $this->M_tin_tuc->ds_tintuc_xemnhieu();
		$data['dstt_hot'] = $this->M_tin_tuc->ds_tintuc_hot();
		if($data['baiviet']){
			$this->load->view('user/baiviet',$data);
		}else {
			$this->load->view('user/404');
		}
		
		
		$this->load->view('user/footer');
	}
	public function post_comment(){
		$email = $this->input->post('email');
		$noidung = $this->input->post('message');
		$today = date("Y-m-d h:i:s");
		$data = array(
			'email'		=> $email,
			'thoigian'	=> $today,
			'noidung'	=> $noidung,
			'trangthai'	=> 1,
			'id_tin'	=> $_GET['id'],
			'id_user'	=> $_SESSION['user_name'],
		);
		if(isset($_SESSION['is_authenticated']) and $_SESSION['is_authenticated'] == 1){
			$this->M_tin_tuc->them_binh_luan($data);
			redirect("comment-post".$_GET['id'].".html?post_comment=success");
		}
	}
	public function category($slug){
		$loaitin = $this->M_tin_tuc->ds_loaitin();
		foreach ($loaitin as $value)
			if(m_cut_space($value->ten_loaitin) == $slug)
				$id = $value->id_loaitin;
		$data['category'] = $this->M_tin_tuc->ds_tintuc_category($id);
		$data['ttxemnhieu'] = $this->M_tin_tuc->ds_tintuc_xemnhieu();
		if($data['category']){
			foreach($data['category'] as $item){
				$data['ten_loai'] = $item->ten_loaitin;
			}
			$this->load->view('user/category',$data);
		}else {
			$this->load->view('user/blank');
		}
		
		$this->load->view('user/footer');
		
	}
	/*START
	@Function: Search News
	@Author: Nguyen Minh Nhut
	 */
	public function Search(){
		$data['key'] = $key = $this->input->get('keywords');
		$data['category'] = $this->M_tin_tuc->ds_tintuc_search($key);
		$data['ttxemnhieu'] = $this->M_tin_tuc->ds_tintuc_xemnhieu();
		if($data['category']){
			foreach($data['category'] as $item){
				$data['ten_loai'] = $item->ten_loaitin;
			}
			$this->load->view('user/search',$data);
		}else {
			$this->load->view('user/blank');
		}
		
		$this->load->view('user/footer');
		
	}
	
	public function about(){
		$this->load->view('user/about');
		$this->load->view('user/footer');
	}
	public function contact(){
		$this->load->view('user/contact');
		$this->load->view('user/footer');
	}
}
//End of Trần Quốc Danh

?>