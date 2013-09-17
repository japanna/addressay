 <!-----------------------------------------------------------------------------------------
  - results.php
  -
  - CSCI-E52 Final Project, 2012
  - Anna Ntenta
  - anna.e.mckelvey@gmail.com
  -
  - Displays a map showing all ratings within 0.5 minute degrees latitude and longitude 
  - of submitted rating.
  -
  - Displays user's submitted ratings and average ratings for the area.
  -
  - Displays the rank of the address.
  ---------------------------------------------------------------------------------------->
 
<link href="css/styles.css" rel="stylesheet"/> 
  <div id="middle">
   <table>
     <tbody>
       <tr>
         <td>
           <table class="table table-striped">
            <thead>
              <tr>
                <th>Address</th>
                <th>World Rank</th>
              </tr>
          </thead>
          <?php print("<tr><td>" . $my_rating[0]["address"] . "</td><td>#" . $ranking ."</td><tr></tbody>" ); ?>           
          <tbody>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Your Rating</th>
                  <th>Average Area</th>
                </tr>
              </thead>
              <?php
              // print data
                print("<tbody><tr><td><b>Parking</td><td>" . $my_rating[0]["parking"] . "</td><td>" . number_format($average[0], 0) ."</td><tr>" .
                      "<tr><td><b>Transportation</td><td>" . $my_rating[0]["transportation"] . "</td><td>" . number_format($average[1], 0) ."</td><tr>". 
                      "<tr><td><b>Dining</td><td>" . $my_rating[0]["dining"] . "</td><td>" . number_format($average[2], 0) ."</td><tr>". 
                      "<tr><td><b>Social</td><td>" . $my_rating[0]["social"] . "</td><td>" . number_format($average[3], 0) ."</td><tr>".
                      "<tr><td><b>Family</td><td>" . $my_rating[0]["family"] . "</td><td>" . number_format($average[4], 0) ."</td><tr>".
                      "<tr><td><b>Grocer</td><td>" . $my_rating[0]["shopping"] . "</td><td>" . number_format($average[5], 0) ."</td><tr>".
                      "<tr><td><b>Health</td><td>" . $my_rating[0]["recreation"] . "</td><td>" . number_format($average[6], 0) ."</td><tr>".
                      "<tr><td><b>Culture</td><td>" . $my_rating[0]["culture"] . "</td><td>" . number_format($average[7], 0) ."</td><tr></tbody>");
              ?>
            </table>
          </td>
          <td> 
            <table>
              <tr>
                <td>
                  <a href="index.php">New Search</a> 
                </td>
              </tr>
            </table> 
              <div id="map"> </div>
          </td>
        </tr>
      </tbody>  
    </table>  
  </div>
  <script>
    //get rated address' data
    var my_marker = <?php echo json_encode($my_rating); ?>;
   
    // get area ratings data
    var area_markers = <?php echo json_encode($area); ?>;
  </script>
  <script src="js/geocode_results.js"></script>

 
