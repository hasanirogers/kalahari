<?php
  function kalahari_gutenberg_blocks() {
      $args = array(
        'editor_script' => 'featured-cuisine-js'
      );

      register_block_type('kalahari/featured-cuisine', $args);
      register_block_type('kalahari/google-maps');
  }
  add_action( 'init', 'kalahari_gutenberg_blocks' );
