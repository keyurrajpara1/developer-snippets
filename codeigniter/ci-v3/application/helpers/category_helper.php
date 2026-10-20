<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Display categories and their children as dropdown options.
if (!function_exists('render_category_options')) {
    function render_category_options($categories, $level = 0)
    {
        // Loop through each category.
        foreach ($categories as $category) {
            // Add a dash for each nesting level.
            $prefix = str_repeat('- ', $level);

            // Display the category as a dropdown option.
            echo '<option value="' . html_escape($category->id) . '">';
            echo html_escape($prefix . $category->category_name);
            echo '</option>';

            // Recursively display child categories.
            if (!empty($category->children)) {
                render_category_options($category->children, $level + 1);
            }
        }
    }
}
