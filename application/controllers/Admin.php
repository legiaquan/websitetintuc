<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	/*START
	@Name: Controller nhomtin vs loaitin
	@Author: Lai Van Sang
	@Student Code: DH51501933
	@Des: 
	 */
	/*START
	@Function: Show Page Index
	@return load view admin/v_index
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('Admin/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}else{
			//index - admin - view update
			$this->load->view('admin/v_index');
		}

	}
	/*
		END
	 */

	/*START
	@Function: Show Page Login
	@return: load view admin/v_login
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		if($this->ion_auth->logged_in())
		{
			redirect('Admin');
		}

		$this->data['identity'] = [
			'name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'class' => 'form-control',
			'placeholder' => 'Tài khoản',
			'value' => $this->form_validation->set_value('identity'),
		];

		$this->data['password'] = [
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'class' => 'form-control',
			'placeholder' => 'Mật khẩu',
		];

		$this->data['button'] = [
			'name'		=> 'button',
			'id'		=> 'button',
			'type'		=> 'submit',
			'class' 	=>	'btn btn-pink btn-block btn-raised',
			'content'	=> 'Đăng nhập',
		];
		$this->_render_page('admin' . DIRECTORY_SEPARATOR . 'v_login', $this->data);
	}


	/*START
	@Function: Ajax Login
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function ajaxLogin(){

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				echo 'success';
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				echo '<p class="text-warning">'.$this->ion_auth->errors().'</p>';
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$errors = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo '<p class="text-warning">'.$errors.'</p>';
		}
	}
	/*
		END
	 */

	/*START
	@Function: Logout
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('Admin/login', 'refresh');
	}
	/*
		END
	 */
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		START Quản lý tin tức																						///////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getListNews()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub'] = 'news';

		//Check login & group Admin
		$this->data['tin_list'] = $this->Dashboard_model->listTin();

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}
		$this->_render_page('admin/quan_ly_tin_tuc' . DIRECTORY_SEPARATOR . 'v_ds_tin_tuc', $this->data);
	}

	/*START
	@Function: Ajax Loai Tin
	@param: int $id
	@return: html tag option loai tin
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function ajaxLoaiTin($id){
		$cat = $this->Dashboard_model->catById($id);
		foreach($cat as $c){
			echo '<option value="'.$c->id_loaitin.'">'.$c->ten_loaitin.'</option>'."\n";
		}
	}
	/*
		END
	 */
	/*START
	@Function: Ajax Update Hot News
	@param: int $id
	@return: $mess
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function ajaxUpdateHotNews(){
		$id =  $this->input->post('id');
		$postHot = $this->Dashboard_model->select_post_by_id($id);
		if($postHot->tinhot == 0)
		{
			$tinhot = 1;
			$mess = '<font style="color:MediumSeaGreen;">HOT</font>';
		}else{
			$tinhot = 0;
			$mess = '<font style="color:GREY;"">NORMAL</font>';
		}
		$data = array(
			'tinhot'	=> $tinhot,
		);
		$this->Dashboard_model->update_posts_info($id, $data);
		echo $mess;
	}
	/*
		END
	 */
	/*START
	@Function: Update Status News
	@param int $id;
	@return: $mess
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function ajaxUpdateStatusNews(){
		$id =  $this->input->post('id');
		$postStatus = $this->Dashboard_model->select_post_by_id($id);
		if($postStatus->trangthai == 0)
		{
			$status = 1;
			$mess =  '<font style="color:MediumSeaGreen;">SHOW</font>';
		}else{
			$status = 0;
			$mess =  '<font style="color:GREY;">HIDE</font>';
		}
		$data = array(
			'trangthai'	=> $status,
		);
		$this->Dashboard_model->update_posts_info($id, $data);
		echo $mess;
	}
	/*
		END
	 */

	/*
	/*START
	@Function: Add News
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function addNews()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub'] = 'news';
		//Check login & group Admin
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}else{

			$this->data['nhomTin'] = $this->Dashboard_model->listNhom();

			//Validation form input
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'required', 
				array(
					'required'	=>	'Bạn chưa nhập tiêu đề bài viết',
				));

			$this->form_validation->set_rules('content', 'Nội dung', 'required', 
				array(
					'required'	=>	'Bạn chưa nhập nội dung bài viết',
				));

			if($this->form_validation->run() === TRUE){
				$data = array(
					'tieude'		=> $this->input->post('tieude'),
					'mota' 			=> $this->input->post('mota'),
					'noidung'		=> $this->input->post('content'),
					'tacgia'		=> $this->input->post('tacgia'),
					'ngaydangtin'	=> date('Y-m-d h:i:s', time()),
					'trangthai'		=> 1,
					'tinhot'		=> $this->input->post('tinhot'),
					'id_loaitin'	=> $this->input->post('loaitin'),
				);
			}
			if($this->form_validation->run() === TRUE && $this->Dashboard_model->save_post_info($data)){
				redirect("Admin/news", 'refresh');
			}else{

				$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

				$this->data['tieude'] = [
					'name' => 'tieude',
					'id' => 'tieude',
					'type' => 'text',
					'class' => 'form-control',
					'value' => $this->form_validation->set_value('tieude'),
				];

				$this->data['mota'] = [
					'name' => 'mota',
					'id' => 'mota',
					'type' => 'text',
					'class' => 'form-control',
					'value' => $this->form_validation->set_value('mota'),
				];

				$this->data['tacgia'] = [
					'name' => 'tacgia',
					'id' => 'tacgia',
					'type' => 'text',
					'style' => 'width:220px;',
					'class' => 'form-control',
				];

				$this->_render_page('admin/quan_ly_tin_tuc' . DIRECTORY_SEPARATOR . 'v_them_tin_tuc', $this->data);
			}
		}
	}
	/*
		END
	 */
	/*
	/*START
	@Function: Update News
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function updateNews($idNews)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub'] = 'news';
		//Check login & group Admin
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}else{
			$post = $this->Dashboard_model->select_post_by_id($idNews);
			$this->data['nhomTin'] = $this->Dashboard_model->listNhom();
			$this->data['post'] = $post;
			$this->data['selNhomId'] = $this->Dashboard_model->getIdByIdLoai($post->id_loaitin)->id_nhomtin;

			//Validation form input
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'required', 
				array(
					'required'		=>		'Bạn chưa nhập tiêu đề bài viết',
				));

			$this->form_validation->set_rules('content', 'Nội dung', 'required', 
				array(
					'required'		=>		'Bạn chưa nhập nội dung bài viết',
				));

			if($this->form_validation->run() === TRUE){
				$data = array(
					'tieude'		=> $this->input->post('tieude'),
					'mota' 			=> $this->input->post('mota'),
					'noidung'		=> $this->input->post('content'),
					'tacgia'		=> $this->input->post('tacgia'),
					'ngaydangtin'	=> date('Y-m-d h:i:s', time()),
					'trangthai'		=> 1,
					'tinhot'		=> $this->input->post('tinhot'),
					'id_loaitin'	=> $this->input->post('loaitin'),
				);
			}
			if($this->form_validation->run() === TRUE && $this->Dashboard_model->update_posts_info($idNews, $data)){
				redirect("Admin/news", 'refresh');
			}else{

				$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

				$this->data['tieude'] = [
					'name' => 'tieude',
					'id' => 'tieude',
					'type' => 'text',
					'class' => 'form-control',
					'value' => $this->form_validation->set_value('tieude', $post->tieude),
				];

				$this->data['mota'] = [
					'name' => 'mota',
					'id' => 'mota',
					'type' => 'text',
					'class' => 'form-control',
					'value' => $this->form_validation->set_value('mota', $post->mota),
				];

				$this->data['tacgia'] = [
					'name' => 'tacgia',
					'id' => 'tacgia',
					'type' => 'text',
					'style' => 'width:220px;',
					'class' => 'form-control',
					'value' => $this->form_validation->set_value('tacgia', $post->tacgia),
				];

				$this->_render_page('admin/quan_ly_tin_tuc' . DIRECTORY_SEPARATOR . 'v_sua_tin_tuc', $this->data);
			}
		}
	}
	/*
		END
	 */

	/*START
	@Function: Remove News
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function removeNews($idPost)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub'] = 'news';
		//Check login & group Admin

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		if($this->input->post('confirm') == 1){
			if($this->Dashboard_model->delete_post($idPost))
				redirect("Admin/news", 'refresh');
		}

		$post = $this->Dashboard_model->select_post_by_id($idPost);

		$this->data['tieude'] = $post->tieude;

		$this->_render_page('admin/quan_ly_tin_tuc' . DIRECTORY_SEPARATOR . 'v_xoa_tin_tuc', $this->data);
	}
	/*
		END
	 */

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		START Quản lý nhóm tin																						///////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getListGroupNews()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub2'] = 'news';
		//Check login & group Admin
		$this->data['tin_list'] = $this->Dashboard_model->listTin();

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		//quan ly nhom tin/danh sach - admin
		$this->data['nhom_list'] = $this->Dashboard_model->listNhom();
		$this->_render_page('admin/quan_ly_nhom_tin' . DIRECTORY_SEPARATOR . 'v_ds_nhom_tin', $this->data);
	}
	/*START
	@Function: Add Group News
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function addGroupNews()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub2'] = 'news';
		//Check login & group Admin
		$data['tin_list'] = $this->Dashboard_model->listTin();

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		//Validation form input
		$this->form_validation->set_rules('tieude', 'Tiêu đề', 'required');

		if($this->form_validation->run() === TRUE){
			$data = array(
				'ten_nhomtin' => $this->input->post('tieude'),
			);
		}
		if($this->form_validation->run() === TRUE && $this->Dashboard_model->insert_nhom($data)){
			redirect("Admin/news-group", 'refresh');
		}else{

			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->data['tieude'] = [
				'name' => 'tieude',
				'id' => 'tieude',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('tieude'),
			];

			$this->data['options'] = array(
				1	=> 'Hiển thị',
				0 	=> 'Ẩn',
			);

			$this->_render_page('admin/quan_ly_nhom_tin' . DIRECTORY_SEPARATOR . 'v_them_nhom_tin', $this->data);
		}
	}
	/*
		END
	 */

	/*START
	@Function: Update Group News
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function updateGroupNews($idGroup)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub2'] = 'news';
		//Check login & group Admin
		$data['tin_list'] = $this->Dashboard_model->listTin();
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		$groupNews = $this->Dashboard_model->getNhomById($idGroup);

		//Validation form input
		$this->form_validation->set_rules('tieude', 'Tiêu đề', 'required');

		if($this->form_validation->run() === TRUE){
			$data = array(
				'ten_nhomtin' => $this->input->post('tieude'),
				'trangthai' => $this->input->post('trangthai'),

			);
		}
		if($this->form_validation->run() === TRUE && $this->Dashboard_model->updateNhom($idGroup, $data)){
			redirect("Admin/news-group", 'refresh');
		}else{

			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->data['tieude'] = [
				'name' => 'tieude',
				'id' => 'tieude',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('tieude', $groupNews->ten_nhomtin),
			];

			$this->data['options'] = array(
				1	=> 'Hiển thị',
				0 	=> 'Ẩn',
			);

			$this->_render_page('admin/quan_ly_nhom_tin' . DIRECTORY_SEPARATOR . 'v_sua_nhom_tin', $this->data);
		}
	}
	/*
		END
	 */

	/*START
	@Function: Remove Group News
	@param int $idGroup
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function removeGroupNews($idGroup)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub2'] = 'news';
		//Check login & group Admin

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		if($this->input->post('confirm') == 1){
			if($this->Dashboard_model->removeNhom($idGroup))
				redirect("Admin/news-group", 'refresh');
		}

		$groupNews = $this->Dashboard_model->getNhomById($idGroup);

		$this->data['nhomtin'] = $groupNews->ten_nhomtin;

		$this->_render_page('admin/quan_ly_nhom_tin' . DIRECTORY_SEPARATOR . 'v_xoa_nhom_tin', $this->data);
	}
	/*
		END
	 */
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		START Quản lý danh mục																						///////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getListCategories()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub3'] = 'news';
		//Check login & group Admin
		$this->data['tin_list'] = $this->Dashboard_model->listTin();

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		//quan ly loai tin/danh sach - admin
		$this->data['cate_list'] = $this->Dashboard_model->listCategory();
		$this->_render_page('admin/quan_ly_loai_tin' . DIRECTORY_SEPARATOR . 'v_ds_loai_tin', $this->data);
	}
	/*START
	@Function: Add Categories
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function addCategories()
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub3'] = 'news';
		//Check login & group Admin
		$this->data['newsgroup'] = $this->Dashboard_model->listNhom();

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin');
		}

		//Validation form input
		$this->form_validation->set_rules(
			'maloai', 'Mã loại', 
			'required|min_length[2]|max_length[5]|is_unique[loai_tin.id_loaitin]',
			array(
				'required'		=> 'Bạn chưa nhập %s',
				'min_length'	=> '%s tối thiểu 2 ký tự',
				'max_length'	=> '%s tối đa 5 ký tự',
				'is_unique'		=> '%s đã tồn tại',
			));

		$this->form_validation->set_rules(
			'tenloai', 'Tên loại', 
			'required|min_length[5]|max_length[100]',
			array(
				'required'			=> 'Bạn chưa nhập %s',
				'min_length'		=> '%s tối thiểu 5 ký tự',
				'max_length'	=> '%s tối đa 100 ký tự',
			));

		if($this->form_validation->run() === TRUE){
			$data = array(
				'id_loaitin' 	=>	$this->input->post('maloai'),
				'ten_loaitin'	=>	$this->input->post('tenloai'),
				'id_nhomtin'	=>	$this->input->post('nhomtin'),
				'trangthai'		=>	$this->input->post('status'),
			);
		}
		if($this->form_validation->run() === TRUE && $this->Dashboard_model->save_category_info($data)){
			redirect("Admin/cat", 'refresh');
		}else{

			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->data['maloai'] = [
				'name' => 'maloai',
				'id' => 'maloai',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('maloai'),
			];

			$this->data['tenloai'] = [
				'name' => 'tenloai',
				'id' => 'tenloai',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('tenloai'),
			];

			$this->_render_page('admin/quan_ly_loai_tin' . DIRECTORY_SEPARATOR . 'v_them_loai_tin', $this->data);
		}
	}
	/*
		END
	 */
	/*START
	@Function: Update Categories
	@param int $idCat
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function updateCategories($idCat)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub3'] = 'news';
		//Check login & group Admin

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin');
		}
		//Get News Group
		$this->data['newsgroup'] = $this->Dashboard_model->listNhom();
		//Get Cat
		$cat = $this->Dashboard_model->getCatById($idCat);
		$this->data['idNhom'] = $cat->id_nhomtin;
		$this->data['status'] = $cat->trangthai;
		//Validation form input
		$this->form_validation->set_rules(
			'tenloai', 'Tên loại', 
			'required|min_length[5]|max_length[100]',
			array(
				'required'			=> 'Bạn chưa nhập %s',
				'min_length'		=> '%s tối thiểu 5 ký tự',
				'max_length'	=> '%s tối đa 100 ký tự',
			));

		if($this->form_validation->run() === TRUE){
			$data = array(
				'ten_loaitin'	=>	$this->input->post('tenloai'),
				'id_nhomtin'	=>	$this->input->post('nhomtin'),
				'trangthai'		=>	$this->input->post('status'),
			);
		}
		if($this->form_validation->run() === TRUE && $this->Dashboard_model->update_category_info($idCat, $data)){
			redirect("Admin/cat", 'refresh');
		}else{

			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->data['maloai'] = [
				'name' => 'maloai',
				'id' => 'maloai',
				'type' => 'text',
				'class' => 'form-control',
				'disabled' => 'disabled',
				'value' => $this->form_validation->set_value('maloai', $cat->id_loaitin),
			];

			$this->data['tenloai'] = [
				'name' => 'tenloai',
				'id' => 'tenloai',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('tenloai', $cat->ten_loaitin),
			];

			$this->_render_page('admin/quan_ly_loai_tin' . DIRECTORY_SEPARATOR . 'v_sua_loai_tin', $this->data);
		}
	}
	/*
		END
	 */

	/*START
	@Function: Remove Categories
	@param int @idCat
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function removeCategories($idCat)
	{
		$this->data['page_news'] = 'news';
		$this->data['page_news_sub3'] = 'news';
		//Check login & group Admin

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		if($this->input->post('confirm') == 1){
			if($this->Dashboard_model->removeCat($idCat))
				redirect("Admin/cat", 'refresh');
		}

		$cat = $this->Dashboard_model->getCatById($idCat);

		$this->data['loaitin'] = $cat->ten_loaitin;

		$this->_render_page('admin/quan_ly_loai_tin' . DIRECTORY_SEPARATOR . 'v_xoa_loai_tin', $this->data);
	}

	/*START
	@Function: Show List Users
	@Author: Nguyen Van Xuyen
	@Student Code: DH51500674
	 */
	public function getListUsers()
	{
		$this->data['page_user'] = 'news';
		$this->data['page_user_sub'] = 'news';
		//Check login & group Admin
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('Admin', 'refresh');
		}

		//$data['user_list'] = $this->Dashboard_model->listUsers();
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		//list the users
		$this->data['users'] = $this->ion_auth->users()->result();
		
		//USAGE NOTE - you can do more complicated queries like this
		//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
		
		foreach ($this->data['users'] as $k => $user)
		{
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		$this->_render_page('admin/quan_ly_user' . DIRECTORY_SEPARATOR . 'v_ds_user', $this->data);
	}
	/*
		END
	 */

	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

}
?>
