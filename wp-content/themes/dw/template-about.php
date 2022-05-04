<?php /* Template Name: About page template */;?>
<?php get_header();?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main  class="layout about">
        <h2 class="about__title"><?= get_the_title()?></h2>
        <figure class="about__fig">
            <?= get_the_post_thumbnail(null,'medium_large',['class'=>'about__thumb']);?>
        </figure>
        <div class="about__content">
            <section class="about__hobbies">
				<h2><?= __('mes loisirs', 'dwgwenbatta');?></h2>
				<div class="wysiwyg">
					<?= get_field('hobbies');?>
				</div>
			</section>
			<section class="about__hobbies">
				<h2><?= __('Qui suis-je ?', 'dwgwenbatta');?></h2>
				<div class="wysiwyg">
					<?= get_field('presentation');?>
				</div>
			</section>
        </div>
		<p>COUCOU</p>
    </main>
<?php endwhile;?>
<?php endif;?>
<?php get_footer()?>
