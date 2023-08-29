<?php
    function Input($type = 'text', $id = '', $name = '', $placeholder = '', $icon = '') { ?>
        <div class='group flex items-center gap-2 border rounded-md p-2'> <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-gray-500'></i> <?php
                }
            ?>
            <input type=<?= $type ?> class='border-none outline-none flex-1' id=<?= $id ?> name=<?= $name ?> placeholder=<?= $placeholder ?> >
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
            <input type="checkbox" id=<?= $id ?> name=<?= $name ?> class='styled-checkbox'>
            <label for=<?= $id ?> class="text-gray-600"><?= $label ?></label>
        </div> <?php
    }

    function Button($type = 'submit', $id = '', $label = '', $color = 'blue', $icon = '') { ?>
        <button 
            type=<?= $type ?> 
            id=<?= $id ?> 
            class='flex gap-2 justify-center items-center bg-<?= $color ?>-500 font-medium py-2 px-4 rounded-md text-sm text-white hover:bg-<?= $color ?>-600 focus:outline-none focus:ring focus:ring-<?= $color ?>-300'
        > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-white'></i> <?php
                }
            ?>
            <?= $label ?>
        </button> <?php
    }
?>