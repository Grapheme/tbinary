            </article>
            <footer class="feature-page-footer">
            <div class="mini-wrapper">
                <div class="logo"> </div>
                <address>Address: USA 14056 NewArk West Mall Stenton Highway 54-B</address>
                <div class="copyright">&copy; 2013 TradingSLL</div>
                <ul class="nav-list clearfix">
                    <li class="nav-item"><a href="index.html">Home</a></li>
                    <li class="nav-item"><a href="features.html">Features</a></li>
                    <li class="nav-item"><a href="about.html">About</a></li>
                    <li class="nav-item"><a href="page.html">Contact Us</a></li>
                </ul>               
            </div>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtgj1kQZnFLNOQaOkX1fB6Tu_ZeZXzGNI&sensor=false"></script>
        <script type="text/javascript">
            function initialize() {
                var mapOptions = {
                    zoom : 15,
                    scrollwheel : false,
                    center : new google.maps.LatLng(47.210275, 39.656423),
                    mapTypeId : google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var image = 'img/interface/map_button.png';
                var myLatLng = new google.maps.LatLng(47.210275, 39.656423);
                var beachMarker = new google.maps.Marker({
                    position : myLatLng,
                    map : map,
                    icon : image
                });
            };
            initialize();
        </script>
        <script src="js/main.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>