<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
namespace Elementor;

use Elementor\Group_Control_Image_Size;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;
use Elementor\Icons_Manager;

?>

<!-- new Vertical tab -->
<div class="d-flex align-items-start faq_style_1">
    <div class="amt_faq_left">
        <div class="nav amt_faq_nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php
            $item = 1;$k =1;
            foreach( $data['faq-category-selected'] as $faq_cat_id):
                if ($faq_cat_id['faq-category']){
                    $faq_cat_data= get_term($faq_cat_id['faq-category']);
                    $faq_cat_name = $faq_cat_data->name;
                }else $faq_cat_name = 'All';
                ?>
            <button class="nav-link <?php echo ($k==1) ? 'active': '';?>" id="item-<?php echo $faq_cat_id['faq-category'];?>-tab" data-bs-toggle="pill" data-bs-target="#tab-item-<?php echo $faq_cat_id['faq-category'];?>" type="button" role="tab" aria-controls="tab-item-<?php echo $faq_cat_id['faq-category'];?>" aria-selected="<?php echo ($k==1) ? 'true': 'false';?>"><?php echo $faq_cat_name;?></button>
            <?php $k++;
            endforeach; ?>
        </div>
        <div class="faq_contact_us faq_desktop">
            <p>Didny’t find it?</p>
            <div class="faq_contack_mail">
            Contact us directly: <a href="mailto:'business@ogo.com'"><?php echo wp_kses_post($data['faq_email']); ?></a>
            </div>
        </div>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <?php
        $j =1;
        foreach($data['faq-category-selected'] as $faq_cat_id):?>
            <div class="tab-pane fade <?php echo ($j ==1) ? 'show active': '' ;?>" id="tab-item-<?php echo $faq_cat_id['faq-category'];?>" role="tabpanel" aria-labelledby="item-<?php echo $faq_cat_id['faq-category'];?>-tab">
                <div class="accordion" id="accordion-<?php echo $faq_cat_id['faq-category'];?>">
                    <?php
                        $current_cat_id  = intval($faq_cat_id['faq-category']);
                        $args = array(
                            'post_type'=>'ogo_faq',
                            'orderby' => $faq_cat_id['faq-post-sorting'],
                            'order' => $faq_cat_id['faq-post-order'],
                            'post_status' => 'publish',
                            'post__not_in'=> $faq_cat_id['faq-post-not-in'],
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'ogo_faq_category',
                                    'field' => 'term_id',
                                    'terms' => $current_cat_id,
                                )
                            )
                        );
                        //$query = new WP_Query( $args );
                        query_posts($args);
                        $i = 1;
                        //if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                        if (have_posts()) : while (have_posts()) : the_post();?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="item<?php echo $item;?>">
                                    <button class="accordion-button <?php echo ($i==1) ? '': 'collapsed';?>" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo $item;?>" aria-expanded="<?php echo ($i==1) ? 'true': 'false';?>"
                                            aria-controls="collapse<?php echo $item;?>">
                                        <?php the_title(); ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $item;?>" class="accordion-collapse collapse <?php echo ($i==1) ? 'show': '';?>"
                                     aria-labelledby="item<?php echo $item;?>" data-bs-parent="#accordion-<?php echo $faq_cat_id['faq-category'];?>">
                                    <div class="accordion-body">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;$item++;endwhile; else: ?>
                            <?php _e('No Posts Sorry.'); ?>
                        <?php endif; wp_reset_query();?>
                </div>
            </div>
        <?php $j++;
        endforeach; ?>
    </div>
    <div class="faq_contact_us faq_mobile">
            <p>Didny’t find it?</p>
            <div class="faq_contack_mail">
            Contact us directly: <a href="mailto:'business@ogo.com'"><?php echo wp_kses_post($data['faq_email']); ?></a>
            </div>
        </div>
</div>
