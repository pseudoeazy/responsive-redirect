<div class="wrap">
    <h1>Responsive Redirect Settings</h1>
    <form method="POST" action="options.php">
        <?php
        settings_fields('responsive_redirect_options');
        do_settings_sections($this->page_url);
        ?>
        <div class="form-footer">
            <?php
            submit_button('Save Options', 'primary', 'submit', false);
            ?>
        </div>
    </form>
</div>