# Responsive Redirect

**Contributors:** [pseudoeazy](https://profiles.wordpress.org/pseudoeazy/)
**Donate link:** [PayPal](https://paypal.me/eazyisrael?country.x=PH&locale.x=en_US)
**Requires at least:** 5.0
**Tested up to:** 6.7
**Requires PHP:** 7.4
**Stable tag:** 1.0.0
**License:** GPLv2 or later
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html

## Description

The **Responsive Redirect Plugin** allows WordPress site owners to **redirect users based on device type (mobile, tablet, or desktop)**. This ensures that users always land on the most optimized version of the site for their screen size.

**How It Works:**

- Mobile users visiting `example.com` are **automatically redirected** to `example.com/mobile`.
- If a mobile user switches to desktop, they are **redirected back** to `example.com`.
- This ensures an optimized browsing experience tailored to each user's device.

### Features:

- Redirect users based on **mobile, tablet, or desktop** detection.
- **Automatic Mobile/Desktop redirection** – based on device type.
- **Two-Way Redirection** – Ensures users always view the correct version.
- **Custom Redirect Rules** – Define your own conditions for specific pages.
- Works with **any WordPress theme**.
- SEO-friendly redirects using **302 status codes**.
- Fully compatible with modern WordPress versions.
- Support for mobile, tablet, and desktop redirection.
- Simple configuration in the WordPress admin panel.
- Lightweight and performance-friendly.

📥 **Get Started Now** and enhance your website's mobile-friendliness!

## Installation

### Automatic Installation

1. Log in to your WordPress dashboard.
2. Navigate to **Plugins → Add New**.
3. Search for "Responsive Redirect".
4. Click **Install Now**, then **Activate**.

### Manual Installation

1. Download the plugin ZIP file.
2. Go to your WordPress dashboard and navigate to **Plugins → Add New**.
3. Click **Upload Plugin**, choose the ZIP file, and click **Install Now**.
4. Activate the plugin after installation.

### FTP Installation

1. Extract the ZIP file to your local computer.
2. Upload the extracted `responsive-redirect` folder to the `/wp-content/plugins/` directory via FTP.
3. Activate the plugin from the **Plugins** page in WordPress.

## Usage

1. After activation, go to **Settings → Responsive Redirect**.
2. Configure the redirect rules:
   - Choose redirect URLs for **mobile, tablet, and desktop users**.
3. Save settings, and your redirects will be active!

## Frequently Asked Questions

### 1. How does this plugin detect devices?

The plugin uses **mobiledetect** library to determine whether the visitor is on a mobile, tablet, or desktop device.

### 2. Will this affect SEO?

No, the plugin uses **SEO-friendly** 302 redirects, depending on your settings.

### 3. Can I disable redirection for specific pages?

Yes! You can exclude specific pages from redirects in the plugin settings.

### 4. Does this work with caching plugins?

Yes, but if you have aggressive caching enabled, you might need to **clear cache** after changing redirect rules.

## Changelog

### 1.0.0

- Initial release
- Basic device-based redirection
- Admin settings page

## Support

For support, visit [chibuz.com](https://www.chibuz.com/projects/responsive-redirect) or create a support ticket on the [WordPress plugin directory](https://wordpress.org/plugins/).

## License

This plugin is open-source software licensed under the **GPLv2 or later**. See the full license at [GNU.org](https://www.gnu.org/licenses/gpl-2.0.html).
