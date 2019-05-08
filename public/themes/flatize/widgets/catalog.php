<!-- Begin Main -->
<div role="main" class="main">

    <!-- Begin page top -->
    <section class="page-top">
        <div class="container">
            {{ Catalogtitle.default.default }}
        </div>
    </section>
    <!-- End page top -->
    <!-- Start Page Decorator
    <section class="page-content-head">
        <div class="container">
            {{ pagedecorator }}
        </div>
    </section>-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ MobileGridToolbar.default.default }}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2 sidebar-filters">
                <aside class="sidebar">
                    {{ CatalogCategoryfilterbox.categories.category.async }}
                    {{ CatalogFilterBox.default.tag.async }}
                    {{ CatalogFilterBox.default.brand.async }}
                    {{ CatalogFilterBox.default.color.async }}
                    {{ CatalogFilterBox.default.size.async }}
                </aside>
            </div>
            <div class="col-md-10 catalog-content">
                <div class="catalog">
                    {{ Gridtoolbar.catalog.default }}
                    {{ Productgrid.catalog.default }}
                    {{ Pagination.catalog.default.async }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->