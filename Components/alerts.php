<?php
    function SuccessAlert($content = '', $icon = '', $class = '') { ?>
        <div class='flex items-center gap-2 bg-green-200 text-green-700 border !border-green-400 px-3 py-2 text-sm rounded-md <?= $class ?>' > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-green-700'></i> <?php
                }
            ?>
            <?= $content ?>
        </div> <?php
    }
    
    function WarningAlert($content = '', $icon = '', $class = '') { ?>
        <div class='flex items-center gap-2 bg-yellow-200 text-yellow-700 border border-yellow-400 px-3 py-2 text-sm rounded-md <?= $class ?>' > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-yellow-700'></i> <?php
                }
            ?>
            <?= $content ?>
        </div> <?php
    }
    
    function DangerAlert($content = '', $icon = '', $class = '') { ?>
        <div class='flex items-center gap-2 bg-red-200 text-red-700 border !border-red-400 px-3 py-2 text-sm rounded-md <?= $class ?>' > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-red-700'></i> <?php
                }
            ?>
            <?= $content ?>
        </div> <?php
    }
    
    function InfoAlert($content = '', $icon = '', $class = '') { ?>
        <div class='flex items-center gap-2 bg-blue-200 text-blue-700 border !border-blue-400 px-3 py-2 text-sm rounded-md <?= $class ?>' > <?php
                if (!empty($icon)) { ?>
                    <i class='fas fa-<?= $icon ?> text-blue-700'></i> <?php
                }
            ?>
            <?= $content ?>
        </div> <?php
    }
?>