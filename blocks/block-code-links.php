<?php 
/**
 * A dual component to direct the viewr to one of two links
 * 
 * @link https://developer.wordpress.org/block-editor/
 * 
 * @package RobynVeitch
 */

 $repo_link = block_field('repository-link', False);
 $demo_link = block_field('live-demo-link', False);
?>

<div class='block-code-links'>
  <div class='wrapper'>
    <?php if ( $repo_link ) : ?>
      <a class='code-link repo' href='<?php echo $repo_link ?>'>
        <i class='fa fa-code'></i>
        View Code
      </a>
    <?php endif; ?>
    <?php if ( $demo_link ) : ?>
      <a class='code-link demo' href='<?php echo $demo_link ?>'>
        <i class='fa fa-eye'></i>
        Live Demo
      </a>
    <?php endif; ?>
  </div>
</div>