<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

    
    get_header(); ?>
    
    
        <!-- MAIN CONTENT -->
    <div class="main row">
        
        <?php get_sidebar('left'); ?>

        <div class="content col-md-7 col-sm-9">
            <p>This is the MAIN content</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, unde doloremque, eius corporis qui facilis eligendi, minima voluptates error enim expedita! Repudiandae, hic minus sit ipsa eligendi nesciunt repellat libero.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, unde doloremque, eius corporis qui facilis eligendi, minima voluptates error enim expedita! Repudiandae, hic minus sit ipsa eligendi nesciunt repellat libero.</p>
        </div>
    

        <?php get_sidebar('right'); ?>
        <?php 
        // include ('infobar.php')
         ?>

    </div> <!--/main-->
    <!--/MAIN CONTENT -->
    <!-- GET FOOTER -->
    <?php get_footer(); ?>

 




