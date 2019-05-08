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
                <div class="col-md-10 formcontainer">
                    {{ Form.userAccountData.userPersonalData }}
                </div>
            </div>
        </div>
    </section>

</div>