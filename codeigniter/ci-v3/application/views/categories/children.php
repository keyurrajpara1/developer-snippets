<h2>Child Categories</h2>
<?php if (!empty($categories)) { ?>
    <ul>
        <?php foreach ($categories as $category) { ?>
            <li>
                <?= html_escape($category->category_name); ?>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>No child categories found.</p>
<?php } ?>
