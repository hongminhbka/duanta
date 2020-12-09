<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package themesflat
 */
?>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- #content -->

    <?php if ( themesflat_choose_opt('enable_footer') == 1 ): ?>
        <!-- Footer -->
        <footer class="footer <?php (themesflat_meta( 'footer_class' ) != "" ? esc_attr( themesflat_meta( 'footer_class' ) ):'') ;?>">      
            <div class="container">                                
                <div class="row"> 
                    <div class="footer-widgets">
                    <?php
                    $footer_column = get_theme_mod( 'footer_widget_areas', '3' );                
                    switch ( $footer_column ):                    
                        case 1:
                            $class = 'col-md-12';
                            break;
                        case 2:
                            $class = 'col-md-6';
                            break;
                        case 3:
                            $class = 'col-md-4';
                            break;
                        case 4:
                            $class = 'col-md-3';
                            break;
                    endswitch;
                    ?>
                    
                   <?php for ( $i = 1; $i <= $footer_column; $i++ ) : ?>
                    <div class="<?php echo esc_attr($class); ?>">
                        <?php
                            themesflat_dynamic_sidebar( "footer-$i" );
                        ?>
                    </div><!-- /.col-md- -->

                    <?php endfor; ?>                
                    </div><!-- /.footer-widgets -->  
                </div><!-- /.row -->    
            </div><!-- /.container -->   
        </footer>
    <?php endif; ?>

    <!-- Bottom -->
    <div class="bottom">
        <div class="container">           
            <div class="row">
                <div class="col-md-4">
                    <div class="copyright">                        
                        <?php echo wp_kses_post(themesflat_choose_opt( 'footer_copyright')); ?>
                    </div>                                                                                                
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="logo">
                        <img src="/wp-content/themes/finance/images/logo-duanta-white.svg" alt="Logo Duanta" width="55.11" height="24.78"> 
                    </div>                                                                                                 
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 text-right">
                    <?php                                
                        if ( themesflat_choose_opt('enable_social_link') == 1 ):
                            echo themesflat_render_social();    
                        endif;   
                    ?>
                    <?php if ( themesflat_choose_opt( 'go_top') == 1 ) : ?>
                        <!-- Go Top -->
                        <a class="go-top show">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    <?php endif; ?>                                                                                                
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>    
</div><!-- /#boxed -->
<?php wp_footer(); ?>
</body>
</html>
