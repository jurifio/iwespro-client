<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require '../../iwesStatic.php';
use Aws\S3\S3Client;
use Aws\Common\Credentials\Credentials;
\Monkey::app()->vendorLibraries->load('spreadsheet');
$xlsContentFilePath = '/media/sf_sites/iwespro/temp/hello world.xlsx';
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'TemplateType=fptcustom');
$sheet->setCellValue('B1', 'Version=2021.1115');
$sheet->setCellValue('C1', 'TemplateSignature=U0hPRVM=');
$sheet->setCellValue('D1', 'settings=contentLanguageTag=it_IT&feedType=610841&headerLanguageTag=it_IT&primaryMarketplaceId=amzn1.mp.o.APJ6JRA9NG5V4&templateIdentifier=41a25e32-8f53-4fb5-9cd8-7b5e03a525e1&timestamp=2021-11-15T20%3A47%3A38.259Z');
$sheet->setCellValue('E1', 'Le prime 3 righe sono destinate a uso esclusivo di Amazon.com. Non modificare o eliminare le prime 3 righe.');
$sheet->setCellValue('U1', 'Immagini');
$sheet->setCellValue('AE1', 'Varianti');

$sheet->setCellValue('A2', 'Tipo di prodotto');
$sheet->setCellValue('B2', 'SKU venditore');
$sheet->setCellValue('C2', 'Marca');
$sheet->setCellValue('D2', 'Codice prodotto standard');
$sheet->setCellValue('E2', 'Tipo codice prodotto');
$sheet->setCellValue('F2', 'Titolo articolo');
$sheet->setCellValue('G2', 'Browse node raccomandato');
$sheet->setCellValue('H2', 'Materiale esterno');
$sheet->setCellValue('I2', 'Sistema di taglie calazutre');
$sheet->setCellValue('J2', 'Fascia d\'età per taglia scarpa');
$sheet->setCellValue('K2', 'Tipologia di taglia scarpa');
$sheet->setCellValue('L2', 'Largezza scarpa');
$sheet->setCellValue('M2', 'Taglia scarpa');
$sheet->setCellValue('N2', 'Colore');
$sheet->setCellValue('O2', 'Mappatura colore');
$sheet->setCellValue('P2', 'Paese/Regione di origine');
$sheet->setCellValue('Q2', 'Quantità');
$sheet->setCellValue('R2', 'URL immagine principale');
$sheet->setCellValue('S2', 'Sesso');
$sheet->setCellValue('S2', 'Descrizione fascia d\'étà');
$sheet->setCellValue('S2', 'Descrizione fascia d\'étà');




$writer = new Xlsx($spreadsheet);
$writer->save($xlsContentFilePath);