<?php
class Contact_model extends CI_Model{

	function contact_list(){
		$res=$this->db->query("SELECT * FROM tbl_contactlist");
		return $res->result();
	}

	function postItem($fname, $lname, $email, $contact){
		$res=$this->db->query("INSERT INTO tbl_contactlist (fname, lname, email, contact_num)VALUES('$fname','$lname', '$email', '$contact')");
		return $res;
	}

	function updateItem($id,$fname,$lname,$email,$contact){
		$res=$this->db->query("UPDATE tbl_contactlist SET fname='$fname',lname='$lname',email='$email',contact_num='$contact' WHERE id='$id'");
		return $res;
    }
    
    function getItemID($id){
		$res=$this->db->query("SELECT * FROM tbl_contactlist WHERE id='$id'");
		if($res->num_rows()>0){
			foreach ($res->result() as $data) {
				$arr_res=array(
                    'id' => $data->id,
					'fname' => $data->fname,
					'lname' => $data->lname,
                    'email' => $data->email,
					'contact' => $data->contact_num
					);
			}
		}
		return $arr_res;
	}

	function deleteItem($id){
		$res=$this->db->query("DELETE FROM tbl_contactlist WHERE id='$id'");
		return $res;
	}
	
}