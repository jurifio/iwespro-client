<!-- Begin Main -->
<div role="main" class="main">
    <!-- Begin page top -->
    <section class="page-top">
        <div class="container">
            {{ ContentTitle.default.cart }}
        </div>
    </section>
    <!-- End page top -->
    <div class="container">
        <div class="row featured-boxes">
            <div class="col-md-8 col-xs-12">
                {{ CartSummary.cart.default }}
            </div>
            <div class="col-md-4 col-xs-12">
                {{ CartSideSummary.cart.default }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                {{ CouponBox.cart.default }}
            </div>
            <div class="col-xs-12 col-md-6">
                {{ ShippingCalculator.cart.default }}
            </div>
        </div>
    </div>
</div>
<!-- End Main -->