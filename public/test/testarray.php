<?php
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
$order=\Monkey::app()->repoFactory->create('Order')->findOneBy(['id'=>2658920]);
$orderId=$order->id;
$test='{
    "subject": "Nuovo Ordine da Pickyshop: '.$orderId.'",
    "hello": "Ciao %s",
    "line1": "grazie per aver acquistato su <b>PICKYSHOP.COM</b>!",
    "line2": "Il tuo ordine n° '.$orderId.' %s del %s è stato inserito.",
    "line3": "Puoi controllare lo stato del tuo ordine direttamente nella sezione MyPickyshop alla voce Ordini e Resi.",
    "line4": "Appena il tuo pacco verrà spedito riceverai una mail di conferma con il tracking number per tracciare la spedizione.",
    "tableHeader": "DETTAGLIO ORDINE",
    "subtotal": "SUBTOTALE (IVA INCLUSA)",
    "shipping": "SPEDIZIONE",
    "modifier": "SCONTI",
    "total": "TOTALE (IVA INCLUSA):",
    "shippingAddress": "INDIRIZZO DI SPEDIZIONE",
    "billingAddress": "INDIRIZZO DI FATTURAZIONE",
    "footer": "Hai 14 giorni dalla ricezione del tuo ordine per restituirci il tuo acquisto. <br> Se scegli di effettuare un cambio è necessario rendere prima l’articolo originale ed effettuare un nuovo ordine. In caso di rimborso, una volta ricevuto il vostro ordine reso vi verrà rilasciato un coupon con scadenza 15 giorni che potrà essere utilizzato sin da subito all’interno del sito. Oltrepassati i 15 giorni potrete richiedere il rimborso che avverrà con il metodo di pagamento originale secondo i tempi definiti per le singole modalità di pagamento. A seconda del metodo di pagamento utilizzato il tempo per il rimborso può andare da 24 ore a 10 giorni. Gli articoli restituiti saranno rimborsati escludendo il costo originario della spedizione. <br><br> Se non ti sei registrato a Pickyshop.com e hai ricevuto questa e-mail per errore, contattaci al servizio clienti <a href=\"mailto:support@pickyshop.com\" target=\"_blank\">support@pickyshop.com</a> provvederemo alla cancellazione dell\'account dai nostri database.<br><br> Grazie, <br> Pickyshop Team"
}';

$translationTag=\Monkey::app()->repoFactory->create('EmailTemplateTag')->findBy(['templateId'=>13]);
$arrayVar=[];
foreach($translationTag as $tag){
$arraVar[]=[$tag->tagName=>'<?php echo sprintf('.$tag->tagTemplate.')<;?>'];
}
$template='{subject} {line1}  {line2}  {line3} {line4} {tableHeader} {subtotal} {shipping} {modifier} {total}{shippingAddress} {billingAddress} {footer}';

$array=json_decode($test,true);

foreach ($array as $key=>$value) {

   if(strpos($template, $key) !== false) {
       $pippo = str_replace('{'.$key.'}',$value,$template);
       $template=$pippo;
   }

}
   echo $pippo;
$to=['jurif@hotmail.com'];
$emailRepo = \Monkey::app()->repoFactory->create('Email');
$emailRepo->newPackagedTemplateMail('neworderclient','no-reply@pickyshop.com', $to,[],[],$arraVar);


