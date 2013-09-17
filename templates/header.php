<!DOCTYPE html>

    <!-----------------------------------------------------------------------------
     - header.php
     -
     - CSCI-E52 Final Project, 2012
     - Anna Ntenta
     - anna.e.mckelvey@gmail.com
     -
     - Generates HTML head for each page.
     - Loads the Google Maps API.
     - Loads Twitter Bootstrap library and scripts.
     - Sets title and puts logo on top of every page. 
     ----------------------------------------------------------------------------->


<html>

     <head>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/> 
        
        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        
        <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADZH6FgwPeVnxA0c8YmTjp0AEXPtNWr2o&sensor=false">
        </script>
        
        <?php if (isset($title)): ?>
            <title>:: Addressay :: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Addressay</title>
        <?php endif ?>
        
        <div id="top">
        <a href="/"><img alt="Addressay logo" src="img/logo.png"/></a>
        </div>
        
    </head> 
    <body>

   
