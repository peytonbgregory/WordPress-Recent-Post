<?php 
// Post query variables. Use lines 4-9 to control what content is displayed in the query.
$args = array(
    'post_type'    => 'post', // To show custom post types or products, change the word post to the name of the custom post type (providers, locations, projects, products...)
    'category_name' => 'staff' // use this to show posts within a certain category. remove the code to dispaky all posts.
    'orderby'        => 'name',
    'order'          => 'ASC',
    'hide_empty'     => 1, // 1 is true / 0 is false
    'posts_per_page' => -1 // -1 shows every post, enter a number number to control how many posts are displaed
);

// the query (the posts being displayed)
$the_query = new WP_Query( $args ); ?>

<div class="custom-post-wrapper">
    <!-- this div wraps around all the posts -->

    <?php // If there are any posts that match the criteria above, then the code in between lines 24 and 34 will be repeated for each post.
 if ( $the_query->have_posts() ) : ?>

    <!-- pagination / breadcrumbs / conditional content that wont be repeated with each post goes here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



    <h2 clas="post-title"><?php the_title(); // this will show the post title ?></h2>

    <div class="entry-content">

        <?php the_content(); // this will show all of the post content ?>

        <?php the_excerpt(); // this will show the excerpt field. If the except is blank then this will show some of the post content. ?>

    </div>

    <a class="btn btn-primary" href="<?php the_permalink(); // displays the post URL ?>">Ream Nore </a>

    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); // this allows you to use this code multiple times on the same page. Without this line of code, two querys on the page would dispay the same posts. ?>

    <?php else : // these two lines of code are optional. ?>

    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; // this clodes the if statements that started on line 18. Notice the post wrapper div tag clodes AFTER this line of code. If you accidently open or close a div in the wrong place, that error will be duplicated for every post. ?>

</div><!-- end of post wrapper -->
