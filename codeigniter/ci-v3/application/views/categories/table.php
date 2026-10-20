<!DOCTYPE html>
<html>
<head>
    <title>Category Table</title>
    <!-- Load DataTables CSS from the official CDN. -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-3.1.4/datatables.min.css">
</head>
<body>
    <h2>Category List</h2>
    <!-- Display all parent and child categories in a DataTable. -->
    <table id="categoryTable" class="display" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Parent Category ID</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($category_rows)) { ?>
                <?php foreach ($category_rows as $category) { ?>
                    <tr>
                        <!-- Display the category ID. -->
                        <td><?= html_escape($category->id); ?></td>
                        <!-- Display the category name with dashes for each nesting level. -->
                        <td><?= html_escape(str_repeat('- ', $category->level) . $category->category_name); ?></td>
                        <!-- Display the parent category ID or a dash for parent categories. -->
                        <td>
                            <?= $category->parent_category_id === null ? '—' : html_escape($category->parent_category_id); ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <!-- Load DataTables JavaScript from the official CDN. -->
    <script src="https://cdn.datatables.net/v/dt/dt-3.1.4/datatables.min.js"></script>
    <script>
        // Initialize DataTables after the HTML table has been loaded.
        new DataTable('#categoryTable', {
            // Display 10 rows per page by default.
            pageLength: 10,
            // Allow users to select the number of rows per page.
            lengthMenu: [5, 10, 25, 50, 100],
            // Sort categories by ID in ascending order initially.
            order: [[0, 'asc']],
            // Set the empty table message.
            language: {
                emptyTable: 'No categories found.'
            }n
        });
    </script>
</body>
</html>