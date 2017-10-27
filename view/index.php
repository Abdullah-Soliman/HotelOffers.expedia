<?php
require('../controller/OfferJSONDecoderUtility.php');
require('../controller/OfferFetcher.php');
?>


<!DOCTYPE html>
<html>

    <head>
        <title>Hotel Offers</title>

        <link href="style.css" rel="stylesheet" type="text/css">


    </head>

    <body>
        <img src="logo.png">
        <div id="wrapper">

            <header>

                <nav> </nav>

            </header>

            <div id="content">  
                <?php
                if(count($offerObjectArray) == 0){
                ?>
                <div id="offerWrapper" class="roundedCorners">
                    <strong>No Results - try another search </strong>
                </div>
                <? 
                }else {    

                foreach($offerObjectArray as $item) {
                ?>   
                <div id="offerWrapper" class="roundedCorners">
                    <div id="imageSection" style="float: left; width: 200px;">
                        <a href="<?= $item->hotelWebsite ?>">
                            <img border="0" src="<?= $item->hotelImageURL ?>" width="100" height="100">   
                        </a>
                    </div>
                    <div style="float: left; width: 400px;">
                        <div>
                            Offer Valid <?= date_format($item->startDate, 'Y/m/d'); ?> - <?= date_format($item->endDate, 'Y/m/d') ?>
                            <br> <?= $item->offerCity ?>,&nbsp;<?= $item->offerProvince ?>,&nbsp; <?= $item->offerCountry ?>
                        </div>
                        <div id="hotelInformation">
                            <strong><?= $item->hotelName ?></strong> &nbsp; <br>

                            <?
                            for ($i = 1; $i <= $item->hotelStarRating; $i++) {
                            echo '&#9733;';
                            }
                            ?>
                            <br>
                            <?= $item->hotelLongDestination ?>
                            <br>
                            Guest Rating: <?= $item->hotelGuestReviewRating ?> / 5
                            <br>
                            <?= $item->hotelReviewCount ?> reviews
                        </div>
                    </div>
                    <div id="hotelPriceInformation" style="float: left; width: 200px;">
                        <strong>$<?= $item->salePricePerNight ?> per night.</strong>
                        <br> <span class="saveText">Save <?= $item->percentDiscount ?>%</span>

                    </div>
                    <br style="clear: both;" />
                </div>


                <?php
                }
                }
                ?>

            </div> 

            <div id="rightcol" class="roundedCorners"> 
                <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get">
                    <p>
                        <label for="firstName" style="display:block">Destination Name</label>
                        <input type="text"  name="destinationName" id="destinationName" />

                    </p>    

                    <p>
                        <label for="destinationCity" style="display:block" >Destination City</label>
                        <input type="text"  name="destinationCity" id="destinationCity" />

                    </p>
                    <p>
                        <label for="minTripStartDate" style="display:block">Earliest Start Date</label>
                        <input type="text" name="minTripStartDate" id="minTripStartDate" />

                    </p>

                    <p>
                        <label for="maxTripStartDate" style="display:block">Latest Start Date</label>
                        <input type="text"  name="maxTripStartDate" id="maxTripStartDate" />

                    </p>
                    <p>
                        <label for="lengthOfStay" style="display:block" >Length of Stay</label>
                        <input type="text"  name="lengthOfStay" id="lengthOfStay" />

                    </p>
                    <p>
                        <label for="minStarRating" style="display:block" >Min Star Rating</label>
                        <input type="text"  name="minStarRating" id="minStarRating" />

                    </p>
                    <p>
                        <label for="maxStarRating" style="display:block" >Max Star Rating</label>
                        <input type="text"  name="maxStarRating" id="maxStarRating" />

                    </p>
                    <p>
                        <label for="minTotalRate" style="display:block" >Minimum Total Rate</label>
                        <input type="text"  name="minTotalRate" id="minTotalRate" />

                    </p>
                    <p>
                        <label for="maxTotalRate" style="display:block" >Max Total Rate</label>
                        <input type="text"  name="maxTotalRate" id="maxTotalRate" />

                    </p>
                    <p>
                        <label for="minGuestRating" style="display:block" >Minimum Guest Rating</label>
                        <input type="text"  name="minGuestRating" id="minGuestRating" />

                    </p>
                    <p>
                        <label for="maxGuestRating" style="display:block" >Max Guest Rating</label>
                        <input type="text"  name="maxGuestRating" id="maxGuestRating" />

                    </p>
                    <input type="submit" />

                </form>
            </div> 

            <footer>  </footer>

        </div> 

    </body>
</html>


