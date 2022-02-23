<?php get_header();?>
<main class="layout">
    <section class="layout__latest latest">
        <h2 class="latest__title">Mes derniers articles</h2>
        <div class="letest__container">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <!--On est dans sle boucle-->
                <article class="post">
                    <a href="<?=get_the_permalink()?>" class="post__link">Lire l'article "<?=get_the_title()?>"</a>
                    <div class="post__card">
                        <header class="post__head">
                            <h3 class="post__title">
                                <?= get_the_title()?>
                            </h3>
                                <p class="post__meta">Publier par <?=get_the_author()?> le <time class="post__date" datetime="<?=get_the_date('c')?>"><?=get_the_date()?></time></p>
                        </header>
                                <figure class="post__fig">
                                    <?= get_the_post_thumbnail(null,'medium_large',['class'=>'post__thumb', 'id'=>'test']);?>
<!--                                    <img src="" alt="TODO" class="post__thumb">-->
                                </figure>
                            <div class="post__excerpt">
                                <p>
                                   <?= get_the_excerpt()?>
                                </p>
                            </div>
                    </div>
                </article>
            <?php endwhile;else:?>
            <!--Il n'y a pas d'articles à afficher-->
            <?php endif;?>
        </div>
    </section>
	<section class="layout__trips trips">
		<h2 class="trips__title">Mes derniers voyages</h2>
		<div class="trips__container">
			<?php $trips = new WP_Query([
					//arguments
				'post_type' => 'trip',
				'orderby' =>'date',
				'order'=>'DESC',
				'posts_per_page' => 3,
			]);?>
			<!--Début de la boucle-->
			<?php if ($trips->have_posts()): while ($trips->have_posts()): $trips->the_post();?>
			<article class="trip">
				<a href="<?=get_the_permalink()?>" class="trip__link">Lire le récit de voyage "<?= get_the_title()?>"</a>
				<div class="trip__card">
					<header class="trip__head">
						<h3 class="trip__title"><?= get_the_title()?></h3>
						<p class="trip__date"> Publier par <?=get_the_author()?> le <time class="trip__time" datetime="">XX/XX/XXXX</time></p>
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
			<p class="trip__empty">Il n'y a pas de voyage à vous raconter</p>
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

