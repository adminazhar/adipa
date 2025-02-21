<div class="col-sm-6 col-xl-4 card border-0 postcard">
    <div class="row g-0 rounded-1 overflow-hidden flex-md-row h-md-250 position-relative postcard-inside">
        <?php
        $posttype = get_post_type();
        if ( $posttype == 'post' ) {
            echo '<div class="position-absolute d-inline-block category-list-card">' . "\n";
            $getcat = get_the_category();
            if ( count ( $getcat ) == 1 ) {
                $catname = $getcat[0]->cat_name;
                echo '<div class="d-inline-block p-1 px-2 rounded-1 category-name-card">' . $catname . '</div>' . "\n";
            } else {
                foreach ( $getcat as $category) {
                    $category_link = get_category_link( $category->term_id );
                    $catname = $category->cat_name;
                    echo '<div class="d-inline-block p-1 px-2 rounded-1 category-name-card">' . $catname . '</div>' . "\n";
                }
            }
            echo '</div>' . "\n";
        }
        if ( has_post_thumbnail ( $post->ID ) ) {
            $image_id = get_post_thumbnail_id( $post->ID );
            $image_title = get_the_title( $image_id );
            $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bigthumb' );
            echo '<div class="col-12 postcard-image"><img width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] . '" alt="' . $image_title . '" /></div>' . "\n";
        }
        ?>
        <div class="p-3 d-flex flex-column">
            <div class="text-muted postcard-date"><?php echo get_the_date('F j, Y'); ?></div>
            <h2 class="mb-3">
                <a class="fs-5 stretched-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php the_excerpt(); ?>
            <?php if ( $posttype == 'post' ) { ?>
                <ul class="row postcard-tag-list">
                    <?php
                    if (has_tag()) {
                        $tags = get_the_tags();
                        foreach( $tags as $tag ) {
                            $tag_link = get_tag_link( $tag->term_id );
                            $name = $tag->name;
                            echo '<li><a class="d-inline-block postcard-tag text-white" href="' . $tag_link . '">' . esc_attr( $name ) . '</a></li>' . "\n";
                        }
                    }
                    ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
