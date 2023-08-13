<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;

//var_dump($data);
?>
<style>
        .amt_process_section_2{
                height: 654px;
                background-image: url("<?php echo OgoTheme_Helper::get_img('service_line_2.svg');; ?>") ;
                background-size: contain;
                background-position: center center;
                background-repeat: no-repeat;
                position: relative;
        }
        .amt_process_section_2 .amt_process {
                width: 100%;
                text-align: center;
        }
        .amt_process_section_2 .amt_process .process_subtitle h4 {
                font-size: 30px;
                color: #53AFEE;
                display: inline-block;
                border-bottom: 2px solid #53AFEE;
                margin-bottom: 3px;
                font-weight: 500;
        }
        .amt_process_section_2 .amt_process .process_title h3{
                font-size: 50px;
                font-weight: 700;
        }
        .amt_process_section_2 .process_box_title h4 {
                font-size: 30px;
                font-weight: 700;
                line-height: 36px;
                color: blue;
                font-family: 'Space Grotesk';
        }
        .amt_process_section_2 .amt_process .process_content p{
                font-size: 20px;
                font-weight: 400;
        }
        .amt_process_section_2 .process_btn {
                padding: 15px 0;
        }
        .amt_process_section_2 .process_btn a {
                display: inline-block;
                padding: 13px 50px;
                background: #1F0D3C;
                color: #FFF;
                border-radius: 16px;
        }
        .amt_process_section_2 .process_btn a:hover{
                background:#53AFEE;
                /* color: #1F0D3C; */
                transition: all ease 0.3s;
                /* border: 1px solid #1F0D3C; */
        }
        /* Process Box  */
        .amt_process_section_2 .process_box {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
        }
        .amt_process_section_2 .process-media-icon{
                display: flex;
                justify-content: center;
        }
        .amt_process_section_2 .process-media-icon i{
                display: flex;
                color: #53AFEE;
                background: #fff;
                height: 20px;
                padding: 20px;
                width: 20px;
                border-radius: 50%;
                margin: 0 0 30px 0;
                justify-content: center;
                align-items: center;
        }
        .amt_process_section_2 .process_box_1,
        .amt_process_section_2 .process_box_2,
        .amt_process_section_2 .process_box_3,
        .amt_process_section_2 .process_box_4{
                max-width: 24%;
                text-align: center;
        }
        .amt_process_section_2 .process_box_1 {
                position: absolute;
                bottom: 15%;
                left: 0;
        }
        .amt_process_section_2 .process_box_2{
                position: absolute;
                bottom: -2%;
                left: 25%;
        }
        .amt_process_section_2 .process_box_3{
                position: absolute;
                bottom: 16%;
                left: 51%;
        }
        .amt_process_section_2 .process_box_4{
                position: absolute;
                bottom: 2%;
                left: 76%;
        }
@media (min-width: 1200px) and (max-width: 1399.98px){
        .amt_process_section_2 .process_box_1 {
                position: absolute;
                bottom: 10%;
                left: 0;
        }
        .amt_process_section_2 .process_box_2{
                position: absolute;
                bottom: -8%;
                left: 25%;
        }
        .amt_process_section_2 .process_box_3{
                position: absolute;
                bottom: 10%;
                left: 50%;
        }
        .amt_process_section_2 .process_box_4{
                position: absolute;
                bottom: -3%;
                left: 75%;
        }
}
@media (min-width: 992px) and (max-width: 1199.98px){
        .amt_process_section_2 .process_box_1 {
                position: absolute;
                bottom: 3%;
                left: 0;
        }
        .amt_process_section_2 .process_box_2{
                position: absolute;
                bottom: -11%;
                left: 25%;
        }
        .amt_process_section_2 .process_box_3{
                position: absolute;
                bottom: 2%;
                left: 50%;
        }
        .amt_process_section_2 .process_box_4{
                position: absolute;
                bottom: -2%;
                left: 75%;
        }
}
@media (min-width: 768px) and (max-width: 991.98px){
        .amt_process_section_2 .amt_process {
                width: 100%;
                text-align: left;
        }
        .amt_process_section_2{
                background-image: none;
                height: auto;
        }
        .amt_process_section_2 .process-media-icon{
                justify-content: flex-start;
        }
        .amt_process_section_2 .process_box_1,
        .amt_process_section_2 .process_box_2,
        .amt_process_section_2 .process_box_3,
        .amt_process_section_2 .process_box_4 {
                position: unset;
                margin: 20px 0 0 0;
                max-width: 100%;
                width: 50%;
                text-align: left;
        }
        
}
 @media (max-width: 767.98px) {
        .amt_process_section_2 .amt_process {
                width: 100%;
                text-align: left;
        }
        .amt_process_section_2{
                background-image: none;
                height: auto;
        }
        .amt_process_section_2 .process-media-icon{
                justify-content: flex-start;
        }
        .amt_process_section_2 .process_box_1,
        .amt_process_section_2 .process_box_2,
        .amt_process_section_2 .process_box_3,
        .amt_process_section_2 .process_box_4 {
                position: unset;
                margin: 20px 0 0 0;
                max-width: 100%;
                width: 1000%;
                text-align: left;
        }
}
</style>

<div class="amt_process_section_2">
        <div class="amt_process">
                <div class="process_subtitle">
                        <h4><?php echo wp_kses_post($data['process_subtitle']); ?></h4>
                </div>
                <div class="process_title">
                        <h3><?php echo wp_kses_post($data['process_title']); ?></h3>
                </div>
                <div class="process_content">
                        <p><?php echo wp_kses_post($data['process_content']); ?></p>
                </div>
                <?php
                        if($data['process_btn_controll'] == 'yes') {?>
                                <div class="process_btn">
                                        <a href="<?php echo wp_kses_post($data['process_button_url']); ?>"><?php echo wp_kses_post($data['process_button']); ?></a>
                                </div>
                       <?php };
                ?>
        </div>
        <!-- Boxess start here -->
        <div class="process_box">
                <div class="process_box_1">
                        <div class="process-media-icon">
                                <i class="<?php echo esc_attr( $data['process_icon1']['value'] );?>" aria-hidden="true"></i>
                        </div>
                        <div class="process_box_title">
                                <h4><?php echo wp_kses_post($data['process_box_title1']); ?></h4>
                        </div>
                        <div class="process_box_content">
                                <p><?php echo wp_kses_post($data['process_box_content1']); ?></p>
                        </div>
                </div>
                <div class="process_box_2">
                        <div class="process-media-icon">
                                <i class="<?php echo esc_attr( $data['process_icon2']['value'] );?>" aria-hidden="true"></i>
                        </div>
                        <div class="process_box_title">
                                <h4><?php echo wp_kses_post($data['process_box_title2']); ?></h4>
                        </div>
                        <div class="process_box_content">
                                <p><?php echo wp_kses_post($data['process_box_content2']); ?></p>
                        </div>
                </div>
                <div class="process_box_3">
                        <div class="process-media-icon">
                                <i class="<?php echo esc_attr( $data['process_icon3']['value'] );?>" aria-hidden="true"></i>
                        </div>
                        <div class="process_box_title">
                                <h4><?php echo wp_kses_post($data['process_box_title3']); ?></h4>
                        </div>
                        <div class="process_box_content">
                                <p><?php echo wp_kses_post($data['process_box_content3']); ?></p>
                        </div>
                </div>
                <div class="process_box_4">
                        <div class="process-media-icon">
                                <i class="<?php echo esc_attr( $data['process_icon4']['value'] );?>" aria-hidden="true"></i>
                        </div>
                        <div class="process_box_title">
                                <h4><?php echo wp_kses_post($data['process_box_title4']); ?></h4>
                        </div>
                        <div class="process_box_content">
                                <p><?php echo wp_kses_post($data['process_box_content4']); ?></p>
                        </div>
                </div>
        </div>
</div>