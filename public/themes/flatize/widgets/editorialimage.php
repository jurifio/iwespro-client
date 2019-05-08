<!-- editorial image -->
<div class="<?php echo $data->grid; ?> <?php if (isset($data->animation)) echo $data->animation; ?>">
    <div class="cat-item">

        <?php if (isset($data->idPost)):

            /** @var \bamboo\domain\entities\CPost $post */
            $post = \Monkey::app()->repoFactory->create('Post')->findOneBy(['id' => $data->idPost]);
            $s = new \bamboo\core\utils\slugify\CSlugify();
            $address = $app->baseUrlLang() . '/blog/' . $s->slugify($post->postTranslation->getFirst()->title) . "/" . $post->id;
            ?>

            <div>
                <div>
                    <a href="<?php echo $address; ?>"><img class="img-responsive"
                                                           src="<?php echo empty($data->image) ? $app->image($post->postTranslation->getFirst()->coverImage) : $app->image($data->image); ?>"
                                                           alt="Blog"></a>
                </div>
                <div class="post-content" style="<?php echo $data->cssPostContent?>">
                    <h3 style="<?php echo $data->cssTitle ?>">
                        <a href="<?php echo $address; ?>"><?php echo empty($data->title) ? $post->postTranslation->getFirst()->title : $data->title; ?></a>
                    </h3>

                    <p style="<?php echo $data->cssDescription; ?>"><?php echo $data->description; ?></p>
                </div>
            </div>

        <?php else: ?>

            <figure class="animation animated fadeInUp img-holder">
                <a href="<?php echo $app->baseUrlLang() . $data->href; ?>"><img
                            class="img-responsive xhttp-loading-icon"
                            alt=""
                            src="/<?php echo $app->lang(); ?>/assets/xhttp-loader-icon.gif"
                            data-src="<?php echo $app->image($data->image); ?>">
                    <figcaption class="<?php echo str_replace(' ', '-', tp($data->alt)); ?>">
                        <div class="<?php echo $data->captionCss ?> <?php echo $data->colorCss; ?>">
                            <div href="<?php echo $app->baseUrlLang() . $data->href; ?>" class="">
                                <h1><?php tpe($data->captionTitle); ?></h1></div>
                            <p><?php tpe($data->captionText); ?></p>
                            <div href="<?php echo $app->baseUrlLang() . $data->href; ?>"
                                 class="btn btn-sm hidden-xs btn-<?php echo $data->colorCss; ?>"><?php tpe($data->buttonCallToAction); ?></div>
                        </div>
                    </figcaption>
                </a>
            </figure>

        <?php endif; ?>
    </div>


</div>