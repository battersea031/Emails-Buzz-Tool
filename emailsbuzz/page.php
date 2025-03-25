<?php get_header(); ?>

<!-- ============== Main body ======================== -->
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto mt-md-4 mt-sm-2 pt-md-2">

            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <article>
                        <h1 class="text-center mb-2"><?php the_title(); ?></h1>
                        <div class="content mt-3">
                            <?php the_content(); ?>
                        </div>
                        <div class="meta">
                            <p>Published on: <span><i class="fa-regular fa-calendar-days"></i></span> <?php the_date(); ?></p>
                            <p>Last modified on: <span><i class="fa-regular fa-calendar-days"></i></span> <?php the_modified_date(); ?></p>
                        </div>
                    </article>

                    <?php
                endwhile;
            else:
                echo '<p>No content found.</p>';
            endif;
            ?>

        </div>
    </div>
</div>




<!-- ====================== End Here =========================== -->

<!-- ==== footer ======= -->
<?php get_footer(); ?>