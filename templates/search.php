<!-----------------------------------------------------------------------------------------
  - search.php
  -
  - CSCI-E52 Final Project, 2012
  - Anna Ntenta
  - anna.e.mckelvey@gmail.com
  -
  - Landing page displaying explanatory text and map.
  -
  - Explanatory text is removed on first "key down" in input field by call to removeText().
  -
  - For each character user types, the current string is geocoded by call to geocode_str().
  -
  - When desired address is found and submitted via input field, rateMapOnChange() is called.
  ----------------------------------------------------------------------------------------->

   <table>
      <tbody>
          <tr>
            <td>
              <div id="middle">
                <input type="text" size="100" id="search" placeholder="search address" 
                       onkeyup="geocode_str()" onkeydown="removeText()" onchange="rateMapOnChange()"  >
                <ul id="address_list" ></ul>
                  <div id="introText">
                    <h4>
                    Is your address hot or not? 
                    </h4>
                    Or more importantly, is it close to the things we need?</br>
                    <h4>
                    Have a say.
                    </h4>
                    We've made it easy to give input on any neighborhood. </br> 
                    Just look up the address and tell us what the place is like.
                    <h4>
                    What do others think? 
                    </h4>
                    When you rate an address, you also get the neighborhood average.</br>
                    How is your home, your work, your favorite vacation spot doing?
                  </div>
                <form action="rate.php" method="POST">
                  <!-- sliders appear only when user has submitted an address for geocoding -->
                  <div id="slider1"></div></br>
                  <div id="slider2"></div></br>
                  <div id="slider3"></div></br>
                  <div id="slider4"></div></br>
                  <div id="slider5"></div></br>
                  <div id="slider6"></div></br>
                  <div id="slider7"></div></br>
                  <div id="slider8"></div></br>
                  <!-- I might want to change this to an AJAX request -->
                  <input type="hidden" name="address" id="address"  value="" />
                  <input type="hidden" name="latlng" id="latlng"  value="" />
                  <input type="hidden" name="lat" id="lat"  value="" />
                  <input type="hidden" name="lng" id="lng"  value="" /> 
                  <div id="submit_btn"></div>
                </form>
              </div>
            </td>
            <td>
              <div id="map"> </div>
            </td>
          </tr>
        </tbody>  
      </table>  
    <script src="js/sliders.js"></script>
    <script src="js/geocode.js"></script>

 
