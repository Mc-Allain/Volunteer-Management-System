<?php
    function DataTables($id = '', $class = '', $columns = [], $data = [], $column_definitions = [], $column_sorting = [], $search_on_change = false) { ?>
        <table id=<?= $id ?> class='<?= $class ?>' >
            <?php
                // if (count($columns) > 0) {
                //     TableHeader(columns: $columns);
                // }

                // TableBody();
            ?>
        </table>
        
        <script>
            const columns = <?= json_encode($columns) ?>;

            <?php
                // Initialize an empty array to store the extracted values
                $result = [];

                foreach ($data as $key => $value) {
                    array_push($result, array_values($value));
                }
            ?>
            const data = <?= json_encode($result) ?>;

            const options = {
                columns: columns,
                data: data,
            }

            var doSearchOnChange = <?php echo $search_on_change ? 'true' : 'false'; ?>;

            if (!doSearchOnChange) {
                options.search = {
                    return: true
                }
            }

            const columnDefs = <?= json_encode($column_definitions) ?>;

            if (columnDefs.length > 0) {
                options.columnDefs = columnDefs;
            }

            const order = <?= json_encode($column_sorting) ?>;

            if (order.length > 0) {
                options.order = order;
            }

            options.lengthMenu = [
                [10, 25, 50],
                [10, 25, 50]
            ];

            new DataTable('#<?= $id ?>', options);
            // const table = document.getElementById('<?= $id ?>');

            // for (let row of table.children[1].children) {
            //     console.log(row.children);
            // }
        </script> <?php
    }
?>