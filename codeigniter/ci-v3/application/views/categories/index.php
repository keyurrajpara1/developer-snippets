<h2>Parent Categories</h2>
<ul>
    <?php foreach ($categories as $category) { ?>
        <li>
            <?= html_escape($category->category_name); ?>
        </li>
    <?php } ?>
</ul>
