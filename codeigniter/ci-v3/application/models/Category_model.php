<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library so we can run database queries.
    }
    public function getParentCategories() // Get categories that do not have a parent category.
    {
        return $this->db
            ->where('parent_category_id IS NULL', null, false)
            ->where('deleted_at IS NULL', null, false)
            ->get('categories')
            ->result();
    }
    public function getChildren($parent_category_id) // Get direct child categories of the given parent category.
    {
        $parent = $this->db
            ->where('id', $parent_category_id)
            ->where('deleted_at IS NULL', null, false)
            ->get('categories')
            ->row(); // First, check whether the parent category exists and is not deleted.
        if (!$parent) {
            return []; // Do not return children if the parent is missing or deleted.
        }
        return $this->db
            ->where('parent_category_id', $parent_category_id)
            ->where('deleted_at IS NULL', null, false)
            ->get('categories')
            ->result(); // Return only non-deleted child categories.
    }
    public function getCategoryWithParent($id) // Get a category along with its parent's name using a self-join.
    {
        return $this->db
            ->select('child.*, parent.category_name AS parent_name')
            ->from('categories AS child')
            ->join('categories AS parent', 'parent.id = child.parent_category_id AND parent.deleted_at IS NULL', 'left')
            ->where('child.id', $id)
            ->where('child.deleted_at IS NULL', null, false)
            ->get()
            ->row();
    }
    public function getCategoryTree($parent_category_id = null)
    {
        if ($parent_category_id === null) {
            $this->db->where('parent_category_id IS NULL', null, false); // Get top-level categories when no parent ID is provided.
        }
        else {
            $this->db->where('parent_category_id', $parent_category_id); // Get child categories belonging to the specified parent.
        }
        $this->db->where('deleted_at IS NULL', null, false); // Exclude soft-deleted categories at every nesting level.
        $categories = $this->db->order_by('id', 'ASC')->get('categories')->result(); // Fetch the categories matching the parent ID.
        foreach ($categories as $category) {
            $category->children = $this->getCategoryTree($category->id); // Recursively fetch children for each category.
        }
        return $categories; // Return categories with their nested children.
    }
    public function flattenCategories($categories, $level = 0) // Convert nested categories into flat rows for displaying in a table.
    {
        $rows = []; // Initialize an empty array to store the flattened categories.
        foreach ($categories as $category) {
            $category->level = $level; // Store the category's nesting level.
            $rows[] = $category; // Add the current category to the table rows.
            if (!empty($category->children)) {
                $rows = array_merge($rows, $this->flattenCategories($category->children, $level + 1)); // Add all child categories recursively.
            }
        }
        return $rows; // Return the flattened category rows.
    }
}
