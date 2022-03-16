<?php /*Template Name: Contact page template*/; ?>
<?php get_header(); ?>


if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout contact">
		<h2 class="contact__title"><?= get_the_title() ?></h2>
		<figure class="contact__fig">
			<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'contact__thumb']); ?>
		</figure>
		<div class="contact__content">
			<?php the_content(); ?>
		</div>
		<?php if (!isset($_SESSION['contact_form_feedback']) || !$_SESSION['contact_form_feedback']['success']): ?>
		<form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="post" class="contact__form" id="contact">
			<?php if ($_SESSION['contact_form_feedback']): ?>
				<p>Oups! Il y a des erreurs dans le formulaire</p>
			<?php endif; ?>
			<div class="form__field">
				<label for="firstname" class="form__label">Votre prénom</label>
				<input type="text" name="firstname" id="firstname" class="form__input"
					   value="<?= dw_get_contact_field_value('firstname')?>">
				<?= dw_get_contact_filed_error('firstname')?>

			</div>
			<div class="form__field">
				<label for="lastname" class="form__label">Votre nom</label>
				<input type="text" name="lastname" id="lastname" class="form__input">
			</div>
			<div class="form__field">
				<label for="email" class="form__label">Votre e-mail</label>
				<input type="email" name="email" id="email" class="form__input">
			</div>
			<div class="form__field">
				<label for="phone" class="form__label">Votre numéro de téléphone</label>
				<input type="tel" name="phone" id="phone" class="form__input">
			</div>
			<div class="form__field">
				<label for="message" class="form__label">Votre message</label>
				<textarea name="message" id="message" class="form__input"></textarea>
			</div>
			<div class="form__field">
				<label for="rules" class="form__checkbox">
					<input type="checkbox" id="rules" value="1">
					<span class="form__input">J'accepte les <a
								href="#">conditions générales d'utilisation.</a></span>
				</label>
			</div>
			<div class="form__field">
				<?php wp_nonce_field('nonce_submit_contact'); ?>
				<input type="hidden" name="action" value="submit_contact_form">
				<button class="form__button" type="submit">Envoyer</button>
			</div>
		</form>
		<?php else: ?>
			<p id="contact">Merci votre message à bien été envoyé</p>
		<?php unset($_SESSION['contact_form_feedback']); endif; ?>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>

