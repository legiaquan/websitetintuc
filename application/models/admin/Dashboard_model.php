<?php 
/**
 * Model for Dashboard Admin - CRUD
 * Code by Do Tan Phat - DH51500099
 * Date : 8/4/2019
 */
/*START
	@Name: Model nhomtin vs loaitin
	@Author: Lai Van Sang
	@Student Code: DH51501933
	@Des: 
 */
class Dashboard_model extends CI_Model
{
	// TIN
	public function listTin()
	{
		return $this->db->select('*,tin.trangthai')->join('loai_tin', 'loai_tin.id_loaitin = tin.id_loaitin')->get('tin')->result();
	}
	public function save_post_info($data) {
        return $this->db->insert('tin', $data);
    }

    public function delete_post($id)
    {
        $this->db->where('id_tin', $id)->delete('tin');
        return true;
    }

    public function get_category_name_by_id_posts($id)
    {
        return $this->db->select('*')->from('tin')->where('id_tin',$id)->join('loai_tin', 'loai_tin.id_loaitin = tin.id_loaitin')->get()->result_array();
    }

    public function select_post_by_id($id)
    {
    	return $this->db->where('id_tin',$id)->get('tin')->row();
    }

    public function update_posts_info($id, $data)
    {
        return $this->db->where('id_tin', $id)->update('tin', $data);
    }
    public function listNhom()
	{
		return $this->db->get('nhom_tin')->result();
	}
    public function getIdByIdLoai($id){
        return $this->db->select('nhom_tin.id_nhomtin')->join('loai_tin', 'nhom_tin.id_nhomtin = loai_tin.id_nhomtin ')->where('loai_tin.id_loaitin', $id)->get('nhom_tin')->row();
    }
	public function insert_nhom($data){
		$this->db->insert('nhom_tin', $data);
        return TRUE;
	}
    public function getNhomById($id){
        return $this->db->where('id_nhomtin', $id)->get('nhom_tin')->row();
    }
    public function updateNhom($id, $data){
        return $this->db->where('id_nhomtin', $id)->update('nhom_tin', $data);
    }
    public function removeNhom($id){
        return $this->db->where('id_nhomtin', $id)->delete('nhom_tin');
    }
	public function listCategory()
	{
        return $this->db->join('loai_tin', 'loai_tin.id_nhomtin = nhom_tin.id_nhomtin')->get('nhom_tin')->result();
		
	}
    public function getCatById($id){
        return $this->db->where('id_loaitin', $id)->get('loai_tin')->row();
    }
    public function removeCat($id){
        return $this->db->where('id_loaitin', $id)->delete('loai_tin');
    }
    public function catById($id)
    {
        return $this->db->where('id_nhomtin', $id)->get('loai_tin')->result();
    }

	public function save_category_info($data) {
        return $this->db->insert('loai_tin', $data);
    }

    public function delete_category($id)
    {
    	$this->db->where('id_loaitin', $id)->delete('loai_tin');
    }

    public function select_cat_by_id($id)
    {
    	return $this->db->where('id_loaitin',$id)->get('loai_tin')->result_array();
    }

    public function update_category_info($id, $data)
    {
        return $this->db->where('id_loaitin', $id)->update('loai_tin', $data);
    }

    // USER
	public function listUsers()
	{
		return $this->db->get('user')->result();
	}

	public function add_user($data)
	{
		return $this->db->insert('user',$data);
	}

	public function delete_user($id)
	{
		//return $this->db->where('id_user',$id)->delete->('user');
	}

    public function update_user($data)
    {
		$id = $this->input->post('id', true);
        return $this->db->where('id_user', $id)->update('user', $data);
    }

    // BÌNH LUẬN
    public function listComment()
	{
		return $this->db->get('binh_luan')->result();
	}

	public function delete_comment($id)
	{
		//return $this->db->where('id_binhluan',$id)->delete->('binh_luan');
	}

    public function update_comment($data)
    {
		$id = $this->input->post('id', true);
        return $this->db->where('id_binhluan', $id)->update('binh_luan', $data);
    }
}