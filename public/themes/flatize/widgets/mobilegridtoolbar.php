<div id="mobiletoolbar">
    <div class="floating-gray-box">
        <div class="row">
            <div class="col-xs-4 tool nelem">
                <a class="trasform-large" href=""><i class="fa fa-th-large"></i></a>
                <a class="trasform-small" href=""><i class="fa fa-th"></i></a>
            </div>
            <div class="col-xs-4 tool filters">
                <a href="#"><i class="fa fa-filter"></i></a>
            </div>
            <div class="col-xs-4 tool sorting">
                <?php
                    if (isset($_GET['sortby'])) {
                        $sortby = $_GET['sortby'];
                    } else {
                        $sortby = "nothing";
                    }

                    switch($sortby) {
                        case "creation-desc":
                            $link = $app->concatWithFullUrl('sortby','price-desc');
                            $icon = "fa-sort";
                            break;
                        case "price-desc":
                            $link = $app->concatWithFullUrl('sortby','price-asc');
                            $icon = "fa-sort-desc";
                            break;
                        case "price-asc":
                            $link = $app->concatWithFullUrl('sortby','creation-desc');
                            $icon = "fa-sort-asc";
                            break;
                        default:
                            $link = $app->concatWithFullUrl('sortby','creation-desc');
                            $icon = "fa-sort";
                            break;
                    }
                ?>
                <a href="<?php echo $link; ?>"><i class="fa <?php echo $icon; ?>"></i></a>
            </div>
        </div>
    </div>
    <nav style="margin-top:10px;"></nav>
</div>