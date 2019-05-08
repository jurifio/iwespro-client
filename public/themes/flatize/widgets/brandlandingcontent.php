<!-- Begin Main -->
<div role="main" class="main">

    <!-- Begin page top -->
    <section class="page-top" style="margin-bottom:30px">
        <div class="container">
            {{ BrandLandingTitle.default.default }}
        </div>
    </section>
    <!-- End page top -->
    <!-- Start Page Decorator
    <section class="page-content-head">
        <div class="container">
            {{ pagedecorator }}
        </div>
    </section>-->

    <section class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{ MobileGridToolbar.default.default }}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{ CatalogHeader.brandDescription.default }}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 catalog-content">
                    <div class="catalog">
                        {{ Gridtoolbar.brandlanding.default }}
                        {{ Productgrid.catalog.default }}
                        {{ Pagination.catalog.default }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Main -->