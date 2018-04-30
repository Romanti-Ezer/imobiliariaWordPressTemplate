<?php
    $queryTaxonomy = array_key_exists('taxonomy', $_GET);
    if ($_GET['taxonomy'] === '' && $queryTaxonomy) {
        wp_redirect( home_url() );
    }
    get_header();
?>

<main class="home-main">
    <div class="container"> 
        <!-- Mostrando todos os posts -->
        
        <form class="busca-localizacao-form" method="get" action="<?= bloginfo('url'); ?>">
            <div class="taxonomy-select-wrapper">
                <select name="taxonomy">
                    <option value="">Todos os imóveis</option>
                    <?php $taxonomias = get_terms('localizacoes');
                        foreach ($taxonomias as $taxonomia) { ?>
                            <option value="<?= $taxonomia->slug ?>"><?= $taxonomia->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit">Filtrar</button>
        </form>

        <?php

            if ($queryTaxonomy) {

                $taxQuery = array(
                    array(
                        'taxonomy' => 'localizacoes',
                        'field' => 'slug',
                        'terms' => $_GET['taxonomy']
                    )
                );
            }

            $args = array(
                'post_type' => 'imovel',
                'tax_query' => $taxQuery
            );
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