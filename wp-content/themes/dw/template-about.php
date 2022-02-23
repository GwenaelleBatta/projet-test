<?php /* Template Name: About page template */;?>
<?php get_header();?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main  class="layout about">
        <h2 class="about__title"><?= get_the_title()?></h2>
        <figure class="about__fig">
            <?= get_the_post_thumbnail(null,'medium_large',['class'=>'about__thumb']);?>
        </figure>
        <div class="about__content">
            <?php the_content();?>
        </div>
    </main>
<?php endwhile;?>
<?php endif;?>
<?php get_footer()?>
