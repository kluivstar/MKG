<?php
/**
 * MK GLAMZ WooCommerce Cart override.
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop py-12">
    <h1 class="font-display text-4xl md:text-7xl mb-12 text-primary uppercase">Shopping Bag</h1>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <!-- Cart Items List (Column 1-8) -->
            <div class="lg:col-span-8 space-y-6">
                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <div class="flex gap-6 p-6 border-b border-outline-variant/30 bg-surface-container-lowest rounded-none">
                            <div class="w-24 h-32 overflow-hidden bg-surface-container-low rounded-none">
                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                if ( ! $product_permalink ) {
                                    echo $thumbnail;
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                }
                                ?>
                            </div>
                            
                            <div class="flex-1 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-display text-lg uppercase font-semibold">
                                            <?php
                                            if ( ! $product_permalink ) {
                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                            } else {
                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                            }
                                            ?>
                                        </h3>
                                        <p class="text-xs text-on-surface-variant/75 mt-1">
                                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                                        </p>
                                    </div>
                                    <?php
                                    echo apply_filters(
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="text-on-surface-variant/50 hover:text-primary transition-colors remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span class="material-symbols-outlined text-xl">close</span></a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </div>
                                
                                <div class="flex justify-between items-center mt-4">
                                    <div class="quantity">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $min_qty = 1;
                                            $max_qty = 1;
                                        } else {
                                            $min_qty = 0;
                                            $max_qty = $_product->get_max_purchase_quantity();
                                        }

                                        $product_quantity = woocommerce_quantity_input(
                                            array(
                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                'input_value'  => $cart_item['quantity'],
                                                'max_value'    => $max_qty,
                                                'min_value'    => $min_qty,
                                                'product_name' => $_product->get_name(),
                                            ),
                                            $_product,
                                            false
                                        );

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                        ?>
                                    </div>
                                    <span class="font-body text-base font-bold text-primary">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                
                <div class="flex justify-between pt-6">
                    <button type="submit" class="bg-transparent border border-primary px-8 py-3 font-label-md text-label-md tracking-widest uppercase hover:bg-primary hover:text-on-primary transition-colors button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update Cart', 'woocommerce' ); ?></button>
                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </div>
            </div>
            
            <!-- Cart Totals & Coupon (Column 9-12) -->
            <div class="lg:col-span-4 bg-surface-container-low p-8 rounded-none space-y-6">
                <?php woocommerce_cart_totals(); ?>
            </div>
            
        </div>

        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
