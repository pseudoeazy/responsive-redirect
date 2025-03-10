<div class="wrap">

    <section>
        <h1 class="responsive-redirect__header">
            <span class="dashicons dashicons-image-rotate"></span><span>Responsive Redirect Settings</span>
        </h1>


        <form method="POST" action="">
            <table class="responsive-redirect-table">
                <thead>
                    <tr>
                        <th>Origin URL</th>
                        <th>Redirect URL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p><?php bloginfo('wpurl'); ?>/</p>
                            <p><input class="" type="text" name="origin_url" placeholder="books/sample-book" /></p>
                        </td>
                        <td>
                            <p><?php bloginfo('wpurl'); ?>/</p>
                            <p><input type="text" name="origin_url" placeholder="books/sample-book/mobile-page-url" /></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p scope="row">
                                <label for="featured">Device Type</label>
                            </p>
                            <p><input type="checkbox" name="desktop" />Desktop</p>
                            <p><input type="checkbox" name="tablet" />Tablet</p>
                            <p><input type="checkbox" name="mobile" />Mobile</p>
                        </td>
                        <td>
                            <p scope="row">
                                <label for="featured">Device Type</label>
                            </p>
                            <p><input type="checkbox" name="desktop" />Desktop</p>
                            <p><input type="checkbox" name="tablet" />Tablet</p>
                            <p><input type="checkbox" name="mobile" />Mobile</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td></td>
                        <td>

                            <button class="button-primary responsive-redirect__button" type="submit">
                                <span class="dashicons dashicons-plus-alt2"></span> Save Options
                            </button>


                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>

    <section class="responsive-redirect-list">
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
                <tr>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book</td>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book/mobile-page-url</td>
                    <td class="actions">
                        <a href="#" class="button-secondary">Edit</a>
                        <form><input type="submit" value="Delete" class="button button-error"></form>
                    </td>
                </tr>
                <tr>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book</td>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book/mobile-page-url</td>
                    <td class="actions">
                        <a href="#" class="button-secondary">Edit</a>
                        <form><input type="submit" value="Delete" class="button button-error"></form>
                    </td>
                </tr>
                <tr>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book</td>
                    <td><?php bloginfo('wpurl'); ?>/books/sample-book/mobile-page-url</td>
                    <td class="actions">
                        <a href="#" class="button-secondary">Edit</a>
                        <form><input type="submit" value="Delete" class="button button-error"></form>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="tablenav">
            <div class="tablenav-pages">
                <span class="displaying-num">Displaying 1-20 of 69</span>
                <span class="page-numbers current">1</span>
                <a href="#" class="page-numbers">2</a>
                <a href="#" class="page-numbers">3</a>
                <a href="#" class="next page-numbers">&raquo;</a>
            </div>
        </div>
    </section>

</div>