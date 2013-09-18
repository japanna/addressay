<?php
    
    /****************************************************************************
     * index.php
     *
     * CSCI-E52 Final Project, 2012
     * Anna Ntenta
     * anna.e.mckelvey@gmail.com
     *
     * Sets cookie before pages load.
     * Sets expiration of cookie to 24 hrs.
     * Renders landing page. 
     ***************************************************************************/


    // configuration
    require("../includes/config.php"); 
    
    // set cookie expiration to 24 hours
    $expires = time() + (60 * 60 * 24);
    
    // set cookie
    setcookie("", "", $expires ); 
    
    // render landing page
    render("search.php", ["title" => "a"]);

?>
