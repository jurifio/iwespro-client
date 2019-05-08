<!DOCTYPE html>
<html lang="<?php echo $app->lang(); ?>">
{{ Head.default.default }}
<body>
{{ Pixels.bodypart.default }}
<div id="page">
    {{ Header.home.default }}
    <!-- Begin Main -->
    <div role="main" class="main">
        <!-- Begin page top -->
        <section class="page-top">
            <div class="container">
                {{ ContentTitle.user.userDashboard }}
            </div>
        </section>

        <!-- End page top -->
        <section class="submenu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        {{ InPageMenu.user.default }}
                    </div>
                    <div class="col-md-10">
                        {{ OrderDetail.user.default }}
                    </div>
                </div>
            </div>
        </section>

    </div>
    {{ Footer.home.default }}
</div>
{{ Overlay.home.default }}
</body>
</html>