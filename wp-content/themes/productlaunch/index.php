<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Product_Launch
 * @since Product Launch 0.0000a
 */

get_header(); ?>

<?php while ( have_posts() ) :
the_post();
?>
<div class="petitcadre">
    <?php the_post_thumbnail(); ?>
    <h1><?php the_title(); ?></h1>
    <h2><?php echo get_post_custom_values('Date')[0]; ?></h2>
    <p><?php echo get_post_field('post_content'); ?></p>
</div>
<form class="" action="#" method="post">
    <label for="nome">NAME</label>
    <input type="text" name="nome">
    <label for="email">EMAIL</label>
    <input type="email" name="email" value="">
    <label for="type">Format des emails</label>
    <select name="type">
        <option value="html">HTML</option>
        <option value="texte">TEXTE</option>
    </select>
    <input type="submit" name="envoyer" value="Envoyer">
</form>
<?php
if (isset ($_POST["envoyer"]) && $_POST["email"] != "") {
    $table = "email";
    $name = strip_tags($_POST["email"], "");
    $nome = strip_tags($_POST["nome"], "");
    $format = strip_tags($_POST["type"], "");
    $wpdb->insert($table, array('email' => $name, 'name' => $nome, 'format' => $format));
    echo get_post_custom_values('Confirmation')[0];
}
?>

<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<?php
endwhile;
get_sidebar();
get_footer(); ?>
