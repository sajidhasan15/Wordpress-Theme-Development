<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add custom admin menu
function add_webexplore_admin_menu() {
    add_menu_page(
        __('Web Explore Settings', 'webexplore'), // Page title
        'Web Explore',                           // Menu title
        'manage_options',                        // Capability
        'webexplore-settings',                   // Menu slug
        'webexplore_menu_page_callback',         // Callback function
        'dashicons-category',                    // Icon
        1                                        // Position
    );
}
add_action('admin_menu', 'add_webexplore_admin_menu');

// Callback function for the custom menu page
function webexplore_menu_page_callback() {
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['webexplore_settings_nonce'])) {
        if (wp_verify_nonce($_POST['webexplore_settings_nonce'], 'save_webexplore_settings')) {
            update_option('webexplore_bg_color', sanitize_hex_color($_POST['bg_color']));
            update_option('webexplore_text_color', sanitize_hex_color($_POST['text_color']));
            update_option('webexplore_hover_color', sanitize_hex_color($_POST['hover_color']));

            echo '<div class="updated"><p>Settings saved successfully.</p></div>';
        }
    }

    // Get current settings
    $bg_color = get_option('webexplore_bg_color', '#ffffff');
    $text_color = get_option('webexplore_text_color', '#000000');
    $hover_color = get_option('webexplore_hover_color', '#0073aa');

    // Output the settings form
    echo '<div class="wrap">
        <h1>' . __('Web Explore Theme Settings', 'webexplore') . '</h1>
        <form method="POST">
            ' . wp_nonce_field('save_webexplore_settings', 'webexplore_settings_nonce') . '
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="bg_color">' . __('Background Color', 'webexplore') . '</label></th>
                    <td><input type="color" name="bg_color" id="bg_color" value="' . esc_attr($bg_color) . '"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="text_color">' . __('Text Color', 'webexplore') . '</label></th>
                    <td><input type="color" name="text_color" id="text_color" value="' . esc_attr($text_color) . '"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="hover_color">' . __('Hover Color', 'webexplore') . '</label></th>
                    <td><input type="color" name="hover_color" id="hover_color" value="' . esc_attr($hover_color) . '"></td>
                </tr>
            </table>
            <p class="submit">
                <button type="submit" class="button button-primary">' . __('Save Settings', 'webexplore') . '</button>
            </p>
        </form>
    </div>';
}

// Apply custom styles to the frontend
function webexplore_apply_custom_styles() {
    $bg_color = get_option('webexplore_bg_color', '#ffffff');
    $text_color = get_option('webexplore_text_color', '#000000');
    $hover_color = get_option('webexplore_hover_color', '#0073aa');

    echo "<style>
        body { background-color: {$bg_color}; color: {$text_color}; }
        a:hover { color: {$hover_color}; }
    </style>";
}
add_action('wp_head', 'webexplore_apply_custom_styles');