<h2>Category Dropdown</h2>
<!-- Display parent and nested child categories in a dropdown. -->
<select name="category_id" id="category_id">
    <option value="">Select Category</option>
    <?php if (!empty($categories)) { ?>
        <?php render_category_options($categories); ?>
    <?php } else { ?>
        <option value="" disabled>No categories found</option>
    <?php } ?>
</select>
