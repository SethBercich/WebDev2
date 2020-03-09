<?php
error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'RobertMa-Shakopee-PRD-169ec6b8e-bb30ba02';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'gaming';  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0
// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '500',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => '',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice'),
    'paramName' => '',
    'paramValue' => ''),
  );

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);


// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=50";
$apicall .= "$urlfilter";
// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $price = (float)$item->sellingStatus->currentPrice;
    $shippingPrice = (float)$item->shippingInfo->shippingServiceCost;
    $location = $item->location;
    $condition = $item->condition->conditionDisplayName;
      
/////////////////////////EDIT THIS LINE/////////////////////////////////////////////////////
    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<div class='row'>
    <div class='col-md-3 image'><img src=\"$pic\"></div>
    <div class='col-md-3 link'><a href=\"$link\">$title</a></div>
    <div class='col-md-3 price'>$$price</div>
    <div class='col-md-3 shipping'>Shipping Price: $$shippingPrice<br>
    Location: $location<br>
    Condition: $condition<br>
    </div>
    </div>";
////////////////////////EDIT THIS LINE//////////////////////////////////////////////////////      
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
?>

<!-- Build the HTML page with values from the call response -->
<html>

<head>
    <title>eBay Search Results for <?php echo $query; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
        body {
            font-family: arial, sans-serif;
        }

        .table {
            text-align: center;
        }

        .heading {
            font-size: 1.5em;
            background: #ffcccc;
        }

        .row {
            border-bottom: 1px solid #000000;
        }

        .col-md-3 {
            border-right: 1px solid #000000;
            vertical-align: center;
        }

        .price {
            font-size: 1.2em;
            font-weight: bold;
        }

    </style>
</head>

<body>

    <h1>eBay Search Results for <?php echo $query; ?></h1>

    <div class='table'>
        <div class='row heading'>
            <div class='col-md-3'>
                <h2>Image</h2>
            </div>
            <div class='col-md-3'>
                <h2>Title and Link</h2>
            </div>
            <div class='col-md-3'>
                <h2>Price</h2>
            </div>
            <div class='col-md-3'>
                <h2>More Info</h2>
            </div>
        </div>

        <?php echo $results;?>
    </div>

</body>

</html>
