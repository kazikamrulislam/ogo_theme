<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Group_Control_Image_Size;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;
?>

<style>
    .relative-banner-img {
        position: relative;
    }

    .relative-banner-img img {
        position: relative;
        z-index: 9;
    }
    /* .relative-banner-img img {
        min-height: 706px;
        max-width: 535px;
        height: 706px;
        width: 535px;
    } */

    .abs-banner-awards {
        position: absolute;
        display: flex;
        top: 150px;
        left: 440px;
        padding: 10px 20px;
        background: #FFFFFF;
        opacity: 0.9;
        box-shadow: 0px 30px 80px rgba(83, 175, 238, 0.16);
        border-radius: 16px;
        z-index: 10;
    }

    .awards-meta h2 {
        font-family: 'Space Grotesk';
        font-style: normal;
        font-weight: 700;
        font-size: 50px;
        line-height: 64px;
        color: #1F0D3C;
        margin: 0;
    }

    .awards-meta p {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 36px;
        margin: 0;
        color: #676E89;
    }

    .abs-banner-bg-shape {
        position: absolute;
        top: 110px;
        z-index: 0;
    }

    .abs-img-gallary {
        position: absolute;
        background: #FFFFFF;
        box-shadow: 0px 30px 80px rgba(83, 175, 238, 0.16);
        border-radius: 16px;
        padding: 20px 30px;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .abs-img-gallary .wp-post-image2 {
        margin: -12px;
        height: 84px;
        width: 84px;
        border-radius: 50%;
        border: 5px solid #fff;
    }

    .abs-img-gallary h2 {
        color: #fff;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 32px;
        line-height: 100%;
        background-color: #676E89;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .awards-meta {
        padding-left: 20px;
    }

    @media (max-width: 1200px) {
        .abs-banner-bg-shape {
            top: 36px;
        }

        .abs-banner-awards {
            top: 50px;
            left: 390px;
        }
    }

    @media (max-width: 1024px) {
        .abs-banner-bg-shape {
            top: 36px;
        }

        .abs-banner-awards {
            top: 50px;
            left: 336px;
        }
    }

    @media (max-width: 992px) {
        .abs-banner-bg-shape {
            top: -24px;
        }

        .abs-banner-bg-shape svg {
            width: 340px;
        }

        .abs-banner-awards {
            top: 50px;
            left: 260px;
        }
    }

    @media (max-width: 768px) {
        .abs-banner-awards {
            top: 90px;
            left: 340px;
        }

        .abs-banner-awards svg {
            width: 43px;
            height: auto;
        }

        .awards-meta p {
            font-size: 16px;
            line-height: 1.6;
        }

        .awards-meta h2 {
            font-size: 32px;
            line-height: 100%;
        }
    }
</style>


<div class="banner-img-holder">
    <div class="row">
        <div class="col-12">
            <div class="relative-banner-img">
                <?php if (!empty($data['image']['id'])) {
                    echo wp_get_attachment_image($data['image']['id'], 'full');
                } else {
                    echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img('problem.png') . '" alt="' . get_the_title() . '">';
                } ?>
                <!-- <img src="./h1-team-img-4 1.png" alt="A banner image"> -->
                <div class="abs-banner-bg-shape">

                    <?php if ($data['bg-shape']  == 'yes') { ?>
                        <div class="bg-shape">
                            <?php if (!empty($data['bg-shape']['id'])) {
                                Group_Control_Image_Size::print_attachment_image_html($data, 'bg-shape');
                            } else {
                                echo  '<svg width="543" height="605" viewBox="0 0 543 605" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_321_9)">
                                <path d="M539 597H280V338C314.014 338 347.709 344.718 379.058 357.726C410.513 370.735 438.983 389.821 463.081 413.813C487.179 437.804 506.158 466.38 519.167 497.836C532.282 529.291 539 562.986 539 597Z" fill="#53AFEE"/>
                                <path d="M280 597C211.331 597 145.329 569.703 96.8127 521.081C48.2968 472.565 21 406.669 21 338H280V597Z" fill="#FBFDFF"/>
                                <path d="M539 79V338H280C280 269.331 307.297 203.435 355.813 154.919C404.435 106.297 470.331 79 539 79Z" fill="#676E89"/>
                                <path d="M4 0H184L4 180V0Z" fill="#53AFEE"/>
                                </g>
                                <defs>
                                <filter id="filter0_d_321_9" x="0" y="0" width="543" height="605" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_321_9"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_321_9" result="shape"/>
                                </filter>
                                </defs>
                                </svg>
                                ';
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <!-- <img src="./Patterns Elements.svg" alt=""> -->
                </div>
                <div class="abs-banner-awards">

                    <?php if ($data['prize-icon-display']  == 'yes') { ?>
                        <div class="award-icon">
                            <?php if (!empty($data['prize-icon']['id'])) {
                                Group_Control_Image_Size::print_attachment_image_html($data, 'prize-icon');
                            } else {
                                echo  '<svg width="53" height="76" viewBox="0 0 53 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2428 20.2065C20.5555 20.2065 23.4148 18.0067 24.3993 14.8755C25.0783 12.7159 27.9217 12.7159 28.6007 14.8755C29.5852 18.0067 32.4445 20.2065 35.7572 20.2065C36.7821 20.2065 37.5469 20.8371 37.8579 21.8262C38.1708 22.8213 37.9152 23.8667 37.0271 24.5335C34.4007 26.5056 33.3416 29.9543 34.322 33.0726C34.6839 34.2239 34.2507 35.2097 33.4912 35.7799C32.7441 36.3409 31.8085 36.4235 30.9513 35.7799C28.3031 33.7915 24.6969 33.7915 22.0487 35.7799C21.1915 36.4235 20.2559 36.3409 19.5088 35.7799C18.7493 35.2097 18.3161 34.2239 18.678 33.0726C19.6584 29.9543 18.5993 26.5056 15.9729 24.5335C15.0848 23.8667 14.8292 22.8213 15.1421 21.8262C15.4531 20.8371 16.2179 20.2065 17.2428 20.2065Z" fill="#53AFEE"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M26.5 53.0233C41.1355 53.0233 53 41.1536 53 26.5116C53 11.8697 41.1355 0 26.5 0C11.8645 0 0 11.8697 0 26.5116C0 41.1536 11.8645 53.0233 26.5 53.0233ZM33.6565 13.2845C31.4217 6.17648 21.5783 6.17648 19.3435 13.2845C19.0249 14.2979 18.147 14.9042 17.2428 14.9042C9.79078 14.9042 7.09459 24.4969 12.7915 28.7743C13.5765 29.3637 13.9449 30.4554 13.6222 31.4816C12.5273 34.9642 13.9316 38.2219 16.3274 40.0208C18.7356 41.8289 22.273 42.241 25.2301 40.0208C25.9933 39.4477 27.0067 39.4477 27.7699 40.0208C30.727 42.241 34.2644 41.8289 36.6726 40.0208C39.0683 38.2219 40.4727 34.9642 39.3778 31.4816C39.0551 30.4554 39.4235 29.3637 40.2085 28.7743C45.9054 24.4969 43.2092 14.9042 35.7572 14.9042C34.853 14.9042 33.9751 14.2979 33.6565 13.2845Z" fill="#53AFEE"/>
                        <path d="M26.5 58.3256C34.6446 58.3256 42.074 55.2624 47.7 50.2248V66.7339C47.7 72.2632 47.7 75.0279 45.9369 75.8168C44.1739 76.6056 42.0162 74.8064 37.7009 71.208L34.3839 68.442C30.6218 65.3049 28.7407 63.7363 26.5 63.7363C24.2593 63.7363 22.3782 65.3049 18.6161 68.442L15.2991 71.208C10.9838 74.8064 8.82612 76.6056 7.06306 75.8168C5.3 75.0279 5.3 72.2632 5.3 66.7339V50.2248C10.926 55.2624 18.3554 58.3256 26.5 58.3256Z" fill="#53AFEE"/>
                        </svg>';
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <!-- <img src="./Award Icon11.svg" alt=""> -->
                    <div class="awards-meta">
                        <h2><?php echo wp_kses_post($data['title']); ?>+</h2>
                        <p><?php echo wp_kses_post($data['sub-title']); ?></p>
                    </div>
                </div>
                <div class="abs-img-gallary">
                    <?php if (!empty($data['image1']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image1');
                    } else {
                        echo '<img class="wp-post-image2" src="' . OgoTheme_Helper::get_img('team-1.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                    <?php if (!empty($data['image2']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image2');
                    } else {
                        echo '<img class="wp-post-image2" src="' . OgoTheme_Helper::get_img('team-2.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                    <?php if (!empty($data['image3']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image3');
                    } else {
                        echo '<img class="wp-post-image2" src="' . OgoTheme_Helper::get_img('team-3.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                    <h2 class="wp-post-image2">+<?php echo wp_kses_post($data['title2']); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>