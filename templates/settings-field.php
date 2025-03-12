<?php
if (isset($_GET['id'])) {
    $rule = $this->get_rule($_GET['id']);
}

?>

<table class="widefat responsive-redirect-table">
    <thead>
        <tr>
            <th>Origin URL</th>
            <th>Redirect URL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p class="site_url"><?php echo esc_url(get_site_url()); ?>/</p>
                <p><input type="text" id="orignUrl" name="responsive_redirect_urls[origin_url]" value="<?php echo esc_attr($rule['origin_url'] ?? ''); ?>" placeholder="books/sample-book" /></p>
            </td>
            <td>
                <p class="site_url"><?php echo esc_url(get_site_url()); ?>/</p>
                <p><input type="text" id="redirectUrl" name="responsive_redirect_urls[redirect_url]" value="<?php echo esc_attr($rule['redirect_url'] ?? ''); ?>" placeholder="books/sample-book/mobile-page-url" /></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><label>On Device Type</label></p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="desktop"
                        <?php checked($rule['device_type'] ?? '', 'desktop'); ?>
                        class="rr_device_type" />
                    Desktop
                </p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="tablet"
                        <?php checked($rule['device_type'] ?? '', 'tablet'); ?>
                        class="rr_device_type" />
                    Tablet
                </p>

                <p>
                    <input type="radio" name="responsive_redirect_urls[device_type]" value="mobile"
                        <?php checked($rule['device_type'] ?? '', 'mobile'); ?>
                        class="rr_device_type" />
                    Mobile
                </p>
            </td>

            <td>
                <p><label>Redirect To: Device Type</label></p>
                <p><input type="checkbox" class="rr_redirect_device_type" name="responsive_redirect_urls[redirect_device_desktop]" <?php checked($rule['redirect_device_desktop'] ?? '', 'on'); ?> /> Desktop</p>
                <p><input type="checkbox" class="rr_redirect_device_type" name="responsive_redirect_urls[redirect_device_tablet]" <?php checked($rule['redirect_device_tablet'] ?? '', 'on'); ?> /> Tablet</p>
                <p><input type="checkbox" class="rr_redirect_device_type" name="responsive_redirect_urls[redirect_device_mobile]" <?php checked($rule['redirect_device_mobile'] ?? '', 'on'); ?> /> Mobile</p>
            </td>
        </tr>
    </tbody>
</table>