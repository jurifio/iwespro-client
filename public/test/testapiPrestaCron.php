testapiPrestaCron.php<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$request='<?xml version="1.0" encoding="utf-8"?>
<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
  <ErrorLanguage>it_IT</ErrorLanguage>
  <WarningLevel>High</WarningLevel>
  <Item>
  <AutoPay>false</AutoPay>
    <Country>IT</Country>
    <Currency>EUR</Currency>
    <PostalCode>62012</PostalCode>
    <Location>Civitanova Marche</Location>
    <BestOfferDetails>
    <BestOfferEnabled>False</BestOfferEnabled>
    </BestOfferDetails>
    <PrimaryCategory>
      <CategoryID>15709</CategoryID>
    </PrimaryCategory>
    <HitCounter>RetroStyle</HitCounter>
    <Variations>
      <VariationSpecificsSet>
        <NameValueList>
          <Name>Taglia</Name>
          <Value>40</Value>
          <Value>41</Value>
          <Value>42</Value>
          <Value>43</Value>
          <Value>44</Value>
          <Value>45</Value>
        </NameValueList>
        <NameValueList>
          <Name>Color</Name>
          <Value>nero</Value>
        </NameValueList>
        </VariationSpecificsSet>
      <Variation>
        <SKU>prestashop-2537-15461</SKU>
        <StartPrice>179</StartPrice>
        <Quantity>1</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942739</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>40</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
      <Variation>
        <SKU>prestashop-2537-15462</SKU>
        <StartPrice currencyID="EUR">179</StartPrice>
        <Quantity>1</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942746</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>41</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
      <Variation>
        <SKU>prestashop-2537-15463</SKU>
        <StartPrice>179</StartPrice>
        <Quantity>2</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942753</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>42</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
      <Variation>
        <SKU>prestashop-2537-15464</SKU>
        <StartPrice>179</StartPrice>
        <Quantity>2</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942760</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>43</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
      <Variation>
        <SKU>prestashop-2537-15465</SKU>
        <StartPrice>179</StartPrice>
        <Quantity>2</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942777</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>44</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
      <Variation>
        <SKU>prestashop-2537-15466</SKU>
        <StartPrice>179</StartPrice>
        <Quantity>1</Quantity>
      <VariationProductListingDetails>
<EAN>9145472942784</EAN>
<UPC>Non applicabile</UPC>
      </VariationProductListingDetails>
        <VariationSpecifics>
          <NameValueList>
            <Name>Taglia</Name>
            <Value>45</Value>
          </NameValueList>
          <NameValueList>
            <Name>Color</Name>
            <Value>nero</Value>
          </NameValueList>
        </VariationSpecifics>
      </Variation>
    </Variations>
    <ListingDuration>GTC</ListingDuration>
    <ListingType>FixedPriceItem</ListingType>
<PictureDetails>      <PictureURL>https://dev.iwes.shop/9688/ebay.jpg</PictureURL>
      <PictureURL>https://dev.iwes.shop/9689/ebay.jpg</PictureURL>
      <PictureURL>https://dev.iwes.shop/9690/ebay.jpg</PictureURL>
      <PictureURL>https://dev.iwes.shop/9691/ebay.jpg</PictureURL>
</PictureDetails>    <ItemSpecifics>
      <NameValueList>
        <Name><![CDATA[MPN]]></Name>
        <Value><![CDATA[185887-5979540]]></Value>
      </NameValueList>
      <NameValueList>
        <Name><![CDATA[Marca]]></Name>
        <Value><![CDATA[P448]]></Value>
      </NameValueList>
    
    </ItemSpecifics>
    <ConditionID>1000</ConditionID>
    <Title><![CDATA[Pluto Rita Basse P448 JHON WHITE BLACK nero]]></Title>
    <Description>
      <![CDATA[<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="" />
        <meta name="keywords" content="{{keywords}}" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<style>

* {
    padding: 0;
    margin: 0;
    outline: none;
    border: none;
    list-style: none;
    box-sizing: border-box;
    font-family: \'Montserrat\', sans-serif;
}
p {
	font-size: 14px;
	font-weight: 300;
	line-height: 26px;
	color: #4b4b4b;
}
img {
	max-width: 100%;
	max-height: -webkit-fill-available;
}
.wrapper {
    margin: 0 auto;
    width: 90%;
    max-width: 1200px;
}
.clear {
    clear: both;
}
main,
header,
section,
.store_faetures ul,
.footer_features ul,
footer {
	width: 100%;
	float: left;
}
header {
	padding: 20px 0;
	text-align: center;
}
header a {
	display: inline-block;
}
.store_features {
	background: #323b47;
}
.store_features li {
	width: 25%;
	display: table;
	float: left;
}
.store_features li div {
	padding-right: 5%;
	width: 30%;
	height: 100px;
	display: table-cell;
	vertical-align: middle;
	text-align: right;
}
.store_features li h3 {
	display: table-cell;
	vertical-align: middle;
	font-size: 15px;
	font-weight: 400;
	color: #FFF;
}
.store_features li h3 span {
	font-size: 13px;
	font-weight: 300;
}
.gif_img {
	display: none;
}
.title {
	padding: 20px;
	border: 1px solid #e9e9e9;
	border-top: none;
	text-align: center;
}
.title h2 {
	font-size: 24px;
	font-weight: 400;
	color: #323b47;
}
.image_gallery {
	margin-bottom: 20px;
	padding: 20px;
    text-align: center;
}
/*GALLERY CSS*/
.container {
    width: 100%;
    position: relative;
    margin:0 auto;
}
.thumbnails {
	text-align: center;
    list-style: none;
    font-size: 0;
}
.thumbnails li {
    margin: 15px 8px 0 8px;
    width: 90px;
	height: 90px;
	background: #fff;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
}
.thumbnails input[name="select"] {
    display: none;
}
.thumbnails .item-hugger {
	padding: 5px;
	width: 100%;
	height: 100%;
    position: relative;
	display: flex;
    flex-direction: column;
    justify-content: center;
	align-items: center;
	border: 1px solid #e3e3e3;
    transition: all 150ms ease-in-out;
}
.thumbnails label {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    cursor: pointer;
}
.thumbnails .gallery_content {
	max-width: 540px;
    width: 100%;
    height: 500px;
	background: #fff;
    transition: all 150ms linear;
    display: flex;
    flex-direction: column;
    justify-content: center;
	align-items: center;
    overflow: hidden;
	opacity: 0;
	position: absolute;
    top: 0;
    left: 50%;
	transform: translateX(-50%);
}
.thumbnails input[name="select"]:checked + .item-hugger {
    border-color: #a2a2a2;
}
.thumbnails input[name="select"]:checked ~ .gallery_content {
    opacity: 1;
}
.white-box {
    height: 500px;
    overflow: hidden;
}
.temp_content {
	margin-bottom: 40px;
}
.temp_content h2 {
	padding: 12px 20px;
	background: #323b47;
	font-size: 24px;
	font-weight: 400;
	color: #FFF;
}
.description {
	padding: 20px;
	border: 1px solid #e9e9e9;
	border-top: none;
}
.description ul {
	margin-bottom: 20px;
}
.description ul li,
.tab-content ul li {
	padding: 5px 10px 5px 20px;
	background: url(https://wearephoenixteam.com/ebay/free-templates/images/temp6/bullet.png) left 10px no-repeat;
	font-weight: 300;
	font-size: 14px;
	color: #4b4b4b;
}
.vertabs {
	margin-bottom: 40px;
}
/*CSS VRETICAL TABS*/
.css_tab {
    width: 100%;
    float: left;
    position: relative;
}
.css-tab {
    display: none;
}
.css_tab li {
    display: inline-block;
    float: left;
    width: 100%;
}
.css_tab li label {
    padding: 15px;
    width: 250px;
    background: #323b47;
    font-family: \'Montserrat\', sans-serif;
    text-align: left;
    font-size: 16px;
    font-weight: 400;
    color: #FFF;
    position: absolute;
    left: 1px;
    top: 1px;
    float: left;
    cursor: pointer;
}
.css_tab li:nth-child(2) label {
    top: 52px;
}
.css_tab li:nth-child(3) label {
    top: 103px;
}
.css_tab li:nth-child(4) label {
    top: 154px;
}
.css_tab li:nth-child(5) label {
    top: 205px;
}
.css_tab li:nth-child(6) label {
    top: 256px;
}
.css_tab li:nth-child(7) label {
    top: 307px;
}
.css-tab:checked + .tab-label {
    background: #FFF;
	color: #323b47;
}
.tab-label:hover {
    background: #F2F2F2;
	color: #323b47;
}
#tab1:checked ~ #tab-content1,
#tab2:checked ~ #tab-content2,
#tab3:checked ~ #tab-content3,
#tab4:checked ~ #tab-content4,
#tab5:checked ~ #tab-content5,
#tab6:checked ~ #tab-content6,
#tab7:checked ~ #tab-content7 {
    display: block;
}
.tab-content {
    padding: 30px 20px 30px 270px;
    width: 100%;
    border: solid 1px #e9e9e9;
    display: none;
    text-align: left;
    float: left;
    min-height: 410px;
}
.tab-content h2{
	margin-bottom: 20px;
	text-align: center;
    font-size: 24px;
	letter-spacing: 1px;
    font-weight: 400;
    color: #323b47;
}
.footer_features {
	margin-bottom: 20px;
}
.footer_features ul li {
	margin: 0 2.66% 20px 0;
	width: 23%;
	float: left;
}
.footer_features ul li:nth-child(4) {
	margin-right: 0;
}
.footer_features ul li div {
	width: 100%;
	height: 120px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	background: #323b47;
	text-align: center;
	vertical-align: middle;
}
.footer_features ul li h2 {
	padding: 10px;
	text-align: center;
	font-size: 24px;
	font-weight: 400;
	letter-spacing: 1px;
	line-height: 24px;
	color: #323b47;
	border: 1px solid #323b47;
}
.footer_features ul li h2 span {
	font-size: 13px;
}
footer {
	padding: 30px 20px;
	text-align: center;
	border-top: 1px solid #e9e9e9;
}
@media only screen and (max-width: 840px) {
	.store_features {
		text-align: center;
	}
	.store_features ul {
		display: none;
	}
	.gif_img {
		display: inline-block;
	}
	/*tab-css*/
    .css_tab li label {
        padding: 15px;
        width: 100% !important;
        position: static;
        background: #323b47 url(https://wearephoenixteam.com/ebay/free-templates/images/temp6/plus.png) right center no-repeat;
        text-align: left;
        border: none;
    }
    .css_tab li{
        margin-bottom: 1px;
    }
    .tab-content {
        padding: 15px 20px;
    }
    .css_tab li label:hover{
        background: #d8d8d8 url(https://wearephoenixteam.com/ebay/free-templates/images/temp6/plus.png) right center no-repeat;
        border: none;
    }
    .css-tab:checked + .tab-label{
        border-bottom: 1px solid #ddd;
        background: #d8d8d8 url(https://wearephoenixteam.com/ebay/free-templates/images/temp6/images/minus.png) right center no-repeat;
    }
	.footer_features ul li {
		margin-right: 4%;
		width: 48%;
	}
	.footer_features ul li:nth-child(2n) {
		margin-right: 0;
	}
}
@media only screen and (max-width: 640px) {
	.footer_features ul li {
		margin-right: 0 !important;
		width: 100%;
	}
	.thumbnails .gallery_content,
	.white-box {
		height: 400px;
	}
}
</style>
	</head>
	<body>
<p></p>
<p></p>
<p></p>
<p></p>
<p><main>
<div class="wrapper"><header><a><img src="https://www.cartechinishop.com/assets/logowide.png" alt="" /></a></header>
<section class="store_features">
<ul>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/shipping.png" alt="" /></div>
<h3>SPEDIZIONE VELOCE<br /><span>On All Items</span></h3>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/moneyback.png" alt="" /></div>
<h3>30 DAYS MONEYBACK<br /><span>Restituzioni senza problemi</span></h3>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/support.png" alt="" /></div>
<h3>SUPPORTO CLIENTI<br /><span>Servizio Eccellente</span></h3>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/satisfaction.png" alt="" /></div>
<h3>100% SODDISFAZIONE<br /><span>Soddisfazione Garantita</span></h3>
</li>
</ul>
<img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/gif-img.gif" class="gif_img" alt="" /></section>
<section class="title">
<h2>Basse P448 JHON WHITE BLACK nero</h2>
</section>
<section class="reference">
<h2>185887-5979540</h2>
</section>
<section class="ean13">
<h2>9145472942722</h2>
</section>
<section class="image_gallery" margin-top:="">
<div class="container">
<div class="white-box"></div>
<ul class="thumbnails">
<li><input type="radio" name="select" id="image1" checked="checked" />
<div class="item-hugger"><img src="https://dev.iwes.shop/9688/ebay.jpg" class="bodyMainImageProductPrestashop"/><label for="image1"></label></div>
<div class="gallery_content"><img src="https://dev.iwes.shop/9688/ebay.jpg" class="bodyMainImageProductPrestashop"/></div>
</li>
<li class="is-active"><input type="radio" name="select" id="image2" />
<div class="item-hugger"><img src="https://dev.iwes.shop/9688/ebay.jpg" class="bodyFirstMediumImageProductPrestashop"/><label for="image2"></label></div>
<div class="gallery_content"><img src="https://dev.iwes.shop/9688/ebay.jpg" class="bodyFirstMediumImageProductPrestashop"/></div>
</li>
<li><input type="radio" name="select" id="image3" />
<div class="item-hugger"><img src="https://dev.iwes.shop/9689/ebay.jpg" class="bodyMediumImageProductPrestashop"/> <label for="image3"></label></div>
<div class="gallery_content"><img src="https://dev.iwes.shop/9689/ebay.jpg" class="bodyMediumImageProductPrestashop"/></div>
</li>
<li><input type="radio" name="select" id="image4" />
<div class="item-hugger"><img src="https://dev.iwes.shop/9690/ebay.jpg" class="bodyMediumImageProductPrestashop"/><label for="image4"></label></div>
<div class="gallery_content"><img src="https://dev.iwes.shop/9690/ebay.jpg" class="bodyMediumImageProductPrestashop"/></div>
</li>
</ul>
</div>
</section>
<section class="temp_content">
<h2>Descrizione Prodotto</h2>
<div class="description">
<div vocab="https://schema.org/" typeof="Product">
<p>descrizione</p>
</div>
<p>Basse P448 JHON WHITE BLACK nero<br /></p>
</div>
</section>
<section class="vertabs">
<ul class="css_tab">
<li><input id="tab1" class="css-tab" name="tab" checked="checked" type="radio" /> <label for="tab1" class="tab-label">SPEDIZIONI</label>
<div id="tab-content1" class="tab-content">
<h2>MODALITA\'</h2>
<p><br /> SPEDIZIONE IMMEDIATA ANCHE IN CONTRASSEGNO</p>
<p>ACQUISTA ORA E RICEVI IN 24/48 ORE !!! (sabato e domenica esclusi)</p>
<h2><a name="disponibilita-dei-prodotti"></a>Disponibilit&agrave; dei prodotti</h2>
<p>Ricevuto l\'ordine, Cartechini Group snc procede, prima della spedizione, al controllo qualit&agrave; e alla conferma mediante e-mail dell\'ordine in lavorazione. Qualora gli articoli ordinati non siano pi&ugrave; disponibili o non abbiano superato il controllo qualit&agrave; ne daremo immediata comunicazione al cliente proponendo possibili alternative.</p>
<h2><a name="evasione-degli-ordini"></a>Evasione degli ordini</h2>
<p>Gli ordini saranno evasi entro 48 ore dall&rsquo;esito positivo del pagamento. E\' facolt&agrave; di Cartechini Group snc rifiutare ordini a chiunque per qualsiasi motivo.</p>
<h2><a name="modalita-di-spedizione"></a>Modalit&agrave; di spedizione</h2>
<p>Tutte le consegne effettuate da Cartechini Group snc sono coperte da assicurazione contro il furto e danni accidentali. Ritirata la consegna la copertura assicurativa si estingue.</p>
<h2><a name="consegna"></a>Consegna</h2>
<p>Gli ordini verranno spediti da Cartechini Group snc, da Luned&igrave; al Venerd&igrave; dalle 9:00 CET alle 17:30 CET.</p>
<p>Gli ordini effettuati durante il fine settimana saranno processati il luned&igrave; successivo.</p>
<p>Gli ordini saranno processati entro le 48 ore dalla ricezione del pagamento per ordini ricevuti entro le ore 11:30 CET.</p>
<p>Informiamo che non effettuiamo spedizioni verso caselle postali.</p>
<h3>Spedizioni</h3>
<table class="table table-hover table-responsive">
<thead>
<tr><th>Paese</th><th>Tempi di consegna</th><th>Costi</th></tr>
</thead>
<tbody>
<tr>
<td>Italia</td>
<td>1-2 giorni lavorativi</td>
<td>5,00 EUR</td>
</tr>
<tr>
<td>Europa</td>
<td>3-5 giorni lavorativi</td>
<td>10,00 EUR</td>
</tr>
<tr>
<td>Altri</td>
<td>5-7 giorni lavorativi</td>
<td>10,00 EUR</td>
</tr>
</tbody>
<tfoot>
<tr>
<td colspan="3"></td>
</tr>
</tfoot>
</table>
<h3>Resi</h3>
<table class="table table-hover table-responsive">
<thead>
<tr><th>Paese</th><th>Costo</th><th>Rimborso</th></tr>
</thead>
<tbody>
<tr>
<td>Italia</td>
<td>customer charged</td>
<td>24h</td>
</tr>
<tr>
<td>Europa</td>
<td>customer charged</td>
<td>24h</td>
</tr>
<tr>
<td>Altri</td>
<td>customer charged</td>
<td>24h</td>
</tr>
</tbody>
<tfoot>
<tr>
<td colspan="3"></td>
</tr>
</tfoot>
</table>
</div>
</li>
<li><input id="tab2" class="css-tab" name="tab" type="radio" /> <label for="tab2" class="tab-label">FEEDBACK</label>
<div id="tab-content2" class="tab-content">
<h2>FEEDBACK</h2>
<p>Lasciaci sempre un Feedback Positivo! Siamo professionisti e siamo sempre disponibili per risolvere e chiarire qualsiasi incomprensione. Lasciare un Feedback negativo o neutro &egrave; inutile e non risolve un eventuale problema!</p>
</div>
</li>
<li><input id="tab3" class="css-tab" name="tab" type="radio" /> <label for="tab3" class="tab-label">PAGAMENTO</label>
<div id="tab-content3" class="tab-content">
<h2><a name="modalita-di-pagamento"></a>Carta di credito</h2>
<p>Accettiamo le seguenti carte di credito o di debito:</p>
<div class="row">
<div class="col-xs-2"><img src="https://www.iwes.it/visa.png" width="100" /></div>
<div class="col-xs-2"><img src="https://www.iwes.it/visae.png" width="100" /></div>
<div class="col-xs-2"><img src="https://www.iwes.it/mastercard.png" width="100" /></div>
<div class="col-xs-2"><img src="https://www.iwes.it/maestro.png" width="100" /></div>
<div class="col-xs-2"><img src="https://www.iwes.it/diners.png" width="100" /></div>
<div class="col-xs-2"><img src="https://www.iwes.it/amex.png" width="100" /></div>
</div>
<p>Tutte le transazioni ed in generale ogni pagina del sito, comprese quelle dedicate alla raccolta dei dati personali per la registrazione e l\'invio degli ordini, sono processate tramite server sicuro con crittografia a 128 bit, garantendo ai clienti Cartechinishop.com la massima protezione dei dati.</p>
<h3>Pagamento con Verified by Visa o Mastercard SecureCode</h3>
<p>Il sistema controlla se la carta utilizza i programmi di sicurezza 3-D-secure oppure si tratta di protocolli di sicurezza elaborati per questo tipo di carte per verificare che la transazione sia effettuata dall&rsquo;effettivo titolare della carta di credito. Se un titolare di carta di credito &egrave; iscritto al programma di sicurezza 3-D-secure, verr&agrave; richiesto di inserire il &ldquo;secure code&rdquo; (un codice scelto da Voi). Solo inserendo il codice esatto, la transazione sar&agrave; eseguita.</p>
<p><i>Se la carta di credito non &egrave; registrata per nessuno di questi procedimenti di sicurezza, il pagamento sar&agrave; effettuato senza alcuna richiesta.</i></p>
<p>Per ulteriori informazioni sui procedimenti di sicurezza per carte di credito vai su: <a href="https://www.visaitalia.com/carte-per-te/acquisti-online/verified-by-visa/" target="_blank">Verified by Visa</a> oppure <a href="http://www.mastercard.com/it/privati/servizi_securecode.html" target="_blank">Mastercard SecureCode</a></p>
<h2><a name="paypal"></a>PayPal</h2>
<p>In caso di pagamento tramite PayPal verrai automaticamente trasferito alla pagina di pagamento PayPal. Se si &egrave; gi&agrave; clienti PayPal, sar&agrave; sufficiente accedere con i propri dati e confermare il pagamento. Se non si possiede un conto PayPal, &egrave; possibile aprirne uno e confermare il pagamento.</p>
<h2><a name="bonifico-bancario"></a>Bonifico bancario</h2>
<p>Durante il processo di acquisto &egrave; possibile scegliere &ldquo;Bonifico Bancario&rdquo; come modalit&agrave; di pagamento. Il Cliente riceve automaticamente una email contenente i dati bancari di Cartechinishop.com. I prodotti ordinati verranno riservati in attesa dell&rsquo;arrivo del bonifico bancario sul conto. Il cliente dovr&agrave; inviare via email copia del pagamento entro 48 ore oltrepassate le quali l&rsquo;ordine verr&agrave; automaticamente cancellato. Scegliendo la &ldquo;modalit&agrave; di pagamento&rdquo; Bonifico Bancario dovr&agrave; trasferire il totale dell&rsquo;ordine al seguente conto bancario, indicando il numero dell&rsquo;ordine:</p>
<p>CARTECHINI GROUP S.N.C DI CARTECHINI GIANLUCA & C.<br /> IBAN: IT68X0521613400000000001868</p>
<p>L\'ordine sar&agrave; spedito subito dopo la ricezione dell&rsquo;accredito sul nostro conto bancario.</p>
<h2><a name="contrassegno"></a>Contrassegno</h2>
<p>Il pagamento con contrassegno &egrave; valido solo per i seguenti paesi: <strong>Italia</strong> e per importi inferiori a 1.000 EUR</p>
<p>Tramite questo metodo di pagamento pagherai il totale dell\'ordine direttamente al corriere al momento della consegna. Ricordati di preparare l\'importo esatto dell\'ordine in quanto il corriere non &egrave; autorizzato a dare resto. Non &egrave; possibile pagare il contrassegno con assegno bancario di nessun genere</p>
<h2><a name="pick-and-pay"></a>Pick And Pay</h2>
<p>Se lo preferisci puoi prenotare il tuo ordine e ritirarlo presso la nostra sede. L\'indirizzo della sede e gli orari di apertura al pubblico ti verranno comunicati durante il processo di acquisto.</p>
</div>
</li>
<li><input id="tab4" class="css-tab" name="tab" type="radio" /> <label for="tab4" class="tab-label">RESTITUZIONE</label>
<div id="tab-content4" class="tab-content">
<h2>RETURNS POLICY</h2>
<p>Si accettata la restituzione dell\'oggetto entro 14 gg lavorativi dal ricevimento del prodotto previo accordo e una valida motivazione. Le spese di restituzione merce sono a carico dell\'acquirente. Al ricevimento dell\'oggetto verificheremo l\'integrit&agrave; del prodotto,che dovr&agrave; essere perfettamente integro,mai usato e completo di tutti gli accessori,dopodich&eacute; rimborseremo il solo costo dell\'oggetto. In caso di cambio merce i costi di tutte le spedizioni sono a carico dell\'acquirente</p>
</div>
</li>
<li><input id="tab5" class="css-tab" name="tab" type="radio" /> <label for="tab5" class="tab-label">SOSTITUZIONE</label>
<div id="tab-content5" class="tab-content">
<h2>TERMINI PER LA SOSTITUZIONE</h2>
<p>Copyright &copy; 2015-2018 Iwes</p>
</div>
</li>
<li><input id="tab6" class="css-tab" name="tab" type="radio" /> <label for="tab6" class="tab-label">CANCELLAZIONE</label>
<div id="tab-content6" class="tab-content">
<h2>CANCELLAZIONE</h2>
</div>
</li>
<li><input id="tab7" class="css-tab" name="tab" type="radio" /> <label for="tab7" class="tab-label">CONTATTI</label>
<div id="tab-content7" class="tab-content">
<h2>CONTATTACI</h2>
<p>tel. +39 02 379 20 266<br /> &nbsp;mob. +39 327 55 90 989<br /> &nbsp;email.&nbsp;support@cartechinishop.com&nbsp;</p>
</div>
</li>
</ul>
</section>
<section class="footer_features">
<ul>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/free-ship.png" alt="s" /></div>
<h2>Spedizione Gratuita<br /><br /><span>ordini superiori ai 300 Euro</span></h2>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/money-back.png" alt="s" /></div>
<h2>Garanzia Rimborsi<br /><br /><span>1 giorno lavorativo</span></h2>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/best-quality.png" alt="s" /></div>
<h2>I Migliori Brand <br /><br /><span>Soddisfazione dei Clienti</span></h2>
</li>
<li>
<div><img src="https://wearephoenixteam.com/ebay/free-templates/images/temp6/paypal.png" alt="s" /></div>
<h2>Accettiamo<br /><br /><span>PayPal </span></h2>
</li>
</ul>
</section>
<footer>
<table valign="center" align="center" width="100%">
<tbody>
<tr>
<td align="left" style="background: #323b47; font-color: #ffffff;">
<p>Copyright &copy; Cartechini Group snc | All Rights Reserved</p>
</td>
<td align="right" style="background: #323b47;"><img width="150" height="35" src="https://www.iwes.it/wp-content/uploads/2018/09/Logo2.png" /></td>
</tr>
</tbody>
</table>
</footer>
<div class="clear"></div>
</div>
</main></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
</body>
</html><div style="font-size: small; visibility:hidden;">
<center>
<span style="font-size: small; color: #28BFB3;">Prestalia</span>
<em> e-commerce solutions.</em>
</center>
</div>
    </div>
						</td>
	</tr>
</table><div style="font-size: small; visibility:hidden;">
<center>
<span style="font-size: small; color: #28BFB3;">Prestalia</span>
<em> e-commerce solutions.</em>
</center>
</div>]]>
    </Description>
<Storefront><StoreCategoryID>4895391011</StoreCategoryID></Storefront>    <PostalCode>62012</PostalCode>
    <Location>Civitanova Marche</Location>
        <DispatchTimeMax>2</DispatchTimeMax>
    <PaymentMethods>PayPal</PaymentMethods>
    <PayPalEmailAddress>transazioni@cartechinishop.com</PayPalEmailAddress>
        <SellerProfiles> 
        <SellerPaymentProfile> 
         <PaymentProfileID>142598637016</PaymentProfileID>
         <PaymentProfileName>PayPal:Bonifico bancario accettato:Copy (3)</PaymentProfileName>
        </SellerPaymentProfile> 
        <SellerReturnProfile> 
         <ReturnProfileID>147965984016</ReturnProfileID>
         <ReturnProfileName>Restituzione accettata,Acquirente,30 giorni</ReturnProfileName>
        </SellerReturnProfile> 
        <SellerShippingProfile> 
         <ShippingProfileID>140157110016</ShippingProfileID>
         <ShippingProfileName>Tariffa fissa:Altro corriere Gratis/UE 10/EXUE 40</ShippingProfileName>
        </SellerShippingProfile> 
        </SellerProfiles>
     <SiteId>101</SiteId>    
    <Site>Italy</Site>
  </Item>
  <RequesterCredentials>
    <eBayAuthToken>v^1.1#i^1#r^1#p^3#I^3#f^0#t^Ul4xMF8xOjk3MDVGODY4MkI3QUI4QkZGNzlGRTAwMjQwMjk4NkI4XzBfMSNFXjI2MA==</eBayAuthToken>
  </RequesterCredentials>
  <WarningLevel>High</WarningLevel>
</AddItemRequest>
';
$devID = '9c29584f-1f9e-4c60-94dc-84f786d8670e';
$appID = 'VendiloS-c310-4f4c-88a9-27362c05ea78';
$certID = '3050bb00-db24-4842-999c-b943deb09d1a';
$siteID=101;

$apiUrl = 'https://api.ebay.com/ws/api.dll';
$apiCall = 'AddItem';
$compatibilityLevel = 741;

$runame = 'Vendilo_SpA-VendiloS-c310-4-prlqnbrjv';
$loginURL = 'https://signin.ebay.it/ws/eBayISAPI.dll';

$headers = array(
    // Regulates versioning of the XML interface for the API
    'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $compatibilityLevel,
    // Set the keys
    'X-EBAY-API-DEV-NAME: ' . $devID,
    'X-EBAY-API-APP-NAME: ' . $appID,
    'X-EBAY-API-CERT-NAME: ' . $certID,
    // The name of the call we are requesting
    'X-EBAY-API-CALL-NAME: ' . $apiCall,
    // SiteID must also be set in the Request's XML
    // SiteID = 0 (US) - UK = 3, Canada = 2, Australia = 15, ....
    // SiteID Indicates the eBay site to associate the call with
    'X-EBAY-API-SITEID: ' . $siteID
);
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, $apiUrl);

curl_setopt($connection, CURLINFO_HEADER_OUT, true);
// Stop CURL from verifying the peer's certificate
curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

// Set the headers (Different headers depending on the api call !)

curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

curl_setopt($connection, CURLOPT_POST, 1);

// Set the XML body of the request
curl_setopt($connection, CURLOPT_POSTFIELDS, $request);

// Set it to return the transfer as a string from curl_exec
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

// Send the Request
$response = curl_exec($connection);
var_dump($response);$ebayOrders = new \SimpleXMLElement($response);

$reponseNewProduct = new \SimpleXMLElement($response);

$id_product_ref = $reponseNewProduct->ItemID;
echo $id_product_ref;
if(strlen($id_product_ref)>8) {
    echo 'si';
}

