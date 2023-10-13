<?php
    function Input($type = 'text', $id = '', $name = '', $placeholder = '', $icon = '', $class = '') { ?>
        <div class='group flex items-center gap-2 border rounded-md p-2'> <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-gray-500'></i> <?php
                }
            ?>
            <input type=<?= $type ?> class='border-none outline-none flex-1 <?= $class ?>' id=<?= $id ?> name='<?= $name ?>' placeholder='<?= $placeholder ?>' >
        </div> <?php
    }

    function InputBehavior() { ?>
        <script>
            // JavaScript to add active class to parent when child input is focused
            document.querySelectorAll('.group input').forEach(input => {
                input.addEventListener('focus', () => {
                    input.closest('.group').classList.add('!border-blue-400');
                    input.parentElement.querySelector('.fas').classList.add('!text-blue-400');
                });
                input.addEventListener('blur', () => {
                    input.closest('.group').classList.remove('!border-blue-400');
                    input.parentElement.querySelector('.fas').classList.remove('!text-blue-400');
                });
            });
        </script> <?php
    }

    function Checkbox($id = '', $name = '', $label = '', $icon = '') { ?>
        <div class="group flex items-center gap-2 p-2"> <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-gray-500'></i> <?php
                }
            ?>
            <input type="checkbox" id=<?= $id ?> name='<?= $name ?>' class='styled-checkbox'>
            <label for=<?= $id ?> class="text-gray-600"><?= $label ?></label>
        </div> <?php
    }

    function Button($type = 'button', $id = '', $label = '', $icon = '', $button_class = 'default', $class = '') {
        $color_class = 'bg-white hover:!bg-gray-100 text-gray-600 focus:ring focus:ring-gray-300 border !border-gray-400';
        
        if ($button_class == 'primary') {
            $color_class = 'bg-blue-500 hover:bg-blue-600 text-white focus:ring focus:ring-blue-300';
        } else if ($button_class == 'danger') {
            $color_class = 'bg-red-500 hover:bg-red-600 text-white focus:ring focus:ring-red-300';
        } else if ($button_class == 'link') {
            $color_class = 'bg-white text-blue-400 hover:text-blue-500';
        } else if ($button_class == 'link-danger') {
            $color_class = 'bg-white text-red-400 hover:text-red-500';
        }

        ?>
        <button 
            type=<?= $type ?> 
            id=<?= $id ?> 
            class='flex gap-2 justify-center items-center font-medium py-2 px-4 rounded-md text-sm focus:outline-none <?= $color_class ?> <?= $class ?>'
        > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-white'></i> <?php
                }
            ?>
            <?= $label ?>
        </button> <?php
    }

    function ButtonStart($type = 'button', $id = '', $button_class = 'default', $class = '') {
        $color_class = 'bg-white hover:!bg-gray-100 text-gray-600 focus:ring focus:ring-gray-300 border !border-gray-400';
        
        if ($button_class == 'primary') {
            $color_class = 'bg-blue-500 hover:bg-blue-600 text-white focus:ring focus:ring-blue-300';
        } else if ($button_class == 'danger') {
            $color_class = 'bg-red-500 hover:bg-red-600 text-white focus:ring focus:ring-red-300';
        } else if ($button_class == 'link') {
            $color_class = 'bg-white text-blue-400 hover:text-blue-500';
        } else if ($button_class == 'link-danger') {
            $color_class = 'bg-white text-red-400 hover:text-red-500';
        }

        ?>
        <button 
            type=<?= $type ?> 
            id=<?= $id ?> 
            class='flex gap-2 justify-center items-center font-medium py-2 px-4 rounded-md text-sm focus:outline-none <?= $color_class ?> <?= $class ?>'
        > <?php
    }

    function ButtonEnd() { ?> 
        </button> <?php
    }
?>