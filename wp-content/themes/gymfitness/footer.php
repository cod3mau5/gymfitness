        <footer class="site-footer contenedor">
            <hr>
            <div class="contenido-footer">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'menu-principal',
                        'container' => 'nav',
                        'container_class' => 'menu-principal'
                    ]);
                ?>
                <p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name'). " ".date('Y'); ?></p>
            </div>
        </footer>
            <?php if(is_page('contacto')): ?>
                <script>
                    const lat = parseFloat(document.querySelector('#lat').value),
                        lng = parseFloat(document.querySelector('#lng').value),
                        zoom = parseInt(document.querySelector('#zoom').value),
                        calle = document.querySelector('#calle').value;
                if(lat && lng){
                    function initMap() {
                        var uluru = {lat: lat, lng: lng};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: zoom,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            title: calle
                        });
                    }
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDl3QdpavEMHbNxiU9AqmO577Hir0EZ_Ho&callback=initMap"
            async defer></script>
        <?php endif; ?>
        <?php wp_footer(); ?>
    </body>
</html>