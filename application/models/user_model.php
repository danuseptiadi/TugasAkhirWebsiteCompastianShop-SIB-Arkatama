<?php
class user_model extends CI_Model
{
    public function login(){
        if ($this->input->post('login') != null) {
            $data = $this->input->post('login');
            $data['password'] = sha1($data['password']);
            $user = $this->db->get_where('users', $data)->row_array();
            if ($user != null) {
                if ($user['role'] == 'admin') {
                    $this->session->admin_id = $user['id'];
                    redirect(base_url('Admin'));
                }
                if ($user['role'] == 'user') {
                    $this->session->user_id = $user['id'];
                    redirect(base_url('Landing_page'));
                }
            }else {
                $message = 'email / password salah!';
                echo '
                <div class="message">
                   <span>'.$message.'</span>
                   <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
            }
        }
    }

    public function getUser(){
        return $this->db->get_where('users', ['id' => $this->session->user_id,'role' => 'user'])->row_array(); 
    }
    public function user($name){
        return $this->db->get_where('users', ['name' => $name])->row_array(); 
    }

    public function addUser(){
        if ($this->input->post('useradd')!=null) {
            $data = array_merge($this->input->post('adduser'),['role' => 'user']);
            $data['password'] = sha1($data['password']);
            if ($this->user($data['name']) != null) {
                $message = 'Username Telah di gunakan harap gunakan username lainnya !';   
            }else{
                $this->db->insert('users', $data);
                if($this->db->affected_rows() == 1){
                    $message = 'Pendaftaran Selesai..';
                    sleep(3);
                    redirect(base_url('Auth'));
                }else {
                    $message = 'Pendaftaran Gagal Dilakukan';
                }
            }
            echo '
            <div class="message">
               <span>'.$message.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }

    public function getAllUser($limit = null){
        return $this->db->get_where('users',['role' => 'user'])->result_array();
    }

    public function updateUser(){
        if ($this->input->post('upusr')!=null) {
            $message = '';
            $user = $this->user_model->getuser();
            $data = $this->input->post('updateuser');
            if ($data['new_pass'] == $data['confirm_pass']) {
                if (sha1($data['old_pass']) == $user['password']) {
                    $data = [
                        'id' => $this->session->user_id,
                        'name' => $data['name'],
                        'password' => sha1($data['new_pass'])
                    ];
                    $this->db->update('users', $data, ['id' => $data['id']]);
                    if($this->db->affected_rows() == 1 ){
                        $message = "profile telah di update";
                    }
                }else{
                    if ($user['name'] == $this->input->post('updateuser')['name']) {
                        $message = "password lama salah";
                    }else{
                        $this->db->update('users',['name' => $this->input->post('updateuser')['name']], ['id' => $user['id']]);
                    }
                }
            }else {
                if ($user['name'] != $this->input->post('updateuser')['name']) {
                    $this->db->update('users',['name' => $this->input->post('updateuser')['name']], ['id' => $user['id']]);
                }else{

                    $message = "password baru tidak sama";
                }
            }
            echo '
            <div class="message">
               <span>'.$message.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }


    public function getTotalUser(){
        $sql = "SELECT COUNT(id) as total FROM users WHERE role = 'user'";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }

    public function deleteUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
        if($this->db->affected_rows() == 1){
            $message = 'User Telah di Hapus';
        }else {
            $message = 'User Gagal Di hapus';
        }
        echo '
        <div class="message">
           <span>'.$message.'</span>
           <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>