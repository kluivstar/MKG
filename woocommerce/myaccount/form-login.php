<?php
/**
 * MK GLAMZ WooCommerce My Account Login/Register Form override.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="max-w-[1440px] mx-auto py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-4xl mx-auto" id="customer_login">
        
        <!-- Login Form -->
        <div class="space-y-8">
            <h2 class="font-display text-3xl text-primary uppercase"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
            
            <form class="woocommerce-form woocommerce-form-login login space-y-6" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>
                
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-2" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-transparent border-b border-outline-variant focus:border-primary border-x-0 border-t-0 p-3 outline-none" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
                </div>
                
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-2" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text w-full bg-transparent border-b border-outline-variant focus:border-primary border-x-0 border-t-0 p-3 outline-none" type="password" name="password" id="password" autocomplete="current-password" />
                </div>
                
                <?php do_action( 'woocommerce_login_form' ); ?>
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-FormInput woocommerce-FormInput--checkbox text-primary focus:ring-primary rounded-sm" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                        <span class="text-xs text-on-surface-variant uppercase tracking-widest font-semibold"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                    </label>
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-xs text-on-surface-variant uppercase tracking-widest font-semibold hover:text-primary"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                </div>
                
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                
                <button type="submit" class="woocommerce-button button woocommerce-form-login__submit w-full bg-primary text-on-primary py-4 font-label-md text-label-md tracking-widest uppercase hover:bg-neutral-800 transition-colors" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                
                <?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>
        </div>

        <!-- Registration Form (If enabled in settings) -->
        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
            <div class="space-y-8 border-t md:border-t-0 md:border-l md:pl-16 border-outline-variant/30 pt-12 md:pt-0">
                <h2 class="font-display text-3xl text-primary uppercase"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
                
                <form class="woocommerce-form woocommerce-form-register register space-y-6" method="post" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
                    <?php do_action( 'woocommerce_register_form_start' ); ?>
                    
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-2" for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-transparent border-b border-outline-variant focus:border-primary border-x-0 border-t-0 p-3 outline-none" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
                        </div>
                    <?php endif; ?>
                    
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-2" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-transparent border-b border-outline-variant focus:border-primary border-x-0 border-t-0 p-3 outline-none" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
                    </div>
                    
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-2" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-transparent border-b border-outline-variant focus:border-primary border-x-0 border-t-0 p-3 outline-none" name="password" id="reg_password" autocomplete="new-password" placeholder="Min 8 characters" />
                        </div>
                    <?php else : ?>
                        <p class="text-xs text-on-surface-variant/80 leading-relaxed"><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>
                    <?php endif; ?>
                    
                    <?php do_action( 'woocommerce_register_form' ); ?>
                    
                    <p class="text-xs text-on-surface-variant/80 leading-relaxed">
                        <?php esc_html_e( 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.', 'woocommerce' ); ?>
                    </p>
                    
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    
                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-full border border-primary text-primary py-4 font-label-md text-label-md tracking-widest uppercase hover:bg-primary hover:text-on-primary transition-colors" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                    
                    <?php do_action( 'woocommerce_register_form_end' ); ?>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
