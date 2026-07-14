<?php
/**
 * MK GLAMZ sidebar.php template
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area lg:col-span-4 space-y-8">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
