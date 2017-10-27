<?php
require '../Model/HotelOffer.php';

class OfferJSONDecoderUtility {
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    public static function decode($json) {

        $offers = array();
        $array = json_decode($json, true);
        if(!isset($array['offers']['Hotel'] ))
            return $offers;
        
        
        foreach ($array['offers']['Hotel'] as $key => $json) { //each high level offer
            $hotelOffer = new HotelOffer();
            self::decodeOfferDateInfo($json['offerDateRange'], $hotelOffer);
            self::decodeDestination($json['destination'], $hotelOffer);
            self::decodeHotelInfo($json['hotelInfo'], $hotelOffer);
            self::decodeHotelUrgencyInfo($json['hotelUrgencyInfo'], $hotelOffer);
            self::decodeHotelPricingInfo($json['hotelPricingInfo'], $hotelOffer);
            self::decodeHotelUrlInfo($json['hotelUrls'], $hotelOffer);
            $offers[] = $hotelOffer;
        }
        
        return $offers;
    }

    private static function decodeOfferDateInfo($json, &$hotelOffer) {

        $startDate = new DateTime();
        $startDate->setDate($json['travelStartDate'][0], $json['travelStartDate'][1], $json['travelStartDate'][2]);
        $endDate = new DateTime();
        $endDate->setDate($json['travelEndDate'][0], $json['travelEndDate'][1], $json['travelEndDate'][2]);
        $hotelOffer->startDate = $startDate;
        $hotelOffer->endDate = $endDate;

        $hotelOffer->lengthOfStay = $json['lengthOfStay'];
    }

    private static function decodeDestination($json, &$hotelOffer) {
        $hotelOffer->offerCity = $json['city'];
        $hotelOffer->offerCountry = $json['country'];
        $hotelOffer->offerProvince = $json['province'];
    }

    private static function decodeHotelInfo($json, &$hotelOffer) {
        $hotelOffer->hotelName = $json['hotelName'];
        $hotelOffer->hotelLongDestination = $json['hotelLongDestination'];
        $hotelOffer->hotelStarRating = $json['hotelStarRating'];
        $hotelOffer->hotelGuestReviewRating = $json['hotelGuestReviewRating'];
        $hotelOffer->hotelReviewCount = $json['hotelReviewTotal'];
        $hotelOffer->hotelImageURL = $json['hotelImageUrl'];
    }

    private static function decodeHotelUrgencyInfo($json, &$hotelOffer) {
        $hotelOffer->numberOfPeopleViewing = $json['numberOfPeopleViewing'];
        $hotelOffer->numberOfPeopleBooked = $json['numberOfPeopleBooked'];
        $hotelOffer->numberOfRoomsLeft = $json['numberOfRoomsLeft'];
        $hotelOffer->lastBookedTime = $json['lastBookedTime'];
        $hotelOffer->almostSoldStatus = $json['almostSoldStatus'];
        
    }

    private static function decodeHotelPricingInfo($json, &$hotelOffer) {
        $hotelOffer->originalPricePerNight = $json['originalPricePerNight'];
        $hotelOffer->salePricePerNight = $json['averagePriceValue'];
        $hotelOffer->totalTripCost = $json['totalPriceValue'];
        $hotelOffer->percentDiscount = $json['percentSavings'];
    }

    private static function decodeHotelUrlInfo($json, &$hotelOffer) {
        $hotelOffer->hotelWebsite = $json['hotelInfositeUrl'];
    }

}
