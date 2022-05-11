<?php get_header();?>
<main class="layout">
	<section class="layout__trips trips">
		<h2 class="trips__title"><?= __('Tout mes voyages', 'dwgwenbatta')?></h2>
		<nav class="trips__countries">
			<h3 class="sro"><?= __('Filtrer par pays', 'dwgwenbatta')?></h3>
			<?php foreach (dw_get_countries() as $country):?>
				<a href="?filter-country=<?=$country -> slug;?>" class="trips__country"><?=$country -> name;?></a>
			<?php endforeach;?>
		</nav>
		<div class="trips__container">
			<?php //$trips = dw_get_trips(3)?>
			<!--Début de la boucle-->
			<?php if (have_posts()): while (have_posts()): the_post();?>
			<article class="trip">
				<a href="<?=get_the_permalink()?>" class="trip__link">Lire le récit de voyage "<?= get_the_title()?>"</a>
				<div class="trip__card">
					<header class="trip__head">
						<h3 class="trip__title"><?= get_the_title()?></h3>
						<p class="trip__date"> Publier par <?=get_the_author()?> <time class="trip__time" datetime="<?= date_i18n('c', strtotime(get_field('departure_date',false,false)))?>"><?= ucwords(date_i18n('F, Y', strtotime(get_field('departure_date',false,false))))?></time></p>
					</header>
					<figure class="trip__fig">
						<?= get_the_post_thumbnail(null,'medium',['class'=>'trip__thumb']);?>
<!--						<img src="#" alt="Decription de l'image" class="trip__thumb">-->
					</figure>
				</div>
			</article>
			<!--Fin de la boucle-->
			<?php endwhile;?>
			<?php else:?>
			<p class="trip__empty"><?= __('Il n\'y a pas de voyage à vous raconter...', 'dwgwenbatta')?></p>
			<?php endif?>
		</div>
	</section>
</main>
<?php  get_footer()?>

<?php//BEM = Base__Element--Modifier.
// header.header
//  h1.header__title--red
//  p.header__paragraph

?>

