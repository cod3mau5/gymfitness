jQuery(document).ready( $ => {
    $('.site-header .menu-principal .menu').slicknav({
        'label':'',
        'easingOpen': "easeOutBounce", //available with jQuery UI
        'duration': 777,
        'appendTo':'.site-header',
    });

    // checamos si estamos en la pag inicio comprobando si existe la seccion testimoniales
    if($('.listado-testimoniales').length > 0 ) {
        $('.listado-testimoniales').bxSlider({
            auto:true,
            mode: 'fade',
            
        });
    }

    // agrega posición fija en el header al hacer scroll
    window.onscroll = () => {
        const scroll = window.scrollY;

        
        const headerNav = document.querySelector('.barra-navegacion');
        const documentBody = document.querySelector('body');

        // si la cantidad de escroll es mayor a, agregar una clase
        if(scroll > 300) {
            headerNav.classList.add('fixed-top');
            documentBody.classList.add('ft-activo');
        } else {
            documentBody.classList.remove('ft-activo');
            headerNav.classList.remove('fixed-top');
        }
    }


});