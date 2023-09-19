<?php

    function Sidebar($title = 'Sidebar', $abbr = 'SB', $selected_index = 0) { ?>
        <!-- Sidebar -->
        <div id='sidebar' class='bg-gray-800 text-white h-screen w-[65px] lg:w-1/6 max-w-[275px] min-w-[65px] fixed left-0 top-0 flex flex-col'>
            <h1 class='text-xl font-medium p-4 pb-0 hidden lg:block'><?= $title ?></h1>
            <h1 class='text-xl font-medium p-4 pb-0 block lg:hidden break-words'><?= $abbr ?></h1>
            <ul class='mt-4 text-gray-300 flex-1'>
                <li>
                    <a href='../home/'>
                        <?= NavItem(label: 'Home', icon: 'home', index: 0, selected_index: $selected_index) ?>
                    </a>
                </li>
                <li>
                    <a href='../volunteers/'>
                        <?= NavItem(label: 'Volunteers', icon: 'user-nurse', index: 1, selected_index: $selected_index) ?>
                    </a>
                </li>
                <li>
                    <a href='../emergencies/'>
                        <?= NavItem(label: 'Emergencies', icon: 'tower-broadcast', index: 2, selected_index: $selected_index) ?>
                    </a>
                </li>
            </ul>
            <ul class='mb-3'>
                <li>
                    <a href='../about/'>
                        <?= NavItem(label: 'About', icon: 'info', index: 3, selected_index: $selected_index) ?>
                    </a>
                </li>
                <li>
                    <form action='../home/sign_out_process.php' method='post' id='sign-out-form'>
                        <?= NavItemDanger(label: 'Sign out', icon: 'arrow-right-from-bracket', index: 4, selected_index: $selected_index) ?>
                    </form> 
                </li>
            </ul>
        </div> <?php
    }

    function NavItem($label = 'Nav Item', $icon = '', $index = 0, $selected_index = 0) { ?>
        <button class='w-full min-h-[32px] pl-5 pr-2 py-1 text-left flex items-center gap-1.5 
            <?php 
                if ($index !== $selected_index) { ?> 
                    hover:text-white hover:bg-gray-900 <?php
                } else { ?> 
                    text-blue-200 bg-gray-700 !cursor-default relative <?php
                }
            ?>'
        >
            <i class='fas fa-<?= $icon ?> w-6 text-center'></i>
            <span class='hidden lg:block'><?= $label ?></span> <?php

            if ($index === $selected_index) { ?>
                <div class='w-1 absolute top-0 bottom-0 right-0 bg-blue-200'>

                </div> <?php
            } ?>
        </button> <?php
    }

    function NavItemDanger($label = 'Nav Item Danger', $icon = '', $index = 0, $selected_index = 0) { ?>
        <button class='w-full min-h-[32px] pl-5 pr-2 py-1 text-left flex items-center gap-1.5 text-red-400 
            <?php 
                if ($index !== $selected_index) { ?> 
                    hover:text-red-500 hover:bg-gray-900  <?php
                } else { ?> 
                    text-red-200 bg-gray-700 !cursor-default relative <?php
                }
            ?>'
        >
            <i class='fas fa-<?= $icon ?> w-6 text-center'></i>
            <span class='hidden lg:block'><?= $label ?></span> <?php

            if ($index === $selected_index) { ?>
                <div class='w-1 absolute top-0 bottom-0 right-0 bg-red-200'>

                </div> <?php
            } ?>
        </button> <?php
    }

    function NavHeader($title = 'Nav Header') { ?>
        <div id='nav_header' class='fixed top-0 w-full text-[16px] font-bold border-b border-b-gray-800 uppercase px-3 py-2'>
            <?= $title ?>
        </div>
        
        <script>
            const handleNavHeaderResize = () => {
                const sidebar = document.getElementById('sidebar');
                const navHeader = document.getElementById('nav_header');

                const sidebarWidth = sidebar ? sidebar.offsetWidth : 0;
                
                if (navHeader) {
                    navHeader.style.left = sidebarWidth + 'px';
                }
            }

            window.addEventListener("resize", handleNavHeaderResize);

            handleNavHeaderResize();
        </script><?php
    }

    function NavContentStart($class = '') { ?>
        <div id='nav_content' class='absolute bottom-0 right-0 overflow-y-scroll p-2 <?= $class ?>'>
        
        <script>
            const handleNavContentResize = () => {
                const sidebar = document.getElementById('sidebar');
                const navHeader = document.getElementById('nav_header');
                const navContent = document.getElementById('nav_content');

                const sidebarWidth = sidebar ? sidebar.offsetWidth : 0;
                const navHeaderHeight = navHeader ? navHeader.offsetHeight : 0;
                
                if (navContent) {
                    navContent.style.left = sidebarWidth + 'px';
                    navContent.style.top = navHeaderHeight + 'px';
                }
            }

            window.addEventListener("resize", handleNavContentResize);

            handleNavContentResize();
        </script> <?php
    }

    function NavContentEnd() { ?>
        </div> <?php
    }
?>