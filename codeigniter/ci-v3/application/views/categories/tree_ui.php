<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Tree View</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .tree-container {
            max-width: 900px;
            margin: 40px auto;
        }
        .tree-card {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            padding: 24px;
        }
        .tree-list {
            padding-left: 0;
            margin-bottom: 0;
        }
        /* Indent each nested level. */
        .tree-children {
            margin-left: 22px;
            padding-left: 18px;
            border-left: 1px solid #dee2e6;
        }
        .tree-node {
            margin-top: 8px;
        }
        .tree-item {
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            padding: 6px 10px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }
        .tree-item:hover {
            background-color: #f1f5f9;
        }
        .tree-toggle,
        .tree-spacer {
            width: 30px;
            height: 30px;
            flex-shrink: 0;
        }
        .tree-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: none;
            background: transparent;
            color: #495057;
            border-radius: 6px;
            cursor: pointer;
        }
        .tree-toggle:hover {
            background-color: #e2e8f0;
        }
        /* Custom chevron icon. */
        .tree-chevron {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: transform 0.25s ease;
        }
        /* Rotate the chevron when the node is collapsed. */
        .tree-toggle[aria-expanded="false"] .tree-chevron {
            transform: rotate(-90deg);
        }
        .tree-name {
            color: #212529;
            font-size: 15px;
            overflow-wrap: anywhere;
        }
        .tree-level-label {
            margin-left: auto;
            color: #6c757d;
            font-size: 12px;
            white-space: nowrap;
        }
        .tree-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        /* Avoid a long Bootstrap collapse animation when opening all nodes. */
        .tree-children.collapsing {
            transition-duration: 0.15s;
        }
    </style>
</head>
<body>
<div class="container tree-container">
    <div class="tree-card shadow-sm">
        <!-- Header and action buttons -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="mb-1">Category Tree</h3>
                <p class="text-secondary mb-0">Browse parent and nested categories.</p>
            </div>
            <div class="tree-actions">
                <button type="button" class="btn btn-primary btn-sm" id="expandAll">Expand All</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" id="collapseAll">Collapse All</button>
            </div>
        </div>
        <hr>
        <!-- Category tree -->
        <?php
        if (!empty($categories)) {
            /*
             * Recursive closure:
             * Displays categories at any nesting depth.
             */
            $renderTree = function ($items) use (&$renderTree) {
        ?>
                <ul class="list-unstyled tree-list">
                    <?php
                    foreach ($items as $category) {
                        $hasChildren = !empty($category->children);
                        $childrenId = 'category-children-' . (int) $category->id;
                    ?>
                        <li class="tree-node">
                            <div class="tree-item">
                                <?php
                                if ($hasChildren) {
                                ?>
                                    <!-- Expand/collapse button -->
                                    <button type="button" class="tree-toggle" data-bs-toggle="collapse" data-bs-target="#<?= html_escape($childrenId); ?>" aria-expanded="true" aria-controls="<?= html_escape($childrenId); ?>" aria-label="Toggle <?= html_escape($category->category_name); ?>">
                                        <svg class="tree-chevron" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                                    </button>
                                    <?php
                                }
                                else {
                                ?>
                                    <span class="tree-spacer"></span> <!-- Keep leaf categories aligned -->
                                <?php
                                }
                                ?>
                                <span class="tree-name"><?= html_escape($category->category_name); ?></span> <!-- Category name -->
                                <?php
                                if ($hasChildren) {
                                ?>
                                    <span class="tree-level-label"><?= count($category->children); ?> child<?= count($category->children) === 1 ? '' : 'ren'; ?></span>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if ($hasChildren) {
                            ?>
                                <!-- Child categories; initially expanded -->
                                <div class="collapse show tree-children" id="<?= html_escape($childrenId); ?>">
                                    <?php
                                    $renderTree($category->children);
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
        <?php
            };
            $renderTree($categories); // Render the top-level categories and all nested children.
        }
        else {
        ?>
            <div class="alert alert-info mb-0">No categories found.</div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Bootstrap 5.3 JavaScript bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const treeChildren = document.querySelectorAll('.tree-children'); // Get all child containers in the tree.
        document.getElementById('expandAll').addEventListener('click', function () { // Expand every category that has children.
            treeChildren.forEach(function (element) {
                const collapse = bootstrap.Collapse.getOrCreateInstance(element, { toggle: false });
                collapse.show();
            });
        });
        document.getElementById('collapseAll').addEventListener('click', function () { // Collapse every child container.
            treeChildren.forEach(function (element) { // Top-level category names remain visible.
                const collapse = bootstrap.Collapse.getOrCreateInstance(element, { toggle: false });
                collapse.hide();
            });
        });
    });
</script>
</body>
</html>