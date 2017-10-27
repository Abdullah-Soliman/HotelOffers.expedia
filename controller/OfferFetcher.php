<?php

define("BASE_URL", "https://offersvc.expedia.com/offers/v2/getOffers?scenario=deal-finder&page=foo&uid=foo&productType=Hotel");
$requestURL = BASE_URL;

if (isset($_GET['destinationName']) && !empty($_GET['destinationName'])) {
    $destinationName = htmlspecialchars($_GET['destinationName']);
    $requestURL = $requestURL . '&destinationName=' . $destinationName;
}

if (isset($_GET['destinationCity']) && !empty($_GET['destinationCity'])) {
    $destinationCity = htmlspecialchars($_GET['destinationCity']);
    $requestURL = $requestURL . '&destinationCity=' . $destinationCity;
}

if (isset($_GET['minTripStartDate']) && !empty($_GET['minTripStartDate'])) {
    $minTripStartDate = htmlspecialchars($_GET['minTripStartDate']);
    $requestURL = $requestURL . '&minTripStartDate=' . $minTripStartDate;
}

if (isset($_GET['maxTripStartDate']) && !empty($_GET['maxTripStartDate'])) {
    $maxTripStartDate = htmlspecialchars($_GET['maxTripStartDate']);
    $requestURL = $requestURL . '&maxTripStartDate=' . $maxTripStartDate;
}

if (isset($_GET['lengthOfStay']) && !empty($_GET['lengthOfStay'])) {
    $lengthOfStay = htmlspecialchars($_GET['lengthOfStay']);
    $requestURL = $requestURL . '&lengthOfStay=' . $lengthOfStay;
}

if (isset($_GET['minStarRating']) && !empty($_GET['minStarRating'])) {
    $minStarRating = htmlspecialchars($_GET['minStarRating']);
    $requestURL = $requestURL . '&minStarRating=' . $minStarRating;
}

if (isset($_GET['maxStarRating']) && !empty($_GET['maxStarRating'])) {
    $maxStarRating = htmlspecialchars($_GET['maxStarRating']);
    $requestURL = $requestURL . '&maxStarRating=' . $maxStarRating;
}

if (isset($_GET['minTotalRate']) && !empty($_GET['minTotalRate'])) {
    $minTotalRate = htmlspecialchars($_GET['minTotalRate']);
    $requestURL = $requestURL . '&minTotalRate=' . $minTotalRate;
}

if (isset($_GET['maxTotalRate']) && !empty($_GET['maxTotalRate'])) {
    $maxTotalRate = htmlspecialchars($_GET['maxTotalRate']);
    $requestURL = $requestURL . '&maxTotalRate=' . $maxTotalRate;
}

if (isset($_GET['minGuestRating']) && !empty($_GET['minGuestRating'])) {
    $minGuestRating = htmlspecialchars($_GET['minGuestRating']);
    $requestURL = $requestURL . '&minGuestRating=' . $minGuestRating;
}

if (isset($_GET['maxGuestRating']) && !empty($_GET['maxGuestRating'])) {
    $maxGuestRating = htmlspecialchars($_GET['maxGuestRating']);
    $requestURL = $requestURL . '&maxGuestRating=' . $maxGuestRating;
}


$payload = file_get_contents($requestURL);

$offerObjectArray = OfferJSONDecoderUtility::decode($payload);


