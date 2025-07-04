<?php 
$bgcolor="bg-navy";
if( get_sub_field('cta_type')=="custom" ) { 
    $title=get_sub_field('title');
    $content=get_sub_field('content');
    $ctabutton=get_sub_field('cta_button');
    
    if ( get_sub_field('background_color') == "green" ) {
        $bgcolor="bg-green";
    }

} else {
    $title=get_field('gcta_title','option');
    $content=get_field('gcta_content','option');
    $ctabutton=get_field('gcta_cta_button','option');
}
?>

<section class="find-out-more <?php echo $bgcolor;?> <?php if ( get_sub_field('background_pattern')=="hide" ): ?>trusted-partner-sec<?php endif; ?>">
    <div class="container">
        <div class="content-wrap text-center" data-aos="fade-up" >
            <div class="inner-wrap">
                <?php if ( $title ): ?>
                    <h3><?php echo $title;?></h3>
                <?php endif; ?>
                <?php if ( $content ): ?>
                    <p><?php echo $content;?></p>
                <?php endif; ?>
                <?php if( $ctabutton ): 
                    $link_url = $ctabutton['url'];
                    $link_title = $ctabutton['title'];
                    $link_target = $ctabutton['target'] ? $ctabutton['target'] : '_self';
                    ?>
                    <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>