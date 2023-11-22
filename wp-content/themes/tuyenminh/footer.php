<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TuyenMinh
 */

?>
<footer id="footer" class=" footer" >
    <div>
        <div class="footer-top" style="">
            <div class ="sidebar1"><?php dynamic_sidebar('sidebar-1');?></div>
          
                <?php dynamic_sidebar('top');?>
                <?php dynamic_sidebar('top1');?>
                <?php dynamic_sidebar('top2');?>

          </div>
       
            <div class="footer-center-conten" >
        
                <div class="conten-left">
                    <?php dynamic_sidebar('footer');?>  
                </div>
                <div class="conten-right"  >
            
                <?php dynamic_sidebar('footer1');?> 
                <?php dynamic_sidebar('footer2');?> 
                <?php dynamic_sidebar('footer3');?> 
                <div class="content-bot"> <?php dynamic_sidebar('footer4');?> </div>
                </div>

            </div>
         
            <div class="bottom" >
                <div class="bottom-l" >
                    <div class="bottom-t"> Hệ sinh thái icheck : </div>
                        <div class="bottom-b" ><?php dynamic_sidebar('horizontal-widget-area') ?></div>
                </div>
                <div class="bottom-r" >
            Copyright  &copy; - <?php echo date('Y'); ?>
            <?php if( get_theme_mod( 'copyright' ) != '') { 
                        echo  get_theme_mod('copyright'); 
                    }
                    ?>
                </div>
            </div>
    </div>
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
  
    
</body>

</html>
