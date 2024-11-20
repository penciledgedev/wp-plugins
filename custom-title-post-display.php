<?php
/*
Plugin Name: Custom Title Post Display
Description: A plugin to display a custom title, button, and a single post from a specified category or tag with shortcode.
Author: Uyi Moses
Author URI: https://uyimoses.com
Version: 1.3
*/

function display_custom_title_and_post($atts)
{
    // Attributes
    $atts = shortcode_atts(
        array(
            'category_or_tag' => '',
            'title' => 'Explore Beauty',
            'show_title' => 'true',
            'show_buttons' => 'true',
            'offset' => 0,
        ),
        $atts,
        'custom_title_post'
    );

    // Unique identifier for each shortcode instance
    $unique_id = 'custom-title-post-' . uniqid();

    // Arguments to get the post
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'offset' => intval($atts['offset']),
    );

    if (!empty($atts['category_or_tag'])) {
        if (term_exists($atts['category_or_tag'], 'category')) {
            $args['category_name'] = $atts['category_or_tag'];
        } elseif (term_exists($atts['category_or_tag'], 'post_tag')) {
            $args['tag'] = $atts['category_or_tag'];
        }
    }

    // Query to get the post
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        ob_start();
        if (filter_var($atts['show_title'], FILTER_VALIDATE_BOOLEAN)) {
?>
            <h2 class="<?php echo $unique_id; ?>-title" style="font-size: 32px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; text-align: center; font-family: 'Playfair Display', palatino; margin-top: 20px; position: relative;">
                <span style="border-top: 1px solid #000; position: absolute; top: 50%; left: 0; right: 0; transform: translateY(-50%);"></span>
                <span style="position: relative; z-index: 1; background: #fff; padding: 0 10px;">
                    <?php echo esc_html($atts['title']); ?>
                </span>
            </h2>
        <?php
        }
        if (filter_var($atts['show_buttons'], FILTER_VALIDATE_BOOLEAN)) {
        ?>
            <div class="<?php echo $unique_id; ?>-buttons" style="text-align: center; margin-top: 20px;">
                <button style="padding: 10px 20px; border: 1px solid #000; background: none; font-family: 'Playfair Display', palatino; cursor: pointer;">
                    HAIRSTYLES, HAIRCUTS, AND HAIR COLORS
                </button>
                <button style="padding: 10px 20px; border: 1px solid #000; background: none; font-family: 'Playfair Display', palatino; cursor: pointer; margin-left: 10px;">
                    MAKEUP
                </button>
            </div>
        <?php
        }
        ?>
        <div class="<?php echo $unique_id; ?>-container" style="display: flex; align-items: center; max-width: 1000px; margin: 20px auto; border: 1px solid #000; padding: 40px; box-sizing: border-box; flex-wrap: wrap;">
            <style>
                @media (max-width: 768px) {
                    .<?php echo $unique_id; ?>-container {
                        flex-direction: column;
                        text-align: center;
                    }

                    .<?php echo $unique_id; ?>-container>div {
                        width: 100% !important;
                        margin-right: 0 !important;
                    }
                }

                .<?php echo $unique_id; ?>-container {
                    display: flex;
                    align-items: center;
                }

                .<?php echo $unique_id; ?>-container h3 {
                    margin: 0;
                }

                .<?php echo $unique_id; ?>-container a img:hover {
                    filter: brightness(1.2);
                    transition: filter 0.3s ease;
                }
            </style>
            <div style="flex: 5; margin-right: 20px; box-sizing: border-box; width: 50%; padding: 20px;">
                <a href="<?php the_permalink(); ?>" style="text-decoration: none;">
                    <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: auto; object-fit: cover; aspect-ratio: 1 / 1;')); ?>
                </a>
            </div>
            <div style="flex: 4; text-align: left; width: 45%; box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; margin-top: auto; margin-bottom: auto;">
                <h3 style="font-size: 36px; color: #333; font-family: 'Playfair Display', palatino; margin-top: 20px;">
                    <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <p style="font-size: 16px; color: #666; margin-bottom: 20px;">
                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                </p>
            </div>
        </div>
<?php
        wp_reset_postdata();
        return ob_get_clean();
    } else {
        return '<p>No posts found.</p>';
    }
}
add_shortcode('custom_title_post', 'display_custom_title_and_post');
?>