</main>
<footer class="footer">
    <?php get_template_part( 'template_parts/contact' ); ?>
    <nav id="footer-navigation" class="footer_navigation" role="navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'menu_class'     => 'menu',
        ) );
        ?>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>