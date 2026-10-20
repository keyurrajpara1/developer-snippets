<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library.
    }
    public function getAllUsers()
    {
        // Get users that have not been soft-deleted.
        return $this->db
            ->where('deleted_at IS NULL', null, false)
            ->order_by('id', 'DESC')
            ->get('users')
            ->result_array();
    }
    public function getUserById($id)
    {
        // Find one active user by ID.
        return $this->db
            ->where('id', $id)
            ->where('deleted_at IS NULL', null, false)
            ->get('users')
            ->row_array();
    }
    public function createUser($data)
    {
        // Set the creation and update timestamps.
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        // Insert the new user into the database.
        return $this->db->insert('users', $data);
    }
    public function updateUser($id, $data)
    {
        // Update the modification timestamp.
        $data['updated_at'] = date('Y-m-d H:i:s');
        // Update only an active user.
        return $this->db
            ->where('id', $id)
            ->where('deleted_at IS NULL', null, false)
            ->update('users', $data);
    }
    public function deleteUser($id)
    {
        // Set deleted_at instead of permanently deleting the record.
        return $this->db
            ->where('id', $id)
            ->where('deleted_at IS NULL', null, false)
            ->update('users', [
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
    }
}