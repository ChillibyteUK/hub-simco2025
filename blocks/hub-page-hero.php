<?php
/**
 * Block template for HUB Page Hero.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$size = 'short' === get_field( 'size' ) ? 'page-hero--short' : '';
?>
<section class="page-hero <?= esc_attr( $size ); ?>">
	<div class="page-hero__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="page-hero__overlay" aria-hidden="true"></div>
	<div class="container h-100 d-flex">
		<div class="row my-auto w-100">
			<div class="row">
				<div class="col-12 col-md-6 d-flex flex-column justify-content-center">
					<h1 class="page-hero__title"><?= wp_kses_post( get_field( 'title' ) ); ?></h1>
					<?php
					$content_type = get_field( 'content_type' );
					if ( 'animated' === $content_type ) {
						$words       = get_field( 'animated_content' );
						$words_array = array_filter( array_map( 'trim', explode( "\n", $words ) ) );
						?>
					<div class="page-hero__content">
						<?= esc_html( get_field( 'constant' ) ); ?>
						<span id="animated-word" data-words='<?= esc_attr( wp_json_encode( $words_array ) ); ?>'></span>
					</div>
						<?php
						add_action(
							'wp_footer',
							function () {
								?>
						<script>
						const el = document.getElementById("animated-word");
						const words = JSON.parse(el.getAttribute("data-words"));
						let wordIndex = 0;
						let charIndex = 0;
						let isDeleting = false;
						let typingSpeed = 60;
						let pauseTime = 1000;
						let deleteSpeed = 10;

						function type() {
							const currentWord = words[wordIndex];
							if (isDeleting) {
								charIndex--;
								el.textContent = currentWord.substring(0, charIndex);
							} else {
								charIndex++;
								el.textContent = currentWord.substring(0, charIndex);
							}

							if (!isDeleting && charIndex === currentWord.length) {
								setTimeout(() => { isDeleting = true; type(); }, pauseTime);
							} else if (isDeleting && charIndex === 0) {
								isDeleting = false;
								wordIndex = (wordIndex + 1) % words.length;
								setTimeout(type, 400);
							} else {
								setTimeout(type, isDeleting ? deleteSpeed : typingSpeed);
							}
						}
						type();
						</script>
								<?php
							},
							100
						);
					} else {
						?>
					<div class="page-hero__content"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>