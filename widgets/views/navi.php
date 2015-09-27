<header class="main-header">
	<a href="/" class="logo">
		<span class="logo-mini"><?= $logo['logoMini'] ?></span>
		<span class="logo-lg"><?= $logo['logoLg'] ?></span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        	<span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
        	<ul class="nav navbar-nav">
        		<?php foreach ($widgets as $widget) {
        			echo $widget;
        		} ?>
        	</ul>
        </div>
	</nav>
</header>

<asside class="main-sidebar">
	<section class="sidebar">
		<?php if($searchForm['show']) { ?>
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<?php } ?>
	</section>
</asside>