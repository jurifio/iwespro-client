<?php
/**
 * @var \bamboo\core\theming\CWidgetHelper $app
 */
?>
<div class="blog-masonry" style="position: relative;">
<?php
foreach($data->multi as $post) {
    $title = $post->postTranslation->getFirst()->title;
    $id = $post->id;
    $s = new \bamboo\core\utils\slugify\CSlugify();
    $address = $app->baseUrlLang() . '/blog/' . $s->slugify($post->postTranslation->getFirst()->title)."/".$post->id;
    ?>
        <div class="col-xs-6 col-md-4 post-mansory-item animation animated fadeInUp">
            <article class="post post-medium">
                <div class="post-image single">
                    <a href="<?php echo $address; ?>"><img class="img-responsive" src="<?php echo $app->image($post->postTranslation->getFirst()->coverImage); ?>" alt="Blog"></a>
                </div>
                <div class="post-content">
                    <h3><a href="<?php echo $address; ?>"><?php echo $post->postTranslation->getFirst()->title; ?></a></h3>
                    <div class="post-meta">
                        <!--by <a href="#"><strong><?php echo $post->author; ?></strong><!--</a> in -->
                        <span><?php
                        $loopres = [];
                        $i = 0;
                        foreach ($post->postCategory as $t) {
                            $loopres[$i] = '<a href="'
                                    . $app->baseUrlLang() . '/blog/category/'
                                    . $t->postCategoryTranslation->getFirst()->name . '/'
                                    . $t->id . '/'
                                    . '">';
                            $loopres[$i] .= $t->postCategoryTranslation->getFirst()->name;
                            $loopres[$i] .= '</a> ';
                            $i++;
                        }
                        echo implode(" ", $loopres);
                        ?>
                        </span>
                    </div>

                    <p><?php echo $post->postTranslation->getFirst()->subtitle;  ?></p>
                    <div class="post-meta post-meta-foot">
                        <span class="pull-left"><i class="fa fa-clock-o"></i><?php echo $post->publishDate;?></span>
                        <!--<span class="pull-right"><i class="fa fa-comment-o"></i> <a href="#">212 Comments</a></span>-->
                    </div>
                </div>

            </article>
        </div>
    <?php } // fine loop posts?>
</div>