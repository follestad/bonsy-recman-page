<?php /** @noinspection PhpUndefinedFunctionInspection */ ?>





                    <h1><?php the_jobpost('title'); ?></h1>



            <?php

                if( have_jobposts() ) : while( have_jobposts() ) : the_jobpost();

                    echo '<h1>'. get_jobpost('title') . '</h1>';

                endwhile; else :

                    echo 'No job posts available';

                endif;

            ?>




