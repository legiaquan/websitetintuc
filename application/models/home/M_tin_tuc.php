<?php 
class M_tin_tuc extends CI_Model
{
	//model tin tuc
	//@Author: Trần Quốc Danh	
	//@Student Code: DH51500943
	public function register($first_name,$last_name,$user,$email,$password){
		$today = date("Y-m-d");
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'username'	=> $user,
			'email'		=> $email,
			'password'	=> $password,
			'active'	=> '2',
			'created_on'=> $today,
		);
		$this->db->insert('users', $data);
	}
	public function check_username($username){
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if($query->num_rows() == 1){ 
	        return $query->result();
	   	}else return FALSE;
	}
	public function check_email($email){
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() == 1){ 
	        return $query->result();
	   	}else return FALSE;  
	}
	public function login($id,$password){
		$this->db->select('username,last_name');
		$this->db->from('users');
		$this->db->where('username', $id);
		$this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows() == 1){ 
	        return $query->result();
	   	}  
	   else return false;  
	}
	public function logout() {
        //$this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url());
    }
	
	public function ds_top_tintuc($from,$to) //hàm để up bài viết top 1,2,3
	{ 
		//hien thi danh sach tin tuc
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin');
		$this->db->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin');
		$this->db->order_by('ngaydangtin', 'DESC');
		$this->db->where('tin.trangthai', 1);
		$this->db->limit($from,$to);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}	
	public function ds_tintuc_category($category){
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin')->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin')->where('tin.id_loaitin',$category)->where('tin.trangthai', 1)->order_by('ngaydangtin', 'DESC')->limit(15);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	//End of Trần Quốc Danh
	public function ds_tintuc_search($key){
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin')->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin')->where('MATCH(tin.tieude, tin.noidung) AGAINST ("'.$key.'")')->where('tin.trangthai', 1)->order_by('ngaydangtin', 'DESC')->limit(15);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	//@Author: Trần Quốc Danh	
	//@Student Code: DH51500943
	public function ds_tintuc_xemnhieu(){
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin')->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin')->where('tin.solanxem >=',20)->where('tin.trangthai', 1)->order_by('ngaydangtin', 'DESC')->limit(5);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	public function count_luotxem($id){
		$this->db->select('solanxem');
		$this->db->from('tin');
		$this->db->where('id_tin',$id);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	public function update_luotxem($id,$sum){
		$luotxem = $sum+1;
		$data = array('solanxem'	=>	$luotxem);
		$this->db->where('id_tin',$id);
		$this->db->update('tin',$data);
	}
	public function ds_tintuc_hot(){
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin')->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin')->where('tin.tinhot',1)->where('tin.trangthai', 1)->order_by('ngaydangtin', 'DESC')->limit(5);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	//End of Trần Quốc Danh
	/*
		@Author: Đặng Ngọc Hải
		@Student Code: DH51500890
	*/
	public function chitiet_tintuc($id)
	{
		//hien thi chi tiet tin tuc theo id_tin
		$this->db->select('id_tin,tieude,mota,noidung,ngaydangtin,tacgia,solanxem,tinhot,tin.trangthai,tin.id_loaitin,loai_tin.ten_loaitin');
		$this->db->from('tin')->join('loai_tin', 'tin.id_loaitin = loai_tin.id_loaitin')->where('id_tin',$id);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	/*
		@Author: Đặng Ngọc Hải
		@Student Code: DH51500890
		Tìm kiếm tin tức
	*/
	public function search_tintuc($ten)
	{
		//tim kiem tin tuc theo ten tieu de
		$ten = array('tieude'=>$ten);
		$this->db->select('*')->from('tin')->like($ten);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	/*
		@Author: Đặng Ngọc Hải
		@Student Code: DH51500890
		Danh sách nhóm tin
	*/
	public function ds_nhomtin()
	{
		$query = $this->db->get('nhom_tin');
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	/*
		@Author: Đặng Ngọc Hải
		@Student Code: DH51500890
		Danh sách loại tin theo nhóm
	*/
	public function ds_loaitin_theo_nhomtin($id)
	{
		$nhomtin = array('id_nhomtin' => $id);
		$this->db->select('*')->from('loai_tin')->where($nhomtin);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	/*
		@Author: Đặng Ngọc Hải
		@Student Code: DH51500890
		Danh sách loại tin
	*/
	public function ds_loaitin()
	{
		$this->db->select('*')->from('loai_tin');
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	//binh luan
	//đếm bình luận trong phần index
	public function count_binhluan($id){
		$this->db->select('COUNT(id_binhluan) as numbinhluan')->from('binh_luan')->where('id_tin',$id);
		$query= $this->db->get();
		return $query->result();
	}
    public function ds_binhluan($id)
	{
		$this->db->select()->from('binh_luan')->join('users', 'binh_luan.id_user = users.username')->where('id_tin',$id);
		$query= $this->db->get();
		if($query->num_rows()>0)
			return $query->result();
		return false;
	}
	
	public function them_binh_luan($data)
	{
		$this->db->insert('binh_luan',$data);
	}
}