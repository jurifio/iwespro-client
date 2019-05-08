<?php
/**
 * Created by PhpStorm.
 * User: Enrico Pascucci
 * Date: 19/04/2016
 * Time: 18:01
 */
$p = $data->entity;
$isPost = (is_null($p)) ? false : true;
//$id = $p->id;
//$address = $app->baseUrlLang() /* . $title */ . '/blog/' . $id;

?>
<!-- Begin Main -->
<div role="main" class="main">

    <!-- Begin page top -->
    <section class="page-top">
        <div class="container">
            <div class="page-top-in">
                <h1>
                    <?php
                    if ($isPost) {
                        echo $p->postTranslation->getFirst()->title;
                    } else {
                        tpe($data->postNotFound);
                    } ?>
                </h1>
            </div>
        </div>
    </section>
    <!-- End page top -->

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="blog-posts single-post">

                    <?php
                    if ($isPost) {
                        ?>

                        <article class="post post-large blog-single-post">
                            <h4><?php echo $p->postTranslation->getFirst()->subtitle; ?></h4>
                            <div class="post-meta">
                                <span>By <?php echo $p->author ?></span>
                                <span><i class="fa fa-clock-o"></i><?php echo $p->publishDate; ?></span>
                                <!--<span><i class="fa fa-comment-o"></i> <a href="#">212 Comments</a></span>-->
                            </div>
                            <div class="post-image single">
                                <img class="img-responsive"
                                     src="<?php echo $app->image($p->postTranslation->getFirst()->coverImage); ?>"
                                     alt="Blog">
                            </div>
                            <div class="post-content">
                                <?php echo $p->postTranslation->getFirst()->content ?>
                            </div>
                            <div class="post-tags">
                                <strong>Tags:</strong> <!--<a href="#">fashion</a> <a href="#">new styles</a>-->
                                <?php
                                $loopres = [];
                                $i = 0;
                                foreach ($p->postTag as $t) {
                                    $loopres[$i] = '<a href="'
                                            . $app->baseUrlLang() . '/blog/tag/'
                                            . $t->postTagTranslation->getFirst()->name . '/'
                                            . $t->id . '/'
                                            . '">';
                                    $loopres[$i] .= $t->postTagTranslation->getFirst()->name;
                                    $loopres[$i] .= '</a> ';
                                    $i++;
                                }
                                echo implode(" ", $loopres);
                                ?>
                            </div>
                        </article>
                        <div class="fb-like"
                             data-href="<?php echo $app->presentUrl(); ?>"
                             data-layout="standard"
                             data-action="like"
                             data-show-faces="true"
                             data-share="true"
                             data-picture="<?php echo $app->image($p->postTranslation->getFirst()->coverImage); ?>"></div>
                        <?php
                    } else { //if $isPost
                    ?>
                    <article class="post post-large blog-single-post" style="margin-top: 100px; margin-bottom: 200px">
                        <h2><?php tpe($data->postNotFound); ?></h2>
                        <p>
                            <?php tpe($data->sorry); ?>
                        </p>
                        <?php }
                        ?>
                    </article>
                    <br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
                </div>
            </div>
        </div>
	  </div>
</div>
    <!-- End Main -->