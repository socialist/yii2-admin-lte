				<li class="dropdown <?= $menuType ?>-menu">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                	<i class="fa fa-sign-in"></i>
	                </a>
	                <ul class="dropdown-menu">
	                	<li class="header"></li>
	                	<li>
	                		<ul class="menu">
	                			<?php foreach ($items as $item) { ?>
	                			<li><?= $item ?></li>
	                			<?php } ?>
	                		</ul>
	                	</li>
	                </ul>
	            </li>