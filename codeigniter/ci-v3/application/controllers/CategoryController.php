<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); // Call the parent controller's constructor.
        $this->load->model('Category_model'); // Load the category model for all controller methods.
    }
    // URL: http://localhost/ci-v3/CategoryController/index
    public function index()
    {
        $data['categories'] = $this->Category_model->getParentCategories(); // Get all parent categories and pass them to the view.
        $this->load->view('categories/index', $data); // Display the parent categories.
    }
    // URL: http://localhost/ci-v3/CategoryController/children/1
    public function children($parent_id)
    {
        $data['categories'] = $this->Category_model->getChildren($parent_id); // Get direct child categories of the specified parent category.
        $this->load->view('categories/children', $data); // Display the child categories.
    }
    // URL: http://localhost/ci-v3/CategoryController/tree
    public function tree()
    {
        $this->load->helper('category'); // Load the helper containing reusable category functions.
        $data['categories'] = $this->Category_model->getCategoryTree(); // Get the complete nested category hierarchy.
        $this->load->view('categories/tree', $data); // Display the nested category tree.
    }
    // URL: http://localhost/ci-v3/CategoryController/dropdown
    public function dropdown()
    {
        $this->load->helper('category'); // Load the helper containing reusable category functions.
        $data['categories'] = $this->Category_model->getCategoryTree(); // Get the complete nested category hierarchy.
        $this->load->view('categories/dropdown', $data); // Display the category dropdown.
    }
    // URL: http://localhost/ci-v3/CategoryController/table
    public function table()
    {
        $data['categories'] = $this->Category_model->getCategoryTree(); // Get the complete nested category hierarchy.
        $data['category_rows'] = $this->Category_model->flattenCategories($data['categories']); // Convert nested categories into flat table rows.
        $this->load->view('categories/table', $data); // Display all categories in a normal HTML table.
    }
    // URL: http://localhost/ci-v3/CategoryController/tree_ui
    public function tree_ui()
    {
        $data['categories'] = $this->Category_model->getCategoryTree();
        $this->load->view('categories/tree_ui', $data); // Load the new interactive tree UI.
    }
}