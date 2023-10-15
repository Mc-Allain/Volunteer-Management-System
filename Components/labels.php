<?php
    function RequiredNoteLabel($class = '') { ?>
        <span class='text-sm text-red-600 <?= $class ?>'>* Required</span> <?php
    }

    function Label($name = '', $value = '', $icon = '', $tag = '', $class = '') { ?>
        <label for='<?= $name ?>' class='flex items-center gap-2 text-sm <?= $class ?>'> <?php
                if (!empty(trim($icon))) { ?>
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

    function ErrorLabel($name = '', $errors = [], $class = '') { ?>
        <?php
            if (isset($errors[$name])) { ?>
                <?php $errors = $errors[$name] ?>
                
                <div class='text-sm text-red-600 <?= $class ?>'> <?php
                    if (!is_array($errors)) {
                        $errors = [$errors];
                    }
                    
                    foreach ($errors as $key => $value) { ?>
                        <?= $value ?>
                        <br> <?php
                    } ?>
                </div> <?php
            }
        ?> <?php
    }
?>