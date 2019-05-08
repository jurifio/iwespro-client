<!-- Begin Main -->
<div role="main" class="main">


    <!-- Begin page top -->
    <section class="page-top">
        <div class="container">
            {{ ContentTitle.default.checkout }}
        </div>
    </section>
    <!-- End page top -->

    <div class="container">

        <?php if (isset($_GET['e'])): ?>

            <div class="row">
                <div class="col-md-12 animation animated fadeInUp">
                    <?php
                    switch ($_GET['e']) {
                        case -10:
                            $error = "Attenzione";
                            $message = "Devi effettuare il login per continuare";
                            break;
                        case -20:
                            $error = "Attenzione";
                            $message = "Il prodotto non è più disponibile nella taglia selezionata";
                            break;
                        case -30:
                            $error = "Attenzione";
                            $message = "Il coupon non è più valido";
                            break;
                        default:
                            $error = "Errore";
                            $message = "Errore grave, tenta di nuovo fra qualche minuto";
                            break;
                    }
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php tpe($error); ?></strong> <?php tpe($message); ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <div class="row featured-boxes">
            <div class="col-md-3">
                {{ AddressDisplay.checkout.shipping }}
                <a class="btn btn-checkout btn-block btn-sm"href="/it/spedizione" data-loading-text="Loading...">Modifica</a>
            </div>

            <div class="col-md-3">
                {{ AddressDisplay.checkout.billing }}
                <a class="btn btn-checkout btn-block btn-sm"href="/it/spedizione" data-loading-text="Loading...">Modifica</a>
            </div>

            <div class="col-md-2">
                {{ PaymentDisplay.checkout.default }}
                <a class="btn btn-checkout btn-block btn-sm"href="/it/metodo-pagamento" data-loading-text="Loading...">Modifica</a>
            </div>

            <div class="col-md-4">
                {{ CouponBox.cart.default }}
            </div>

        </div>

        <div class="row featured-boxes">
            <div class="col-md-8">
                {{ CartSummary.checkout.default }}
            </div>
            <div class="col-md-4">
                {{ CartSideSummary.checkout.default }}
            </div>
        </div>
    </div>

</div>
<!-- End Main -->