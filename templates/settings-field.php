<?php
$options = get_option('responsive_redirect_urls', []);
echo "<pre>";
print_r($options);
echo "</pre>";

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
                <p><input type="text" name="responsive_redirect_urls[origin_url]" value="<?= esc_attr($options['origin_url'] ?? ''); ?>" placeholder="books/sample-book" /></p>
            </td>
            <td>
                <p><?= get_site_url(); ?>/</p>
                <p><input type="text" name="responsive_redirect_urls[redirect_url]" value="<?= esc_attr($options['redirect_url'] ?? ''); ?>" placeholder="books/sample-book/mobile-page-url" /></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><label>Device Type</label></p>
                <p><input type="checkbox" name="responsive_redirect_urls[device_desktop]" <?php checked($options['device_desktop'] ?? '', 'on'); ?> /> Desktop</p>
                <p><input type="checkbox" name="responsive_redirect_urls[device_tablet]" <?php checked($options['device_tablet'] ?? '', 'on'); ?> /> Tablet</p>
                <p><input type="checkbox" name="responsive_redirect_urls[device_mobile]" <?php checked($options['device_mobile'] ?? '', 'on'); ?> /> Mobile</p>
            </td>
            <td>
                <p><label>Device Type</label></p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_desktop]" <?php checked($options['redirect_device_desktop'] ?? '', 'on'); ?> /> Desktop</p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_tablet]" <?php checked($options['redirect_device_tablet'] ?? '', 'on'); ?> /> Tablet</p>
                <p><input type="checkbox" name="responsive_redirect_urls[redirect_device_mobile]" <?php checked($options['redirect_device_mobile'] ?? '', 'on'); ?> /> Mobile</p>
            </td>
        </tr>
    </tbody>
</table>