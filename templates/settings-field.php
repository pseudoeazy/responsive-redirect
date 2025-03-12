<?php
if (isset($_GET['id'])) {
    $rule = $this->get_rule($_GET['id']);
}

?>

<table class="form-table responsive-redirect-table">
    <thead>
        <tr>
            <th>Origin URL</th>
            <th>Redirect URL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><?= get_site_url(); ?>/</p>
                <p><input type="text" name="responsive_redirect_urls[origin_url]" value="<?= esc_attr($rule['origin_url'] ?? ''); ?>" placeholder="books/sample-book" /></p>
            </td>
            <td>
                <p><?= get_site_url(); ?>/</p>
                <p><input type="text" name="responsive_redirect_urls[redirect_url]" value="<?= esc_attr($rule['redirect_url'] ?? ''); ?>" placeholder="books/sample-book/mobile-page-url" /></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><label>Device Type</label></p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="desktop"
                        <?php checked($rule['device_type'] ?? '', 'desktop'); ?> />
                    Desktop
                </p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="tablet"
                        <?php checked($rule['device_type'] ?? '', 'tablet'); ?> />
                    Tablet
                </p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="mobile"
                        <?php checked($rule['device_type'] ?? '', 'mobile'); ?> />
                    Mobile
                </p>
            </td>

            <td>
                <p><label>Device Type</label></p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_desktop]" <?php checked($rule['redirect_device_desktop'] ?? '', 'on'); ?> /> Desktop</p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_tablet]" <?php checked($rule['redirect_device_tablet'] ?? '', 'on'); ?> /> Tablet</p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_mobile]" <?php checked($rule['redirect_device_mobile'] ?? '', 'on'); ?> /> Mobile</p>
            </td>
        </tr>
    </tbody>
</table>