<?php get_header(); ?>

<main class="home-main">
    <div class="container">
        <!-- Mostrando todos os posts -->
        
        <?php
            $args = array( 'post_type' => 'imovel' );
            $loop = new WP_Query( $args );

            if( $loop->have_posts() ) {
        ?>
        <ul class="imoveis-listagem">

            <?php
            while( $loop->have_posts() ) {
            ?>
                <li class="imoveis-listagem-item">
                    <?php $loop->the_post(); ?>
                    <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail() ?>
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content(); ?></div>
                    </a>
                </li>
            <?php } ?>
            
        </ul>

        <?php } ?>
    </div>
</main>
  
<?php get_footer(); ?>