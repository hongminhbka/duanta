<!-- Header -->
<header id="header" class="header widget-header" >  
    <div class="flat-top">
        <div class="container">
            <div class="row">        	
                <div class="col-md-12 text-right">
                <?php                                
                    if ( themesflat_choose_opt('enable_social_link') == 1 ):
                        echo themesflat_render_social();    
                    endif;   
                ?>           

                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>      
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="header-wrap clearfix">
                    <?php get_template_part( 'tpl/header/brand'); ?>                    
                </div>                
            </div><!-- /.col-md-3-->
            <div class="col-md-9">                
                <div class="hotline">
                    <div class="row">
                        <div class="col-md-5">
                            <p class="icon"><img src="/wp-content/themes/finance/images/button-hotline.svg" alt="Hotline" width="58" height="58"></p>
                        </div>
                        <div class="col-md-7">
                            <p class="text">
                                <span class="label">Hotline</span><br>
                                <span class="number">0389166199</span>
                            </p>
                        </div>
                    </div>                                        
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->    
</header><!-- /.header -->

<!-- Mainnav -->
<div class="nav header-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part( 'tpl/header/navigator'); ?>

                <?php if ( themesflat_choose_opt('header_searchbox') == 1 ) :?>
                <div class="show-search">
                    <a href="#"><i class="fa fa-search"></i></a>         
                </div> 
                <?php endif;?>
                <div class="submenu top-search widget_search">
                    <?php get_search_form(); ?>
                </div> 
            </div>
        </div><!-- /.row -->       
    </div><!-- /.container -->    
</div>

