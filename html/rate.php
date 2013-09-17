<?php

/****************************************************************************
 * rate.php
 *
 * CSCI-E52 Final Project, 2012
 * Anna Ntenta
 * anna.e.mckelvey@gmail.com
 *
 *
 * Performs database insertions and queries.
 *
 * "Nearby addresses" is defined as all addresses as within 0.5 minute degrees 
 * latitude and longitude of submitted rating.
 *
 * Sources:
 * 1) http://stackoverflow.com/questions/3333665/mysql-rank-function
 * 2) http://www.nationalatlas.gov/articles/mapping/a_latlong.html
 * 3) http://www.zodiacal.com/tools/lat_table.php
 ***************************************************************************/


// configuration
    require("../includes/config.php");

// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
     // query database for user's current cookie
     $usr_cookie = query("SELECT * FROM reviewed WHERE userID = ?", $_COOKIE["PHPSESSID"]);
        
     // for each row (i.e. for each entry in reviewed with current cookie)
     foreach ($usr_cookie as $row)
     {
        // if user already rated this address within the last 24 hours, apologize
        if ($_POST["latlng"] == $row["latlng"])
        {
            apologize("You can only rate the same address once a day. Please come again.");
        }
     }
    
    // add rating to "reviewed" table
    $my_rating = query("INSERT INTO reviewed (userID, address, latlng, lat, lng, parking, transportation, dining, social, family,
                       shopping, recreation, culture, total_score) VALUES
                       ('{$_COOKIE["PHPSESSID"]}', '{$_POST["address"]}', '{$_POST["latlng"]}', '{$_POST["lat"]}', '{$_POST["lng"]}', '{$_POST["parking"]}', '{$_POST["transportation"]}',
                        '{$_POST["dining"]}', '{$_POST["social"]}', '{$_POST["family"]}', 
                        '{$_POST["shopping"]}', '{$_POST["recreation"]}', '{$_POST["culture"]}', 
                        (parking + transportation + dining + social + family + shopping + recreation + culture))");
        
    // check for insertion error 
    if ($my_rating === false)
    {
        apologize("Could not rate address. Please try again.");
    }
    // else add ratings to "averages" table
    else
    {
        $average_rating = query("INSERT INTO averages (address, latlng, lat, lng, parking, transportation, dining, social, family,
                                 shopping, recreation, culture, total_score) VALUES
                                 ('{$_POST["address"]}', '{$_POST["latlng"]}', '{$_POST["lat"]}', '{$_POST["lng"]}', '{$_POST["parking"]}', '{$_POST["transportation"]}',
                                  '{$_POST["dining"]}', '{$_POST["social"]}', '{$_POST["family"]}', 
                                  '{$_POST["shopping"]}', '{$_POST["recreation"]}', '{$_POST["culture"]}', 
                                  (parking + transportation + dining + social + family + shopping + recreation + 
                                  culture)) 
                                  ON DUPLICATE KEY UPDATE 
                                  votes = votes + 1, 
                                  parking = parking + '{$_POST["parking"]}', 
                                  transportation = transportation +  '{$_POST["transportation"]}',
                                  dining = dining + '{$_POST["dining"]}', 
                                  social = social + '{$_POST["social"]}',
                                  family = family + '{$_POST["family"]}',
                                  shopping = shopping + '{$_POST["shopping"]}',
                                  recreation = recreation + '{$_POST["recreation"]}',
                                  culture = culture + '{$_POST["culture"]}',
                                  total_score = total_score + '{$_POST["parking"]}' + '{$_POST["transportation"]}' + '{$_POST["dining"]}' + 
                                  '{$_POST["social"]}' + '{$_POST["family"]}' + '{$_POST["shopping"]}' + '{$_POST["recreation"]}' + 
                                  '{$_POST["culture"]}'");
                                  
        // check for insertion error 
        if ($average_rating === false)
        {
            apologize("Could not rate address. Please try again.");
        }
     
        // query the database for user's submitted ratings 
        $get_my = query("SELECT address, latlng, lat, lng, parking, transportation, dining, social, family, shopping, recreation,
                         culture FROM reviewed WHERE latlng = '{$_POST["latlng"]}' AND userID = '{$_COOKIE["PHPSESSID"]}'");
                      
        // query the database for all the ratings within 0.5 minute degrees latitude and longitude of submitted rating
        $get_area = query("SELECT latlng, address, lat, lng, parking, transportation, dining, social, family, shopping, recreation,
                         culture, total_score FROM reviewed WHERE lat < ('{$_POST["lat"]}' + 0.01) AND 
                         lat > ('{$_POST["lat"]}' - 0.01) AND lng < ('{$_POST["lng"]}' + 0.01) AND lng > ('{$_POST["lng"]}' - 0.01)");
       
        // calculate rank for each submitted address (see source #1 above for parts of this code)
        $get_rank = query("SELECT latlng, address, lat, lng, @rownum := @rownum + 1 AS row
         , @rank := IF(@prev_val!=total_score, @rownum, @rank) AS rank
         , @prev_val := total_score AS total_score  
                        FROM averages a, (SELECT @rownum := 0, @rank := 0, @prev_val:= NULL) r ORDER BY total_score DESC");
        
        // find rank of submitted address 
        foreach ($get_rank as $row)
        {
            if ($row["latlng"] == $_POST["latlng"])
            {
                // fix the issue that the number one ranked address shows up as "0"
                $ranking = $row["rank"];
                if ($ranking == 0)
                {
                    $ranking = 1;
                }
            }
        }
       
        // number of addresses in the nearby area
        $area_ratings = count($get_area);    
        
        $total_parking = 0;
        $total_transportation = 0;
        $total_dining = 0; 
        $total_social = 0; 
        $total_family = 0; 
        $total_shopping = 0; 
        $total_recreation = 0; 
        $total_culture = 0; 
    
        // calculate total score for each parameter in the area
        foreach ($get_area as $row)
        {
            $total_parking = $total_parking + $row["parking"]; 
            $total_transportation = $total_transportation + $row["transportation"]; 
            $total_dining = $total_dining + $row["dining"]; 
            $total_social = $total_social + $row["social"]; 
            $total_family = $total_family + $row["family"]; 
            $total_shopping = $total_shopping + $row["shopping"]; 
            $total_recreation = $total_recreation + $row["recreation"]; 
            $total_culture = $total_culture + $row["culture"]; 
        }
    
        // calculate the area average for each parameter
        $average_parking = $total_parking / $area_ratings;
        $average_transportation = $total_transportation / $area_ratings;
        $average_dining = $total_dining / $area_ratings;
        $average_social = $total_social / $area_ratings;
        $average_family = $total_family / $area_ratings;
        $average_shopping = $total_shopping / $area_ratings;
        $average_recreation = $total_recreation / $area_ratings;
        $average_culture = $total_culture / $area_ratings;
        
        $average = [$average_parking, $average_transportation, $average_dining, $average_social,
                    $average_family, $average_shopping, $average_recreation, $average_culture ];
       
       // render results and send results from querys to results.php
        render("results.php", ["title" => "Results", "average" => $average,
        "my_rating" => $get_my, "area" => $get_area, "rank" => $get_rank,
        "ranking" => $ranking]); 
    }
}
?>
