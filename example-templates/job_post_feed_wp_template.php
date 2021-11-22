<?php /* Template Name: Job Posts Feed Page */

# Load page template header
get_header();

# Add page wrapper
echo '<main>';

/**
 * An example to show that we can include the WordPress page content on the same page
 * as the job feed.
 */

if( have_posts() ) while( have_posts() ) : the_post();
    echo '<section><h1>' . get_title() . '</h1>' . get_content() . '</section>';
endwhile;


# Check if RecMan WP Plugin is installed and that it has rows of data
if( function_exists( 'have_jobposts' ) && have_jobposts() ) :

    # Loop through each job post
    while( have_jobposts() ) : the_jobpost();

        # Link to each job post
        $link = get_jobpost('permalink');




    endwhile;

endif;


echo '</main>';

?>

    <main>
        <section>

            <?php

            #
            if( function_exists( 'have_jobposts' ) and have_jobposts() ):

                # Loop through the rows of data
                while( have_jobposts() ) : the_jobpost();

                    # A link wrapper of each post.
                    echo "<a href='" . get_jobpost( 'permalink' ) . "'>";
                    # Show logo
                    if( $logo = get_jobpost( 'logo' ) ) {
                        $alt = ( get_jobpost( 'name' ) ) ? get_jobpost( 'name' ) : '';
                        echo "<div><img src='{$logo}' alt='$alt' /></div>";
                    }
                    # Text wrapper
                    echo "<div>";
                    # Text header
                    echo "<header>";
                    echo "<h3>" . get_jobpost( 'name' ) . "</h3>";
                    echo "</header>";
                    # Show Excerpt
                    echo "<div class='jobtext'>";
                    echo "<p>" . get_jobpost( 'excerpt' ) . "</p>";
                    echo "</div>";
                    echo "<footer>";
                    echo "<ul>";
                    # Number of Positions
                    if( $pos = get_jobpost( 'numberOfPositions' ) ) {
                        echo "<li><i>Positions</i>{$pos}</li>";
                    }
                    # Show workplace
                    if( $place = get_jobpost( 'workplace' ) ) {
                        echo "<li><i>Place</i>{$place}</li>";
                    }
                    # Show type - Autotranslated
                    if( $type = get_jobpost( 'type' ) ) {
                        echo "<li><i>Type</i>{$type}</li>";
                    }
                    # Show deadlind
                    if( $deadline = get_jobpost( 'deadline' ) ) {
                        echo "<li><i>Deadline</i>{$deadline}</li>";
                    }
                    echo "</ul>";
                    echo "</footer>";

                    echo "</div>"; # end text wrapper
                    echo "</a>"; # end link wrapper
                endwhile;
            else :
                # No job posts published. Show message.
                echo '<h3>No available jobs at this point</h3>';
            endif;
            ?>
        </section>
    </main>
<?php get_footer(); ?>