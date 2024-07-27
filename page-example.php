<?php
/* Template Name: example */

//Feilds

$test = get_field("test"); 
?>

<?php get_header(); ?>

    <main id="main" class="container">

        <?php
            if ($test) {
                ?>

                    <p> <?php echo $test; ?> </p>

                <?php
            }
        ?>

        <?php  get_template_part("template-parts/section", "contact-form"); ?> 
        
    </main>

<?php get_footer(); ?>