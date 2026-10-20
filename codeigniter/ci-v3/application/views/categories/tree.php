<?php if (!empty($categories)): ?>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <?= html_escape($category->category_name); ?>
                <?php if (!empty($category->children)): ?>
                    <?php
                        $this->load->view('categories/tree', ['categories' => $category->children]);
                    ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No categories found.</p>
<?php endif; ?>