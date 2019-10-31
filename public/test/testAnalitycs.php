<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);

use PDO;

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
define('DEBUG','100');
\Monkey::app()->vendorLibraries->load("analytics");
$analytics = initializeAnalytics();
$profile = getFirstProfileId($analytics);
$results = getResults($analytics, $profile);
printResults($results);

function initializeAnalytics()
{
    // Creates and returns the Analytics Reporting service object.

    // Use the developers console and download your service account
    // credentials in JSON format. Place them in this directory or
    // change the key file location if necessary.
    $KEY_FILE_LOCATION = '/media/sf_sites/vendor/google-api-php-client-2.4.0_PHP54/service-account-credentials.json';

    // Create and configure a new client object.
    $client = new Google_Client();
    $client->setApplicationName("Hello Analytics Reporting");
    $client->setAuthConfig($KEY_FILE_LOCATION);
    $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
    $analytics = new Google_Service_Analytics($client);

    return $analytics;
}

function getFirstProfileId($analytics) {
    // Get the user's first view (profile) ID.

    // Get the list of accounts for the authorized user.
    $accounts = $analytics->management_accounts->listManagementAccounts();

    if (count($accounts->getItems()) > 0) {
        $items = $accounts->getItems();
        $firstAccountId = $items[0]->getId();

        // Get the list of properties for the authorized user.
        $properties = $analytics->management_webproperties
            ->listManagementWebproperties($firstAccountId);

        if (count($properties->getItems()) > 0) {
            $items = $properties->getItems();
            $firstPropertyId = $items[0]->getId();

            // Get the list of views (profiles) for the authorized user.
            $profiles = $analytics->management_profiles
                ->listManagementProfiles($firstAccountId, $firstPropertyId);

            if (count($profiles->getItems()) > 0) {
                $items = $profiles->getItems();

                // Return the first view (profile) ID.
                return $items[0]->getId();

            } else {
                throw new Exception('No views (profiles) found for this user.');
            }
        } else {
            throw new Exception('No properties found for this user.');
        }
    } else {
        throw new Exception('No accounts found for this user.');
    }
}

function getResults($analytics, $profileId) {
    // Calls the Core Reporting API and queries for the number of sessions
    // for the last seven days.
    return $analytics->data_ga->get(
        'ga:' . $profileId,
        '7daysAgo',
        'today',
        'ga:sessions'
        );
}

function printResults($results) {
    // Parses the response from the Core Reporting API and prints
    // the profile name and total sessions.
    if (count($results->getRows()) > 0) {

        // Get the profile name.
        $profileName = $results->getProfileInfo()->getProfileName();

        // Get the entry for the first entry in the first row.
        $rows = $results->getRows();
        $sessions = $rows[0][0];

        // Print the results.
        print "First view (profile) found: $profileName\n";
        print "Total sessions: $sessions\n";
    } else {
        print "No results found.\n";
    }
}

try {
    $accounts = $analytics->management_accountSummaries
        ->listManagementAccountSummaries();
} catch (apiServiceException $e) {
    print 'There was an Analytics API service error '
        . $e->getCode() . ':' . $e->getMessage();

} catch (apiException $e) {
    print 'There was a general API error '
        . $e->getCode() . ':' . $e->getMessage();
}

/**
 * Example #2:
 * The results of the list method are stored in the accounts object.
 * The following code shows how to iterate through them.
 */
foreach ($accounts->getItems() as $account) {
    $html = <<<HTML
<pre>
Account id   = {$account->getId()}
Account kind = {$account->getKind()}
Account name = {$account->getName()}
HTML;

    // Iterate through each Property.
    foreach ($account->getWebProperties() as $property) {
        if($property->getId()=='UA-60199879-1') {
            $html .= <<<HTML
        <br>
Property id          = {$property->getId()}
Property kind        = {$property->getKind()}
Property name        = {$property->getName()}
Internal property id = {$property->getInternalWebPropertyId()}
Property level       = {$property->getLevel()}
Property URL         = {$property->getWebsiteUrl()}
HTML;


            // Iterate through each view (profile).
            foreach ($property->getProfiles() as $profile) {
                $html .= <<<HTML
Profile id   = {$profile->getId()}
Profile kind = {$profile->getKind()}
Profile name = {$profile->getName()}
Profile type = {$profile->getType()}
HTML;
            }
        }else{
            continue;
        }
    }
    $html .= '</pre>';
    print $html;
}

echo "<br>Inizio sessioni per Browser";



$ids = 'ga:98580564'; //your id
$startDate = '2018-12-25';
$endDate = '2019-10-08';
$metrics = 'ga:sessions';

$optParams = array(
    'dimensions' => 'ga:browser',
    'max-results' => '50'
);

$results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

//Dump results
echo "<h3>Results Of Call:</h3>";

echo "dump of results";
var_dump($results);

echo "results['totalsForAllResults']";
var_dump($results['totalsForAllResults']);

echo "results['rows']";
foreach ($results['rows'] as $item) {
    var_dump($item);
}
echo "<br>Inizio tempo di permanenza media";




$metrics = 'ga:avgSessionDuration';

$optParams = array(
    'max-results' => '50'
);

$results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

//Dump results
echo "<h3>Results Of Call:</h3>";

echo "dump of results";
var_dump($results);

echo "results['totalsForAllResults']";
var_dump($results['totalsForAllResults']);

echo "results['rows']";
foreach ($results['rows'] as $item) {
    var_dump($item);
}


echo "<br>Inizio sessioni visite per paese";


$optParams = array(
    'dimensions' => 'ga:country',
    'max-results' => '150'
);

$results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

//Dump results
echo "<h3>Results Of Call:</h3>";

echo "dump of results";
var_dump($results);

echo "results['totalsForAllResults']";
var_dump($results['totalsForAllResults']);

echo "results['rows']";
foreach ($results['rows'] as $item) {
    var_dump($item);
}

echo "<br>Inizio sessioni bounces pagina";
$ids = 'ga:98580564'; //your id
$startDate = '2018-12-25';
$endDate = '2019-10-08';
$metrics = 'ga:bounces';

$optParams = array(
    'max-results' => '50'
);

$results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

//Dump results
echo "<h3>Results Of Call:</h3>";

echo "dump of results";
var_dump($results);

echo "results['totalsForAllResults']";
var_dump($results['totalsForAllResults']);

echo "results['rows']";
foreach ($results['rows'] as $item) {
    var_dump($item);
}

echo "<br>Inizio origine";
$ids = 'ga:98580564'; //your id
$startDate = '2018-12-25';
$endDate = '2019-10-08';
$metrics = 'ga:sessions';

$optParams = array(
    'dimensions' => 'ga:source',
    'max-results' => '50'

);

$results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

//Dump results
echo "<h3>Results Of Call:</h3>";

echo "dump of results";
var_dump($results);

echo "results['totalsForAllResults']";
var_dump($results['totalsForAllResults']);

echo "results['rows']";
foreach ($results['rows'] as $item) {
    var_dump($item);
}
