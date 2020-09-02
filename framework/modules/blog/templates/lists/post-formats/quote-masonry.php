<?php $quote_color = get_post_meta(get_the_ID(), "mkd_post_quote_color", true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-text" <?php if ($quote_color !== ''): ?> style="background-color: <?php echo esc_attr($quote_color); ?>" <?php endif; ?>>
            <div class="mkd-post-text-inner">
				<div class="mkd-categories-list">
					<?php topfit_mikado_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
				</div>
				<div class="mkd-post-mark">
					<span aria-hidden="true" class="icon_quotations"></span>
				</div>
                <div class="mkd-post-title">
                    <h3>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "mkd_post_quote_text_meta", true)); ?></a>
                    </h3>
                    <span class="quote_author">&mdash; <?php the_title(); ?></span>
                </div>
            </div>
			<div class="mkd-post-info">
				<?php topfit_mikado_post_info(array(
					'date'     => 'yes',
					'comments' => (topfit_mikado_options()->getOptionValue('blog_single_comments') == 'yes') ? 'yes' : 'no',
					'share'    => 'yes'))
				?>
			</div>
        </div>
    </div>
</article>