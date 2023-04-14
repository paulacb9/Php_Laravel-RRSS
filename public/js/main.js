var url = "http://proyecto-laravel.com.devel/";
window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-deslike').css('cursor', 'pointer');

    // Boton de like
    function like() {
        $('.btn-like').unbind('click').click(function () {
            console.log('like');
            $(this).addClass('btn-deslike').removeClass('btn-like');
            $(this).attr('src', url+'img/hearts-red.png');

            // Peticiones AJAX para que nos guarde en la BD
            $.ajax({
                url: url+'like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('Has dado like a la publicación');
                    }else{
                        console.log('Error al dar like');
                    }
                }
            });

            deslike();
        });
    }
    like();

    // Boton deslike
    function deslike() {
        $('.btn-deslike').unbind('click').click(function () {
            console.log('deslike');
            $(this).addClass('btn-like').removeClass('btn-deslike');
            $(this).attr('src', url+'img/hearts-black.png');

            // Peticiones AJAX para que nos guarde en la BD
            $.ajax({
                url: url+'deslike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('Has dado deslike a la publicación');
                    }else{
                        console.log('Error al dar like');
                    }
                }
            });

            like();
        });
    }
    deslike();

    // BUSCADOR
    $('#buscador').submit(function(){
        $(this).attr('action',url+'gente/'+$('#buscador #search').val());
    })

});