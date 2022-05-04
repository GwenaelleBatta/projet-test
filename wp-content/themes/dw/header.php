<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>TODO</title>
	<link rel="stylesheet" type="text/css" href="<?= dw_mix('css/style.css'); ?>">
	<?php foreach (pll_the_languages(['raw' => true]) as $code => $locale):; ?>
		<link rel="alternate" hreflang="<?= $locale['locale']; ?>" href="<?= $locale['url']; ?>">
	<?php endforeach; ?>
	<script type="text/javascript" src="<?= dw_mix('/js/script.js'); ?>"></script>
<!--	--><?php //wp_head();?>
</head>
<body>
<header class="header">
	<h1 class="header__title"><?php echo get_bloginfo('name'); ?></h1>
	<p class="header_tagline"><?php echo get_bloginfo('description'); ?></p>
	<nav class="header__nav nav">
		<h2 class="nav__title"><?= __('Navigation principale', 'dwgwenbatta') ?></h2>
		<div class="nav__languages">
			<?php foreach (pll_the_languages(['raw' => true]) as $code => $locale):; ?>
				<a href="<?= $locale['url']; ?>" class="nav__locale" lang="<?= $locale['locale']; ?>"
				   hreflang="<?= $locale['locale'] ?>" title="<?= $locale['name']; ?>"><?= $code ?></a>
			<?php endforeach; ?>
		</div>
		<!--            --><?php //wp_nav_menu(['menu' => 'primary',
		//					'menu_class'=> 'nav__links',
		//					'menu_id' => 'navigation',
		//					'container_class'=> 'nav__container',
		//					'walker'=> new PrimaryMenuWalker(),]);?>
		<!-- instance new (concrétisation de la recette )!= class (recette théorique -> permet de créer quelque chose)-->
		<ul class="nav__container">
			<?php foreach (dw_get_menu_items('primary') as $link): ?>
				<li class="<?= $link->getBemClasses('nav__item'); ?>">
					<a href="<?= $link->url; ?>"
							<?= $link->title ? 'title = "' . $link->title . '"' : ''; ?>
					   class="nav__link"><?= $link->label; ?></a>
					<?php if ($link->hasSubItems()): ?>
						<ul class="nav__subcontainer">
							<?php foreach ($link->subitems as $sub): ?>
								<li class="<?= $link->getBemClasses('nav__item') ?>">
									<a href="<?= $sub->url; ?>"
											<?= $sub->title ? 'title = "' . $sub->title . '"' : ''; ?>
									   class="nav__link"><?= $sub->label; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</header>
