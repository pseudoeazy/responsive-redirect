<div class="wrap">

    <section>
        <h1 class="responsive-redirect__header"><span class="dashicons dashicons-image-rotate"></span><span>Responsive Redirect Settings</span></h1>

        <div><button class="button-secondary responsive-redirect__button" type="button"><span class="dashicons dashicons-plus-alt2"></span> Add Redirect</button></div>
        <form method="POST" action="">
            <table class="wp-clean-table">
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
                            <input type="submit" name="save" value="Save Options"
                                class="button-primary" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>

    <section>
        <h2>Redirected Page List</h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Favorite Holiday</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Favorite Holiday</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Brad Williams</td>
                    <td>Halloween</td>
                </tr>
                <tr>
                    <td>Ozh Richard</td>
                    <td>Talk Like a Pirate</td>
                </tr>
                <tr>
                    <td>Justin Tadlock</td>
                    <td>Christmas</td>
                </tr>
            </tbody>
        </table>

        <div class="tablenav">
            <div class="tablenav-pages">
                <span class="displaying-num">Displaying 1-20 of 69</span>

                <span class="page-numbers current">1</span>
                <a href="#" class="page-numbers">2</a>
                <a href="#" class="page-numbers">3</a>
                <a href="#" class="page-numbers">4</a>
                <a href="#" class="next page-numbers">&raquo;</a>
            </div>
        </div>
    </section>

</div>