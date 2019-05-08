<?php
require "../../iwesStatic.php";

use \bamboo\utils\time\STimeToolbox;

$microStart = microtime(true);
$microLoopTime = $microStart;

$uR = \Monkey::app()->repoFactory->create('EloyUser');
$dR = \Monkey::app()->repoFactory->create('EloyDates');
$sR = \Monkey::app()->repoFactory->create('EloyShop');
$cR = \Monkey::app()->repoFactory->create('Country');

$dba = \Monkey::app()->dbAdapter;

$countRows = 0;

try {
    \Monkey::app()->repoFactory->beginTransaction();

    $shops = [];
    $shops['01'] = 'Cartechini San Marone';
    $shops['02'] = 'Cartechini Centro';
    $shops['03'] = 'Subage';
    $shops['04'] = 'Boh';
    $shops['EC'] = 'Cartechini.it';

    $shopIds = [];
    foreach ($shops as $k => $v) {
        $res = $sR->findOneBy(['name' => $v]);
        if (!$res) {
            $newShop = $sR->getEmptyEntity();
            $newShop->name = $v;
            $newShop->city = 'Civitanova Marche';
            $newShop->countryId = 110;
            $newShop->type = ('EC' === $k) ? 'online' : 'offline';
            $newShop->smartInsert();

            $shopIds[$k] = $newShop->id;
        } else {
            $shopIds[$k] = $res->id;
        }
    }

    foreach ($shopIds as $k => $v) {
        if ('01' === $k) define('CARTECHINI_ID', $v);
    }

    $dsn = 'mysql:dbname=cartechiniold;host=db.redpanda.clo.ud.it';
    $user = 'redpanda';
    $password = 'UrMOwN3H';

    $pdo = new \PDO($dsn, $user, $password);
    $res = $pdo->query("SELECT * FROM shop_utenti AS u JOIN shop_card AS c ON u.id = c.id WHERE c.rcard <> 00000000 and u.id in (SELECT max(id) FROM shop_utenti WHERE 1 group by nome, cognome, nascita)");
    if (false === $res) die(var_dump($pdo->errorInfo()));
    $res = $res->fetchAll(PDO::FETCH_ASSOC);


    foreach ($res as $row) {
        $u = $uR->getEmptyEntity();
        $u->name = $row['nome'];
        $u->surname = $row['cognome'];
        $u->birthday = $row['nascita'];
        $isMale = null;
        if ('M' === strtoupper($row['sesso'])) $isMale = 1;
        elseif ('F' === strtoupper($row['sesso'])) $isMale = 0;
        else $isMale = 0;
        $u->isMale = $isMale;
        $u->address = $row['indirizzo'];
        $u->city = $row['citta'];
        $u->region = $row['provincia'];
        $u->postcode = $row['cap'];
        $u->city = $row['citta'];
        $countryId = null;
        if ('68' === $row['paese'] || 'Italia' === $row['paese']) {
            $countryId = 110;
        } else {
            $paese = $pdo->query("SELECT nome FROM shop_paesi WHERE id = " . $row['paese'])->fetch();
            $country = $cR->findOneBy(['name' => $paese['nome']]);
            if ($country) $countryId = $country->id;
        }
        $firstDigit = substr($row['telefono'], 0, 1);
        if ('0' === $firstDigit) {
            $u->phone = $row['telefono'];
            $u->cellphone = null;
        } else {
            $u->phone = null;
            $u->cellphone = $row['telefono'];
        }
        $u->email = $row['email'];
        $u->cardNumber = $row['rcard'];
        $u->source = null;
        $u->subscriptionDate = STimeToolbox::DbFormattedDate();
        $u->eloyShopId = (empty($row['luogo_reg'])) ? CARTECHINI_ID : $shopIds[$row['luogo_reg']];
        $u->eloyCardTypeId = 4;
        $u->smartInsert();

        $d = $dR->getEmptyEntity();
        $d->eloyUserId = $u->id;
        $d->birthday = $row['data_nascita'];
        $d->momBirthdayDate = $row['compmamma'];
        $d->dadBirthdayDate = $row['compapa'];
        $d->brotherBirthdayDate = $row['compfratello'];
        $d->sisterBirthdayDate = $row['compsorella'];
        $d->son1BirthdayDate = $row['compfiglio1'];
        $d->son2BirthdayDate = $row['compfiglio2'];
        $d->daughter1BirthdayDate = $row['compfiglia1'];
        $d->daughter2BirthdayDate = $row['compfiglia2'];
        $d->partnerBirthdayDate = $row['compconiuge'];
        $d->insert();

        $countRows++;

        if (0 === $countRows % 4000) {
            $microtime = microtime(true);
            $microAll = $microtime - $microStart;
            $microLoop = $microtime - $microLoopTime;
            $microLoopTime = $microtime;
            echo $microtime;
        }
    }
    \Monkey::app()->repoFactory->commit();
} catch (\bamboo\core\exceptions\BambooException $e) {
    var_dump($u);
    echo "righe lavorate: " . $countRows . " - id utente: " . $row['id'] . "<br />";
    echo $e->getMessage();
    \Monkey::app()->repoFactory->rollback();
}
/**while ($user = fgetcsv(fopen($source, 'r'))) {
 *
 * }
 *
 * $source = \Monkey::app()->rootPath() . "/client/public/media/import-cartechini/card-cartechini-new.csv";
 *
 * while ($dates = fgetcsv(fopen($source, 'r'))) {
 * //var_dump($dates);
 * }*/