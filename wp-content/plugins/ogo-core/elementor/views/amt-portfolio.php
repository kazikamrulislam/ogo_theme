<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;

$prefix      = OGO_CORE_THEME_PREFIX;
$thumb_size  = 'ogo-size4';

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} else if (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$args = array(
    'post_type'      => 'ogo_portfolio',
    'posts_per_page' => $data['number'],
    'orderby'        => $data['orderby'],
    'paged' => $paged
);

if (!empty($data['cat'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'ogo_portfolio_category',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

switch ($data['orderby']) {
    case 'title':
    case 'menu_order':
        $args['order'] = 'ASC';
        break;
}

$query = new WP_Query($args);
$temp = OgoTheme_Helper::wp_set_temp_query($query);

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>

<div class="amt-portfolio-section">
    <div class="portfolio-loadmore">
        <div class="row amt-portfolio-item <?php echo esc_attr($data['item_space']); ?>">
            <?php $i = $data['delay'];
            $j = $data['duration'];
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $id                = get_the_id();
                    $portfolio_client  = get_post_meta($id, 'ogo_portfolio_client', true);
            ?>
                    <div class="<?php echo esc_attr($col_class); ?>">
                        <div class="porfolio-thums">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail($thumb_size);
                                } else {
                                    echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
                                }
                                ?>
                            </a>
                            <div class="portfolio-content <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
                                <div class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                <?php if ($data['content_display'] == 'yes') { ?>
                                    <div class="portfolio-client">
                                        <p>For - <?php echo wp_kses_post($portfolio_client); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php $i = $i + 0.2;
                    $j = $j + 0.1;
                } ?>
            <?php } ?>
        </div>

    </div>
    <?php
    $args['number'] = $data['number'];
    $args['cat'] = $data['cat'];
    $args['col_lg'] = $data['col_lg'];
    $args['col_xs'] = $data['col_xs'];
    $args['col_sm'] = $data['col_sm'];
    $args['col_lg'] = $data['col_lg'];
    $args['content_display'] = $data['content_display'];
    $args['animation'] = $data['animation'];
    $args['animation_effect'] = $data['animation_effect'];
    $args['delay'] = $data['delay'];
    $args['duration'] = $data['duration'];
    $args['see_button_text'] = $data['see_button_text'];
    $args['limitperclick'] = $data['see_button_text'];

    $encoded_data = wp_json_encode($args); ?>

    <?php if ($data['more_items_display'] == 'yes') { ?>
        <?php if ($data['more_button'] == 'show') { ?>
            <?php if (!empty($data['see_button_text'])) { ?>
                <div class="portfolio-button"><a id="portfolio_loadMore" class="button-style-1" href="#" data-loadmore='<?php echo esc_attr($encoded_data); ?>'><?php echo esc_html($data['see_button_text']); ?></a></div>
            <?php } ?>
        <?php } else { ?>
            <?php OgoTheme_Helper::pagination(); ?>
    <?php }
    } ?>
    <?php OgoTheme_Helper::wp_reset_temp_query($temp); ?>
</div>