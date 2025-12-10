/**
 * Simple accordion with scroll-to-top
 */
document.addEventListener('DOMContentLoaded', function() {
	document.addEventListener('click', function(e) {
		const button = e.target.closest('[data-toggle-content]');
		if (!button) return;

		const target = document.querySelector(button.getAttribute('data-toggle-content'));
		if (!target) return;

		const isOpening = !target.classList.contains('is-open');

		// Close all other open items in the same accordion
		const accordion = button.closest('.accordion');
		if (accordion) {
			accordion.querySelectorAll('.accordion-content.is-open').forEach(function(item) {
				if (item !== target) {
					item.classList.remove('is-open');
				}
			});
		}

		// Toggle the content
		target.classList.toggle('is-open');

		// Scroll to the button immediately if opening
		if (isOpening) {
			const header = button.closest('.accordion-header');
			const navHeight = 105;
			const y = header.getBoundingClientRect().top + window.pageYOffset - navHeight;
			window.scrollTo({ top: y, behavior: 'smooth' });
		}
	});
});


