<?php wp_head(); ?>

<body <?php body_class(); ?>>
  <kemet-drawer effect="slide" side="left">
    <nav slot="navigation">
      <?php get_template_part('inc/template-parts/aside'); ?>
    </nav>
    <section slot="content">
      <?php get_template_part('inc/template-parts/masthead'); ?>

      <main class="page-container">
        <?php the_content(); ?>
      </main>

      <?php get_template_part('inc/template-parts/footer'); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer(); ?>
