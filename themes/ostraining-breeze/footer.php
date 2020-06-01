                <!-- Footer -->
                <footer class="footer">
                    
                    <?php
                    // Sidebar Footer
                    get_template_part( 'include/content', 'sidebar-footer' );
                    ?>
                    
                    <div class="row-fluid copyright-ost">
                        <div class="span6">
                            <p><?php echo get_bloginfo('name'); ?></p>
                        </div>
                        <div class="span6">
                            <div class="floatright">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container' => '',
                                    'menu_class' => 'footer-menu',
                                    'menu_id' => 'footermenu',
                                    'fallback_cb' => false,
                                    'depth' => 1
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->
            </div>
            <!-- /Container -->
        </div>
        <!-- /Main container -->

        <?php wp_footer(); ?>

    </body>
</html>