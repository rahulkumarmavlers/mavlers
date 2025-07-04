<?php 
$marquee_icon = get_sub_field('icon');
$marquee_content = get_sub_field('content');
if( $marquee_icon || $marquee_content ) : ?>
<section class="marquee-section get-in-touch">
    <div class="marquee-main" data-aos="fade-up">
        <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="marquee">
            <div class="marquee-item">
                <?php 
                $link = $marquee_content;
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <span class="marquee-text">
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </span>
                <?php endif; ?>
                <img src="<?php echo $marquee_icon['url']; ?>" alt="<?php echo $marquee_icon['alt']; ?>">
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>
<?php endif; ?>