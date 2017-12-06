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
        		<?php foreach ($widgets as $widget) { ?>
        			<?php if(preg_match("/^<li /", $widget)) { ?>
        			<?= $widget ?>
        			<?php } else { ?>
        			<li><?= $widget ?></li>
        			<?php } ?>
        		<?php } ?>
        	</ul>
        </div>
	</nav>
</header>

<asside class="main-sidebar">
	<section class="sidebar">

	<?php if(count($user) > 0) {?>
		<div class="user-panel">
			<div class="pull-left image"><img class="img-circle" src="<?= $user['avatarUrl'] ?>" alt="<?= $user['username'] ?>"></div>
			<div class="pull-left info">
				<p><?= $user['username'] ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> онлайн</a>
			</div>
		</div>
	<?php } ?>

		<?php if($searchForm['show']) { ?>
		<form action="<?= $searchForm['url'] ?>" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="<?= $searchForm['label'] ?>">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<?php } ?>
		<ul class="sidebar-menu tree">
			<li class="header"><?= $sideMenuTitle ?></li>
			<?= $sideMenuItems ?>
		</ul>
	</section>
</asside>
