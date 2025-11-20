<?php
/**
 * Block template for HUB Disclaimer.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

// Get disclaimer content from options page.
$disclaimer_content = get_field( 'disclaimer', 'option' );

if ( ! $disclaimer_content ) {
    return;
}

// Country lists - modify as needed.
$allowed_countries = array(
	'AT' => 'Austria',
	'BE' => 'Belgium',
	'DK' => 'Denmark',
	'FI' => 'Finland',
	'FR' => 'France',
	'DE' => 'Germany',
	'IE' => 'Ireland',
	'IT' => 'Italy',
	'JP' => 'Japan',
	'KP' => 'North Korea',
	'KR' => 'South Korea',
	'LU' => 'Luxembourg',
	'NL' => 'Netherlands',
	'NO' => 'Norway',
	'PT' => 'Portugal',
	'ES' => 'Spain',
	'SE' => 'Sweden',
	'CH' => 'Switzerland',
	'GB' => 'United Kingdom',
);

$denied_countries = array(
	'CN' => 'China',
    'IR' => 'Iran',
    'RU' => 'Russia',
    'SY' => 'Syria',
	'US' => 'United States',
	'OT' => 'Other Territories',
);

// Combine all countries for dropdown.
$all_countries = array_merge( $allowed_countries, $denied_countries );
asort( $all_countries ); // Sort alphabetically.

// Generate unique modal ID.
$modal_id = 'disclaimer-modal-' . uniqid();
?>

<!-- Disclaimer Modal -->
<div class="modal fade disclaimer" id="<?= esc_attr( $modal_id ); ?>" tabindex="-1" aria-labelledby="<?= esc_attr( $modal_id ); ?>Label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Step 1: Country Selection -->
            <div id="country-step" class="disclaimer-step">
                <div class="modal-header">
					<h2 class="h3" id="<?= esc_attr( $modal_id ); ?>Label"><?= esc_html( get_field( 'screen_1_title', 'option' ) ); ?></h2>
                </div>
                <div class="modal-body">
					<div class=""><?= wp_kses_post( get_field( 'screen_1_pre_country_select', 'option' ) ); ?></div>
                    <div class="mb-3">
                        <label for="country-select" class="form-label">Please select your country to continue:</label>
                        <select class="form-select" id="country-select" required aria-required="true">
                            <option value="">Choose your country...</option>
                            <?php foreach ( $all_countries as $code => $name ) : ?>
                                <option value="<?= esc_attr( $code ); ?>"><?= esc_html( $name ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
					<div class=""><?= wp_kses_post( get_field( 'screen_1_post_country_select', 'option' ) ); ?></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--simco-red" id="country-back">Back</button>
                    <button type="button" class="btn btn--mid-blue" id="country-continue" disabled>Continue</button>
                </div>
            </div>

            <!-- Step 2a: Access Denied -->
            <div id="access-denied-step" class="disclaimer-step" style="display: none;">
                <div class="modal-header">
					<h2 class="h2" id="access-denied-heading"><?= esc_html( get_field( 'access_denied_title', 'option' ) ); ?></h2>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <?= wp_kses_post( get_field( 'access_denied_content', 'option' ) ); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="access-denied-back">Back</button>
                </div>
            </div>

            <!-- Step 2b: Disclaimer Content -->
            <div id="disclaimer-step" class="disclaimer-step" style="display: none;">
                <div class="modal-header">
                    <h2 class="modal-title h2" id="disclaimer-heading">Important Disclaimer</h2>
                    <button type="button" class="btn-close" aria-label="Go back" id="disclaimer-back"></button>
                </div>
                <div class="modal-body">
                    <div id="disclaimer-content" style="max-height: 400px; overflow-y: auto; border: 1px solid #dee2e6; padding: 20px; border-radius: 0.375rem;" tabindex="0" role="region" aria-label="Disclaimer content - scroll to read all">
                        <?= wp_kses_post( $disclaimer_content ); ?>
                    </div>
                    <div class="mt-3">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input me-2" type="checkbox" id="disclaimer-acknowledge" disabled aria-describedby="acknowledge-label">
                            <label class="form-check-label text-muted" for="disclaimer-acknowledge" id="acknowledge-label">
                                Please scroll to the end of the disclaimer to continue
                            </label>
                        </div>
                        <div id="acknowledge-announcement" class="visually-hidden" aria-live="polite" aria-atomic="true"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--simco-red" id="disclaimer-back-btn">Back</button>
                    <button type="button" class="btn btn--mid-blue" id="disclaimer-accept" disabled>Accept & Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modalId = '<?= esc_js( $modal_id ); ?>';
    const modal = document.getElementById(modalId);
    const bsModal = new bootstrap.Modal(modal);
    
    // Country lists
    const allowedCountries = <?= wp_json_encode( array_keys( $allowed_countries ) ); ?>;
    const deniedCountries = <?= wp_json_encode( array_keys( $denied_countries ) ); ?>;
    
    // Check if disclaimer was already accepted this session
    const sessionKey = 'disclaimer_accepted_' + window.location.hostname;
    if (sessionStorage.getItem(sessionKey)) {
        return; // Don't show modal if already accepted
    }
    
    // Show modal on page load
    bsModal.show();
    
    // Elements
    const countryStep = document.getElementById('country-step');
    const accessDeniedStep = document.getElementById('access-denied-step');
    const disclaimerStep = document.getElementById('disclaimer-step');
    const countrySelect = document.getElementById('country-select');
    const countryContinue = document.getElementById('country-continue');
    const disclaimerContent = document.getElementById('disclaimer-content');
    const acknowledgeCheckbox = document.getElementById('disclaimer-acknowledge');
    const acknowledgeLabel = document.getElementById('acknowledge-label');
    const disclaimerAccept = document.getElementById('disclaimer-accept');
    const backButtons = document.querySelectorAll('#disclaimer-back, #disclaimer-back-btn, #access-denied-back');
    const acknowledgeAnnouncement = document.getElementById('acknowledge-announcement');
    const countryBack = document.getElementById('country-back');
    
    // Back to homepage from country selection
    if (countryBack) {
        countryBack.addEventListener('click', function() {
            window.location.href = '/';
        });
    }
    
    // Country selection logic
    countrySelect.addEventListener('change', function() {
        countryContinue.disabled = !this.value;
    });
    
    // Continue to next step based on country selection
    countryContinue.addEventListener('click', function() {
        const selectedCountry = countrySelect.value;
        
        countryStep.style.display = 'none';
        
        if (deniedCountries.includes(selectedCountry)) {
            // Show access denied screen
            accessDeniedStep.style.display = 'block';
            modal.setAttribute('aria-labelledby', 'access-denied-heading');
            // Focus on the heading for screen readers
            setTimeout(() => {
                const heading = accessDeniedStep.querySelector('.h2, h2');
                if (heading) heading.focus();
            }, 100);
        } else {
            // Show disclaimer screen
            disclaimerStep.style.display = 'block';
            modal.setAttribute('aria-labelledby', 'disclaimer-heading');
            // Focus on the content area for screen readers
            setTimeout(() => {
                disclaimerContent.focus();
            }, 100);
        }
    });
    
    // Back to country selection from any step
    backButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            disclaimerStep.style.display = 'none';
            accessDeniedStep.style.display = 'none';
            countryStep.style.display = 'block';
            modal.setAttribute('aria-labelledby', modalId + 'Label');
            // Restore focus to country select
            setTimeout(() => {
                countrySelect.focus();
            }, 100);
        });
    });
    
    // Scroll detection for disclaimer
    let scrolledToEnd = false;
    if (disclaimerContent) {
        disclaimerContent.addEventListener('scroll', function() {
            const element = this;
            const scrollTop = element.scrollTop;
            const scrollHeight = element.scrollHeight;
            const clientHeight = element.clientHeight;
            
            // Check if scrolled to bottom (with small buffer for precision)
            if (scrollTop + clientHeight >= scrollHeight - 10) {
                if (!scrolledToEnd) {
                    scrolledToEnd = true;
                    acknowledgeCheckbox.disabled = false;
                    acknowledgeLabel.innerHTML = 'I understand and agree';
                    acknowledgeLabel.classList.remove('text-muted');
                    // Announce to screen readers
                    if (acknowledgeAnnouncement) {
                        acknowledgeAnnouncement.textContent = 'Checkbox enabled. You may now check the box to continue.';
                    }
                }
            }
        });
    }
    
    // Checkbox change event
    if (acknowledgeCheckbox) {
        acknowledgeCheckbox.addEventListener('change', function() {
            disclaimerAccept.disabled = !this.checked;
        });
    }
    
    // Accept disclaimer
    if (disclaimerAccept) {
        disclaimerAccept.addEventListener('click', function() {
            // Store acceptance in session storage
            sessionStorage.setItem(sessionKey, 'true');
            
            // Store selected country if needed (optional)
            if (countrySelect.value) {
                sessionStorage.setItem('selected_country', countrySelect.value);
            }
            
            // Hide modal
            bsModal.hide();
        });
    }
    
    // Prevent modal from being closed without acceptance
    modal.addEventListener('hide.bs.modal', function(e) {
        if (!sessionStorage.getItem(sessionKey)) {
            e.preventDefault();
        }
    });
});
</script>

<style>
.disclaimer-step {
    min-height: 300px;
}

#disclaimer-content {
    font-size: 0.9rem;
    line-height: 1.5;
}

#disclaimer-content::-webkit-scrollbar {
    width: 8px;
}

#disclaimer-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

#disclaimer-content::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

#disclaimer-content::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.form-check-label.text-muted {
    font-style: italic;
}
</style>
