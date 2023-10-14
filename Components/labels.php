<?php
    function Label($name = '', $value = '', $icon = '', $tag = '', $class = '') { ?>
    <label for='<?= $name ?>' class='flex items-center gap-2 text-sm <?= $class ?>'> <?php
            if (!empty($icon)) { ?>
                <i class='fas fa-<?= $icon ?> text-gray-500'></i> <?php
            }
        ?>
        <?= $value ?>
        <?php
            if (!empty($tag)) {
                if ($tag == 'required') { ?>
                    <span class='text-red-600 font-medium'>*</span> <?php
                }
            }
        ?>
    </label> <?php
    }
?>