<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="row">
                <?php
                $category = get_queried_object();

                if (!empty($category)) {
                    echo '<h1 class="mt-3">' . $category->name . '</h1>';
                    echo '<p class="pb-4">' . $category->description . '</p>';
                }
                echo '<h2 class="mb-2 mt-3">All Category Post</h2>';

                $args = array(
                    'post_type' => 'post',
                    'cat' => $category->term_id,
                    'posts_per_page' => 4,
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) {

                    while ($the_query->have_posts()) {
                        $the_query->the_post();

                        ?>

                        <div class="col-md-3 mb-3">
                            <div class="post-item">
                                <div class="image-box">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>

                                <div class="content-box ps-3 pt-4 pb-3">
                                    <a href="#" class="text-decoration-none text-white all-btn">General</a>
                                    <a href="<?php the_permalink(); ?>" class="box-heading text-decoration-none">
                                        <?php the_title(); ?> </a>
                                    <div class="date-container mt-2">
                                        <span><i class="fa-regular fa-calendar-days"></i></span>
                                        <span class="ps-2"><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    } ?>

                    <!-- ======================== pagination ===================== -->

                    <?php
                    // Set the big number for pagination
                    $big = 999999999;

                    // Get the current page number (or set it to 1 if it's not available)
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    // Define the pagination arguments correctly
                    $args = array(
                        'paged' => $paged,
                        'max_num_pages' => $wp_query->max_num_pages, // Ensure this is set
                    );

                    // Generate the pagination links
                    $pagination = paginate_links(array(
                        'format' => 'page/%#%/',
                        'current' => max(1, $paged), // Make sure the current page is set correctly
                        'total' => $args['max_num_pages'], // Total number of pages
                        'prev_text' => __('&laquo;', 'probabs'),
                        'next_text' => __('&raquo;', 'probabs'),
                    ));

                    // Output the pagination HTML
                    printf(
                        '<nav class="navigation pagination" aria-label="Posts"><div class="nav-links">%s</div></nav>',
                        $pagination
                    );
                    ?>


                    <!-- ========================= end here ====================== -->

                <?php } else {
                    echo 'Sorry, no posts matched your criteria.';
                }

                // Restore original Post Data.
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>