<?php
/**
 * Block template for HUB Knowledge Disclaimer.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

// Get disclaimer content from options page.
$disclaimer_content = get_field( 'knowledge_disclaimer_content', 'option' );

if ( ! $disclaimer_content ) {
    return;
}
// Generate unique modal ID.
$modal_id = 'knowledge-disclaimer-modal-' . uniqid();

$decline_link = get_field( 'redirect_on_decline', 'option' ) ? get_field( 'redirect_on_decline', 'option' ) : home_url();
?>

<!-- Disclaimer Modal -->
<div class="modal fade" id="<?= esc_attr( $modal_id ); ?>" tabindex="-1" aria-labelledby="<?= esc_attr( $modal_id ); ?>Label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h2"><?= esc_html( get_field( 'knowledge_disclaimer_title', 'option' ) ); ?></div>
            </div>
            <div class="modal-body">
                <?= wp_kses_post( $disclaimer_content ); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--mid-blue" id="accept-disclaimer-<?= esc_attr( $modal_id ); ?>">Accept</button>
                <button type="button" class="btn btn--simco-red" id="decline-disclaimer-<?= esc_attr( $modal_id ); ?>">Decline</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modalId = '<?= esc_js( $modal_id ); ?>';
    const modal = document.getElementById(modalId);
    const bsModal = new bootstrap.Modal(modal);
    const acceptBtn = document.getElementById('accept-disclaimer-' + modalId);
    const declineBtn = document.getElementById('decline-disclaimer-' + modalId);
    const declineLink = '<?= esc_js( $decline_link ); ?>';
    
    // Check if disclaimer was already accepted this session
    const cookieName = 'knowledge_disclaimer_accepted';
    if (getCookie(cookieName)) {
        return; // Don't show modal if already accepted
    }
    
    // Show modal on page load
    bsModal.show();
    
    // Accept button handler
    acceptBtn.addEventListener('click', function() {
        // Set session cookie
        document.cookie = cookieName + '=true; path=/; SameSite=Lax';
        
        // Close modal
        bsModal.hide();
    });
    
    // Decline button handler
    declineBtn.addEventListener('click', function() {
        // Redirect to decline link
        window.location.href = declineLink;
    });
    
    // Helper function to get cookie value
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
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
