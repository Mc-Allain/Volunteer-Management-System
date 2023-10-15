<?php

	function Sidebar($title = 'Volunteer Management System', $abbr = 'VMS') { ?>

		<?php
			$navigations = [
				[
					'class' => 'mt-3 flex-1',
					'nav_items' => [
						'home' => [
							'label' => 'Home',
							'icon' => 'home',
							'url' => '../home/',
						],
						'volunteers' => [
							'label' => 'Volunteers',
							'icon' => 'user-nurse',
							'url' => '../volunteers/',
						],
						'emergencies' => [
							'label' => 'Emergencies',
							'icon' => 'tower-broadcast',
							'url' => '../emergencies/',
						],
						'messaging' => [
							'label' => 'Messaging',
							'icon' => 'envelope',
							'url' => '../messaging/',
						]
					]
				],
				[
					'class' => 'mb-3',
					'nav_items' => [
						'about' => [
							'label' => 'About',
							'icon' => 'info',
							'url' => '../about/',
						],
						'sign_out' => [
							'label' => 'Sign out',
							'icon' => 'arrow-right-from-bracket',
							'url' => '../home/sign_out_process.php',
							'type' => 'danger',
							'form' => 'sign-out-form',
						]
					]
				]
			]
		?>

		<!-- Sidebar -->
		<div id='sidebar' class='bg-gray-800 text-white h-screen w-[65px] lg:w-1/6 max-w-[275px] min-w-[65px] fixed left-0 top-0 flex flex-col'>
			<h1 class='text-lg font-medium p-4 pb-0 hidden lg:block'><?= $title ?></h1>
			<h1 class='text-lg font-medium p-4 pb-0 block lg:hidden break-words'><?= $abbr ?></h1>
				
				<?php
					$index = 0;

					foreach ($navigations as $group_key => $group) { ?>
						<ul class='text-gray-300 <?= $group['class'] ?>'> <?php
							$current_url = explode('/', $_SERVER['REQUEST_URI'])[2];

							foreach ($group['nav_items'] as $nav_key => $nav_item) { ?>
								<li>
									<?php
										if (isset($nav_item['form'])) { ?>
											<form action='<?= $nav_item['url'] ?>' method='post' id='<?= $nav_item['form'] ?>' > <?php
										} else { ?>
											<a href='<?= $nav_item['url'] ?>' > <?php
										}
									?>
									
									<?php 
										if (isset($nav_item['type']) && $nav_item['type'] == 'danger') {
											NavItemDanger(label: $nav_item['label'], icon: $nav_item['icon'], active: $current_url == $nav_key);
										} else {
											NavItem(label: $nav_item['label'], icon: $nav_item['icon'], active: $current_url == $nav_key);
										}
									?>
										
									<?php
										if (isset($nav_item['form'])) { ?>
											</form> <?php
										} else { ?>
											</a> <?php
										}
									?>
								</li> <?php

								$index++;

							} ?>
						</ul> <?php
					}
				?>
		</div> <?php
	}

	function NavItem($label = 'Nav Item', $icon = '', $active = false) { ?>
		<button class='w-full min-h-[32px] pl-5 pr-2 py-1 text-left flex items-center gap-1 
			<?php 
				if ($active) { ?> 
					text-blue-200 bg-gray-700 !cursor-default relative <?php
				} else { ?> 
					hover:text-white hover:bg-gray-900 <?php
				}
			?>'
		>
			<i class='fas fa-<?= $icon ?> w-6 text-center'></i>
			<span class='hidden lg:block text-sm'><?= $label ?></span> <?php

			if ($active) { ?>
				<div class='w-1 absolute top-0 bottom-0 right-0 bg-blue-200'>

				</div> <?php
			} ?>
		</button> <?php
	}

	function NavItemDanger($label = 'Nav Item Danger', $icon = '', $active = false) { ?>
		<button class='w-full min-h-[32px] pl-5 pr-2 py-1 text-left flex items-center gap-1 text-red-400 
			<?php 
				if ($active) { ?> 
					text-red-200 bg-gray-700 !cursor-default relative <?php
				} else { ?> 
					hover:text-red-500 hover:bg-gray-900  <?php
				}
			?>'
		>
			<i class='fas fa-<?= $icon ?> w-6 text-center'></i>
			<span class='hidden lg:block text-sm'><?= $label ?></span> <?php

			if ($active) { ?>
				<div class='w-1 absolute top-0 bottom-0 right-0 bg-red-200'>

				</div> <?php
			} ?>
		</button> <?php
	}

	function NavHeader($title = 'Nav Header', $class = '') { ?>
		<div id='nav_header' class='fixed top-0 right-0 h-10 border-b border-b-gray-800 px-3 flex <?= $class ?>'>
			<div class='text-[16px] font-bold uppercase p-2'>
				<?= $title ?>
			</div>
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
		</script> <?php
	}

	function NavHeaderStart($title = 'Nav Header', $class = '') { ?>
		<div id='nav_header' class='fixed top-0 right-0 h-10 border-b border-b-gray-800 px-3 flex <?= $class ?>'>
			<div class='text-[16px] font-bold uppercase p-2'>
				<?= $title ?>
			</div>
		<?php
	}

	function NavHeaderEnd() { ?>
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
		</script> <?php
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