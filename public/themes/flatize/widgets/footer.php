<!-- begin footer -->
<footer <?php echo $data->footerAttrs;?> itemscope itemtype="http://schema.org/Organization">
    <div class="container">
        <div class="upper-foot">
            <div class="row">
                {{ Address.footer.default }}
                {{ Newsletterbox.default.default }}
                {{ Linkbox.footer.default }}
                <div class="col-xs-6 col-sm-3">
                    <div class="fb-like" data-href="https://www.facebook.com/pickyshopcom" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                </div>
            </div>
            <div>
                
            </div>
        </div>
        <div class="below-foot">
            <div class="row">
                {{ Copyright.footer.default }}
                {{ SSLLogo.footer.default }}
                {{ Socialicons.footer.default }}
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->