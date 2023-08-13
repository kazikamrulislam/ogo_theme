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
use Elementor\Icons_Manager;


?>

<style>
    .amt-single-pricing-box {
        background: #FFFFFF;
        border: 2px solid #F0F1F4;
        border-radius: 10px;
        padding: 40px;
    }
    .top-title h3 {
        font-family: 'Space Grotesk';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
        line-height: 38px;
        color: #53AFEE;
    }
    .top-desc p {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 30px;
        color: #676E89;
    }
    .consulting-part {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid #F0F1F4;
    }
    .consulting-part p {
        margin: 0;
        padding-bottom: 10px;
    }
    .single-service-price {
        display: flex;
        justify-content: space-between;
        padding-bottom: 20px;
    }
    .single-service-price label {
        display: flex;
        flex-direction: row-reverse;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 30px;
        color: #676E89;
    }
    .single-service-price input {
        margin: 0 10px 0 0;
    }
    .single-service-price span {
        font-size: 16px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 30px;
        text-align: right;
        color: #1F0D3C;
    }
    span#decrement {
        color: #fff;
        background: #53AFEE;
        height: 18px;
        width: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        font-size: 19px;
        border-radius: 5px;
        cursor: pointer;
    }
    span#increment {
        color: #fff;
        background: #53AFEE;
        height: 18px;
        width: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        margin-left: 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    label#countLabel {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 30px;
        text-align: center;
        color: #000000;
        height: 18px;
        width: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .pricing-list {
        border-bottom: 2px solid #F0F1F4;
    }
    .amt-single-price-btn a {
        color: #fff;
        background-color: #53AFEE;
        border-style: none;
        padding: 18px 50px;
        border-radius: 16px;
    }
    .amt-single-price-btn {
        text-align: center;
    }
    .total-price {
        display: flex;
        justify-content: space-between;
    }
</style>


<div class="amt-pricing-5">
    <div class="row">
        <div class="col">
            <div class="amt-single-pricing-box">
                <div class="amt-pricing-top">
                    <div class="top-title">
                        <h3><?php echo wp_kses_post($data['title']); ?></h3>
                    </div>
                    <div class="top-desc">
                        <p><?php echo wp_kses_post($data['description']); ?></p>
                    </div>
                </div>
                <div class="amt-pricing-middle">
                    <div class="consulting-part">
                        <p>consulting</p>
                        <p><span>Free</span></p>
                    </div>
                    <div class="pricing-list">

                        <form>
                            <div class="single-service-price">
                                <label for="item1"><?php echo wp_kses_post($data['service-name-1']); ?>
                                    <input class="pricing-input-field" type="checkbox" id="item1" value="<?php echo wp_kses_post($data['price1']); ?>" onclick="calcTotal()">
                                </label>
                                <span><?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?><?php echo wp_kses_post($data['price1']); ?></span>

                            </div>
                            <div class="single-service-price">
                                <label for="item2"><?php echo wp_kses_post($data['service-name-2']); ?>
                                    <input class="pricing-input-field" type="checkbox" id="item2" value="<?php echo wp_kses_post($data['price2']); ?>" onclick="calcTotal()">
                                </label>
                                <span><?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?><?php echo wp_kses_post($data['price2']); ?></span>
                            </div>
                            <div class="single-service-price">
                                <label for="item3"><?php echo wp_kses_post($data['service-name-3']); ?>
                                    <input class="pricing-input-field" type="checkbox" id="item3" value="<?php echo wp_kses_post($data['price3']); ?>" onclick="calcTotal()">
                                </label>
                                <span> <?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?><?php echo wp_kses_post($data['price3']); ?></span>

                            </div>
                            <div class="single-service-price">
                                <label for="item4"><?php echo wp_kses_post($data['service-name-4']); ?>
                                    <input class="pricing-input-field" type="checkbox" id="item4" value="<?php echo wp_kses_post($data['price4']); ?>" onclick="calcTotal()">
                                </label>
                                <span><?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?><?php echo wp_kses_post($data['price4']); ?></span>
                            </div>
                            <div class="single-service-price">
                                <label for="item5"><?php echo wp_kses_post($data['service-name-5']); ?>
                                    <input class="pricing-input-field" type="checkbox" id="item5" value="<?php echo wp_kses_post($data['price5']); ?>" onclick="calcTotal()">
                                </label>
                                <span><?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?><?php echo wp_kses_post($data['price5']); ?></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="pricing-bottom">
                    <div class="total-price">
                        <span>Total</span>
                        <p id="total"><?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?>0.00</p>
                    </div>

                    <div class="amt-single-price-btn">
                        <a href="<?php echo wp_kses_post($data['one_buttonurl']['url']); ?>"><?php echo wp_kses_post($data['button_one']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function calcTotal() {
        var itemTotal = 0;
        var items = document.getElementsByClassName("pricing-input-field");
        for (var i = 0; i < 11; i++) {
            if (items[i].checked) {
                itemTotal += (items[i].value * 1);
                document.getElementById("total").innerHTML = '<?php echo ('custom' !== $data['price_symbol']) ? wp_kses_post($data['price_symbol']) : wp_kses_post($data['price_symbol_custom']); ?>' + itemTotal + ".00";
            }
        }
    }
</script>