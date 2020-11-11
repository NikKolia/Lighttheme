<!-- footer
================================================== -->
<footer class="footer">
    <div class="wrapper">
        <div class="hr"></div>
        <?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
            <?php dynamic_sidebar( 'footer-center' ); ?>
        <?php endif; ?>
    </div>
</footer>

<!-- java script
================================================== -->
<?php wp_footer() ?>

</body>
</html>