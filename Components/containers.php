<?php
    function DashboardItem($class = '', $label = '', $value = 0) { ?>
        <div class='flex flex-col h-32 border !border-gray-300 shadow <?= $class ?>'>
            <p class='w-full h-fit font-medium text-sm border-b border-b-gray-300 bg-slate-50 px-2 py-1 truncate'>
                <?= $label ?>
            </p>
            <div class='flex justify-center items-center flex-1 text-4xl font-medium'>
                <?= $value ?>
            </div>
        </div> <?php
    }
?>