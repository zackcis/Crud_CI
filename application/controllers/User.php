<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load necessary libraries and models
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('User_model');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Configure upload settings
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->upload->initialize($config);

            // Attempt to upload file
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("error", $error);
                redirect(base_url("user/add"));
                return;
            }

            // File uploaded successfully
            $image_data = $this->upload->data();
            $first = $this->input->post('first_name');
            $last = $this->input->post('last_name');
            $age = $this->input->post('age');
            $file_name = $image_data['file_name'];

            $data = array(
                'first_name' => $first,
                'last_name' => $last,
                'age' => $age,
                'image' => $file_name,
            );

            // Insert user data into database
            $status = $this->User_model->insertUser($data);
            if ($status) {
                $this->session->set_flashdata("success", "Successfully Added");
                redirect(base_url("user/index"));
            } else {
                $this->session->set_flashdata("error", "Database insertion failed");
                redirect(base_url("user/add"));
            }
        } else {
            // If request method is not POST, load the add_user view
            $this->load->view("user/add_user");
        }
    }

    public function index()
    {
        $data['users'] = $this->User_model->getUsers();
        $this->load->view("user/index", $data);
    }

    public function edit($id)
    {
        $data["user"] = $this->User_model->getUser($id);
        $data['id'] = $id;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if a new image is being uploaded
            if (!empty($_FILES['userfile']['name'])) {
                // Configure upload settings
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
    
                $this->upload->initialize($config);
    
                // Attempt to upload file
                if (!$this->upload->do_upload('userfile')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata("error", $error);
                    redirect(base_url("user/edit/$id"));
                    return;
                }
    
                // File uploaded successfully
                $image_data = $this->upload->data();
                $file_name = $image_data['file_name'];
    
                // Update user data including the new image
                $first = $this->input->post('first_name');
                $last = $this->input->post('last_name');
                $age = $this->input->post('age');
                $data = array(
                    'first_name' => $first,
                    'last_name' => $last,
                    'age' => $age,
                    'image' => $file_name,
                );
            } else {
                // If no new image is uploaded, update user data without changing the image
                $first = $this->input->post('first_name');
                $last = $this->input->post('last_name');
                $age = $this->input->post('age');
                $data = array(
                    'first_name' => $first,
                    'last_name' => $last,
                    'age' => $age,
                );
            }
    
            // Update user data in the database
            $status = $this->User_model->updateUser($data, $id);
            if ($status) {
                $this->session->set_flashdata("success", "Successfully Updated");
            } else {
                $this->session->set_flashdata("error", "Error");
            }
            redirect(base_url("user/index"));
        } else {
            // If request method is not POST, load the edit_user view
            $this->load->view("user/edit_user", $data);
        }
    }
    

    public function delete($id)
    {
        if (is_numeric($id)) {
            $status = $this->User_model->deleteUser($id);
            if ($status) {
                $this->session->set_flashdata("success", "Successfully Deleted");
            } else {
                $this->session->set_flashdata("error", "Error");
            }
        }
        redirect(base_url("user/index"));
    }
}
