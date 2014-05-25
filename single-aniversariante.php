<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="event-<?php the_ID(); ?>">
<h1><?php the_title(); ?></h1>
<section>
<?php echo get_niver_calendar_icon(); ?>
<section>
<?php the_content('Leia mais em "'.the_title('', '', false).'" &raquo;'); ?>
<?php echo get_niver_details(true, false); ?>
</section>
</section>
</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>