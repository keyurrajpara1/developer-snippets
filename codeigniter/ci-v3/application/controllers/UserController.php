<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Load the user model.
        $this->load->library('form_validation'); // Load server-side validation.
        $this->load->helper('url'); // Load URL helpers.
    }
    // URL: http://localhost/ci-v3/users
    public function index()
    {
        // Display the user list.
        $this->load->view('users/index');
    }
    // URL: http://localhost/ci-v3/users/ajax_list
    public function ajax_list()
    {
        // Fetch active users for DataTables.
        $users = $this->User_model->getAllUsers();
        // Return data in the format expected by DataTables.
        $this->jsonResponse([
            'data' => $users
        ]);
    }
    // URL: http://localhost/ci-v3/users/create
    public function create()
    {
        // Validate the submitted user fields.
        $this->setUserValidationRules();
        if ($this->form_validation->run() === false) {
            $this->jsonResponse([
                'success' => false,
                'message' => strip_tags(validation_errors())
            ]);
            return;
        }
        // Collect only the allowed fields from the request.
        $data = $this->getUserInput();
        // Save the new user.
        if ($this->User_model->createUser($data)) {
            $this->jsonResponse([
                'success' => true,
                'message' => 'User created successfully.'
            ]);
            return;
        }
        $this->jsonResponse([
            'success' => false,
            'message' => 'Unable to create the user.'
        ]);
    }
    // URL: http://localhost/ci-v3/users/update/1
    public function update($id = null)
    {
        // Ensure a valid user ID was provided.
        if (!ctype_digit((string) $id) || (int) $id < 1) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'Invalid user ID.'
            ]);
            return;
        }
        // Check that the user exists and is not deleted.
        $user = $this->User_model->getUserById((int) $id);
        if (!$user) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'User not found.'
            ]);
            return;
        }
        // Validate the submitted fields, excluding this user's own email from the unique check.
        $this->setUserValidationRules((int) $id);
        if ($this->form_validation->run() === false) {
            $this->jsonResponse([
                'success' => false,
                'message' => strip_tags(validation_errors())
            ]);
            return;
        }
        // Collect only the allowed fields from the request.
        $data = $this->getUserInput();
        // Save the changes.
        if ($this->User_model->updateUser((int) $id, $data)) {
            $this->jsonResponse([
                'success' => true,
                'message' => 'User updated successfully.'
            ]);
            return;
        }
        $this->jsonResponse([
            'success' => false,
            'message' => 'Unable to update the user.'
        ]);
    }
    // URL: http://localhost/ci-v3/users/delete/1
    public function delete($id = null)
    {
        // Ensure a valid user ID was provided.
        if (!ctype_digit((string) $id) || (int) $id < 1) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'Invalid user ID.'
            ]);
            return;
        }
        // Check that the user exists and is not deleted.
        $user = $this->User_model->getUserById((int) $id);
        if (!$user) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'User not found.'
            ]);
            return;
        }
        // Soft-delete the user.
        if ($this->User_model->deleteUser((int) $id)) {
            $this->jsonResponse([
                'success' => true,
                'message' => 'User deleted successfully.'
            ]);
            return;
        }
        $this->jsonResponse([
            'success' => false,
            'message' => 'Unable to delete the user.'
        ]);
    }
    // Define validation rules for creating and updating users.
    private function setUserValidationRules($id = null)
    {
        $emailRule = 'trim|required|valid_email';
        if ($id === null) {
            $emailRule .= '|is_unique[users.email]';
        } else {
            $emailRule .= '|callback_email_is_unique_except_user[' . $id . ']';
        }
        $this->form_validation->set_rules(
            'first_name',
            'First name',
            'trim|required|max_length[100]'
        );
        $this->form_validation->set_rules(
            'last_name',
            'Last name',
            'trim|required|max_length[100]'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            $emailRule
        );
        $this->form_validation->set_rules(
            'mobile_number',
            'Mobile number',
            'trim|max_length[20]'
        );
    }
    // Check email uniqueness when updating an existing user.
    public function email_is_unique_except_user($email, $id)
    {
        $existingUser = $this->db
            ->where('email', $email)
            ->where('id !=', (int) $id)
            ->get('users')
            ->row();
        if ($existingUser) {
            $this->form_validation->set_message(
                'email_is_unique_except_user',
                'This email address is already in use.'
            );
            return false;
        }
        return true;
    }
    // Read only the fields allowed for a user record.
    private function getUserInput()
    {
        return [
            'first_name' => trim((string) $this->input->post('first_name', true)),
            'last_name' => trim((string) $this->input->post('last_name', true)),
            'email' => trim((string) $this->input->post('email', true)),
            'mobile_number' => trim((string) $this->input->post('mobile_number', true))
        ];
    }
    // Return a JSON response and include a refreshed CSRF hash if enabled.
    private function jsonResponse($response)
    {
        if ($this->config->item('csrf_protection')) {
            $response['csrfHash'] = $this->security->get_csrf_hash();
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}