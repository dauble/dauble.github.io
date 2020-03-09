---
layout: post
title: "Adding Related Posts in WordPress Without a Plugin"
date: 2017-10-27
image: /assets/images/posts/related-posts.jpg
---
This past week I had yet another challenge: add related posts to a blog entry and make it match a design. It seemed straightforward, especially since all the blog posts are organized by category. As I dug deeper, I realized it wasn't going to be as simple as I'd originally thought. Let me preface this post by saying **I don't like using unnecessary WordPress plugins. **I'd much rather build something from scratch that doesn't have limitations from a plugin. There are times when plugins are necessary, sure, but I'd much rather have something that doesn't need to be updated constantly or be limited to a plugin's design. I should preface this with there are two ways of doing this: display related posts by **tags **and by **categories**. I'll first demonstrate by displaying related posts by tags. I feel this is the better way to show related posts. _Let's assume this will be going on your default single.php page._

## Related Posts by Tags

<pre class="EnlighterJSRAW" data-enlighter-language="php"><div class="related-posts">
                  <?php
                    $tags = wp_get_post_tags($post->ID);

                    if ($tags):
                      $first_tag = $tags[0]->term_id;

                      $args = array(
                        'tag__in' => array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 2,
                        'caller_get_posts' => 1,
                        'orderby' => 'rand'
                      );

                      $posts = new WP_Query($args);
                  ?>

                      <?php if($posts->have_posts()): while($posts->have_posts()): $posts->the_post(); ?>

                        <div class="related-posts__post">
                          <a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium'); ?>
                            <img src="<?php echo $image[0]; ?>" alt="" class="">

                            <span class="related-posts__post--title"><?php the_title(); ?></span>
                          </a>
                        </div>

                      <?php endwhile; endif; wp_reset_query(); ?>

                  <?php endif; ?>
                </div></pre>

## Related Posts by Categories

<pre class="EnlighterJSRAW" data-enlighter-language="null"><div class="related-posts">
                  <?php
                    $tags = wp_get_post_categories($post->ID);

                    if ($tags):
                      $args = array(
                        'current_category' => $tags,
                        'orderby' => 'rand',
                        'posts_per_page' => 2
                      );

                      $posts = new WP_Query($args);
                      while ($posts->have_posts()): $posts->the_post();
                  ?>
                      <div class="related-posts__post">
                        <a href="<?php the_permalink(); ?>" class="related-posts__post--link">
                          <span class="related-posts__post--link--wrap">
                            <span class="related-posts__post--link--wrap__overlay"></span>

                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog_image'); ?>
                            <img src="<?php echo $image[0]; ?>" alt="" class="related-posts__post--link--image">

                            <span class="btn btn-secondary">Read More</span>
                          </span>
                          <h4><?php the_title(); ?></h4>
                        </a>
                      </div>
                    <?php endwhile; ?>
                  <?php wp_reset_query(); endif; ?>
                </div></pre>

And voila! I hope this helps.