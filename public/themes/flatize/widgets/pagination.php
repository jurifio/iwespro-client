<?php
/**
 * @var $get array
 * @var $app \bamboo\helpers\CWidgetCatalogHelper
 * @var $pagination bamboo\domain\entities\CPagination
 */
?>
    <ul class="pagination">
        <?php if(!$pagination->prev()):?>
            <li class="disabled"><a href="">&laquo;</a></li>
        <?php else:  ?>
            <li><a href="<?php echo $app->concatWithFullUrl("page",$pagination->prev())?>">&laquo;</a></li>
        <?php endif; ?>
        <?php

        $max = 5 < $pagination->maxPage() ? 5 : $pagination->maxPage();

        switch($pagination->current()) {
            case '1':
                $numPage = 0;
                break;
            case '2':
                $numPage = -1;
                break;
            case $pagination->maxPage()-1:
                $numPage = -3;
                break;
            case $pagination->maxPage():
                $numPage = -4;
                break;
            default:
                $numPage = -2;
                break;
        }
        ?>
        <?php for($p=0; $p<$max ;$p++): ?>
            <?php
            $num = $pagination->current() + $numPage + $p;
            if($num < 1) continue;
            if($num > $pagination->maxPage()) continue;
            ?>

            <?php if($num == $pagination->current()):?>
            <li class="active"><a href=""><?php echo $pagination->current();?> <span class="sr-only">(current)</span></a></li>
            <?php else:  ?>
                <li><a href="<?php echo $app->concatWithFullUrl("page",$num); ?>"><?php echo $num;?></a></li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if(!$pagination->next()):?>
            <li class="disabled"><a href="">&raquo;</a></li>
        <?php else:  ?>
            <li><a href="<?php echo $app->concatWithFullUrl("page",$pagination->next())?>">&raquo;</a></li>
        <?php endif; ?>
    </ul>
