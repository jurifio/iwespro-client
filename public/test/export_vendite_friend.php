<?php
require "../../iwesStatic.php";

$q =
"SELECT
  o.id             AS ordine,
  ol.id            AS riga,
  ol.fullPrice     AS prezzo_pieno,
  ol.activePrice   AS prezzo_attivo,
  ol.netPrice      AS prezzo_vero,
  ifnull(o.paidAmount,0) > 0 as pagato,
  s.title          AS friend,
  u.email          AS utente,
  ol.friendRevenue AS prezzo_friend,
  ps.value as costo,
  opm.name as metodo_pagamento,
  date(orderDate)
FROM `Order` o, OrderLine ol, Shop s, User u, OrderPaymentMethod opm, ProductSku ps
WHERE ps.productId = ol.productId and
      ps.productVariantId = ol.productVariantId and
      ps.shopId = ol.shopId and
      ps.productSizeId = ol.productSizeId and
      o.orderPaymentMethodId = opm.id AND
      o.id = ol.orderId AND
      ol.shopId = s.id AND
      o.status LIKE 'ORD_%' AND
      u.id = o.userId
ORDER BY orderDate DESC";

$row = ['ordine','riga','prezzo pieno','prezzo attivo','da pagare','pagato', 'friend','utente','prezzo friend','costo','modalità di pagamento','data'];

$a = $ninetyNineMonkey->dbAdapter->query($q,[])->fetchAll();

$f = fopen('export_vendite_friend.csv','w');
fwrite($f,implode(',',$row)."\n");
foreach($a as $row){
	 fwrite($f,implode(',',$row)."\n");
}
fflush($f);
fclose($f); ?>

<a href="export_vendite_friend.csv">Scarica nuovo file</a>
