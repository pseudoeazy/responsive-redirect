<?php
// Get current data
$responsive_rules = $this->get_rules();

// Check POST request to delete responsive_rule
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['responsive_redirect_nonce'])) {
    if (!wp_verify_nonce($_POST['responsive_redirect_nonce'], 'delete_responsive_redirect')) {
        wp_die('Unauthorized request');
    }

    $valid_key = isset($_POST['origin_url']) ? sanitize_text_field($_POST['origin_url']) : null;
    if ($valid_key) {
        $this->delete_redirect_rule($valid_key);
    }
}

?>




<section class="wrap responsive-redirect-list">
    <h2>Redirected Page List</h2>
    <table class="widefat">
        <thead>
            <tr>
                <th>Origin URL</th>
                <th>Redirect URL</th>
                <th>Actions <span class="dashicons dashicons-admin-generic"></span></th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($responsive_rules) > 0): ?>
                <?php foreach ($responsive_rules as $rule): ?>
                    <tr>
                        <td>
                            <p><strong>Device Type: </strong> <span><?= esc_attr($rule['device_type']) ?? '' ?></span></p>
                            <p><?= esc_url(get_site_url() . "/" . $rule['origin_url']) ?? ''; ?></p>
                        </td>
                        <td>
                            <p><?= esc_url(get_site_url() . "/" . $rule['redirect_url']) ?? ''; ?></p>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="options-general.php?page=responsive-redirect-options&id=<?= esc_attr($rule['origin_url']) ?? '' ?>" class="button-secondary">Edit</a>
                                <form method="POST" action="">
                                    <?php wp_nonce_field('delete_responsive_redirect', 'responsive_redirect_nonce'); ?>
                                    <input type="hidden" name="origin_url" value="<?= esc_attr($rule['origin_url']) ?? '' ?>" />
                                    <input type="submit" value="Delete" class="button button-error">
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">
                        <div class="redirect-no-rule">
                            <h3>You have not added any redirection rules yet</h3>
                            <a href="options-general.php?page=responsive-redirect-options" class="button-primary">Add New Redirection Rule</a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</section>