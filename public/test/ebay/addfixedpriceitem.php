<?php
require "ebayconfig.php";

/** @var \bamboo\domain\entities\CProduct $product */
//$product = $ninetyNineMonkey->repoFactory->create('Product')->findOne([30089,81133]);

$marketplaceAccountHasProducts = $ninetyNineMonkey->repoFactory->create('MarketPlaceAccountHasProduct')->findBy(['isToWork'=>1],"limit 1");


foreach ($marketplaceAccountHasProducts as $marketplaceAccountHasProduct) {
	$product = $marketplaceAccountHasProduct->product;
	$configDev = $marketplaceProduct->marketplaceAccount;
	$configDev = $configDev->config;
	$c = new \bamboo\core\ebay\api\trading\call\CEbayAddFixedPriceItemCall($configDev);
	try {
		$c->getMainRequestElement()->getRequesterCredentials()->getEBayAuthToken()->setValue($configDev['userToken']);
		$i = $c->getMainRequestElement()->getItem();
		$i->setTitle($product->getName());
		$i->setDescription(empty($product->productDescriptionTranslation->getFirst()->description) ? "descrizione di prova" : $product->productDescriptionTranslation->getFirst()->description);
		//$i->getStartPrice()->setValue($product->getDisplayPrice());//$product->getDisplayPrice()
		$i->getCategoryMappingAllowed()->setValue(true);
		$i->getConditionID()->setValue(1000);
		$i->setCountry('IT');
		$i->setCurrency('EUR');
		$i->getDispatchTimeMax()->setValue(3);
		$i->getListingDuration()->setValue('Days_30');
		$i->getListingType()->setValue('FixedPriceItem');

		$i->setPaymentMethods(new \bamboo\core\ebay\api\trading\enum\CEbayBuyerPaymentMethodCodeEnum('PayPal'));
		$i->getPayPalEmailAddress()->setValue('transazioni@pickyshop.com');

		$amazon = "https://s3-eu-west-1.amazonaws.com/iwes/";
		for ($x = 0; $x < 10; $x++) {
			if ($url = $product->getPhoto($x, 1124)) $i->getPictureDetails()->setPictureURL($amazon.$url);
		}
		$i->getPostalCode()->setValue('62012');
		//finire qui sotto;
		/*$i->getProductListingDetails()->getBrandMPN()->getBrand()->setValue($product->productBrand->name);
		$i->getProductListingDetails()->getBrandMPN()->getMPN()->setValue($product->itemno.' '.$product->productVariant->name);
		*/
		$i->getProductListingDetails()->setIncludeStockPhotoURL(false);
		$i->getProductListingDetails()->getBrandMPN()->setBrand($product->productBrand->name);
		$i->getProductListingDetails()->getBrandMPN()->setMPN($product->itemno.' '.$product->productVariant->name);
		$i->getReturnPolicy()->getReturnsAcceptedOption()->setValue('ReturnsAccepted');
		$i->getReturnPolicy()->getRefundOption()->setValue('MoneyBack');
		$i->getReturnPolicy()->getReturnsWithinOption()->setValue('Days_15');

		$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
		$value->setName('Brand');
		$value->setValue($product->productBrand->name);
		$i->getItemSpecifics()->setNameValueList($value);

		$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
		$value->setName('Color');
		$color = !is_null($product->productColorGroup->getFirst()) ? $product->productColorGroup->getFirst()->name : 'Non Definito';
		$value->setValue($color);
		$i->getItemSpecifics()->setNameValueList($value);

		$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
		$value->setName('Color Variation');
		$value->setValue($product->productVariant->name);
		$i->getItemSpecifics()->setNameValueList($value);

		$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
		$value->setName('Color Description');
		$value->setValue($product->productVariant->description);
		$i->getItemSpecifics()->setNameValueList($value);

		foreach($product->productSheetActual as $sheetRow) {
			$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
			/** @var $sheetRow \bamboo\domain\entities\CProductSheetActual */
			//$value->setName($sheetRow->productDetailLabel->productDetailLabelTranslation->getFirst()->name);
			$value->setValue($sheetRow->productDetail->productDetailTranslation->getFirst()->name);
			$i->getItemSpecifics()->setNameValueList($value);
		}

		$skus = [];
		foreach ($product->productSku as $sku) {
			/** @var $sku \bamboo\domain\entities\CProductSku */
			if(!isset($skus[$sku->printPublicSku()])) {
				$skus[$sku->printPublicSku()]= [];
				$skus[$sku->printPublicSku()]['qty'] = 0;
				$skus[$sku->printPublicSku()]['skus'] = [];
			}
			$skus[$sku->printPublicSku()]['qty'] += $sku->stockQty;
			$skus[$sku->printPublicSku()]['skus'][] = $sku;
		}
		$nameValueListSize = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
		$nameValueListSize->setName('Size');

		foreach ($skus as $skuSize) {
			$nameValueListSize->setValue($skuSize['skus'][0]->productSize->name);

			$variation = new \bamboo\core\ebay\api\trading\types\CEbayVariationType();
			$variation->setSKU($skuSize['skus'][0]->printPublicSku());
			$variation->setQuantity($skuSize['qty']);
			$variation->setStartPrice($skuSize['skus'][0]->getActivePrice());

			$nameValueList = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();
			$nameValueList->setName('Size');
			$nameValueList->setValue($skuSize['skus'][0]->productSize->name);

			$variation->getVariationSpecifics()->setNameValueList($nameValueList);
			//$variation->getVariationTitle()->setValue($skuSize['skus'][0]->productSize->name);

			$value = new \bamboo\core\ebay\api\trading\types\CEbayNameValueListType();

			$i->getVariations()->setVariation($variation);
		}

		$i->getVariations()->getVariationSpecificsSet()->setNameValueList($nameValueListSize);

		$i->getPrimaryCategory()->getCategoryID()->setValue('53557');

		$i->getReturnPolicy()->getReturnsAccepted()->setValue('Reso disponibile');
		$i->getReturnPolicy()->getReturnsAcceptedOption()->setValue('ReturnsAccepted');

		$i->getReturnPolicy()->getRefund()->setValue('Cambio del prodotto o rimborso disponibili');
		$i->getReturnPolicy()->getRefundOption()->setValue('MoneyBackOrReplacement');

		$i->getReturnPolicy()->getReturnsWithin()->setValue('Reso entro 14 giorni dall\'acquisto');
		$i->getReturnPolicy()->getReturnsWithinOption()->setValue('Days_14');

		$c->getMainRequestElement()->setItem($i);
	} catch (Exception $e) {
		throw $e;
	}
	file_put_contents($ninetyNineMonkey->rootPath().'/temp/request.xml',$c->getRawRequest());
	file_put_contents($ninetyNineMonkey->rootPath().'/temp/response.xml',$c->call()->getRawResponse());
	//var_dump($c->getRawRequest(),$c->call()->getRawResponse());

	$c->parseResponse();
	$r = $c->getMainResponseElement();

	if($r->getAck() == 'Failure') {
		die(var_dump($r->toXml()));
	} else {
		$marketplaceProduct->marketplaceProductId = $r->getItemID();
		$marketplaceProduct->isToWork = 0;
		$marketplaceProduct->isRevised = 1;
		$marketplaceProduct->lastRevised = new DateTime();
		$marketplaceProduct->publishDate = new DateTime();
		$marketplaceProduct->insertionDate = new DateTime();
		$marketplaceProduct->update();
	}
}


//README USATO PER FARE TROVA E SOSTITUISCI
//var $pattern = '^([\s]+)\$this->([a-zA-Z0-9]+) = ([\$0-9a-zA-Z]+);$';
//var $replace = '$1\$this->set("$2",$3);';