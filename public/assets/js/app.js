$(document).ready(function() {
    // Delete field using Ajax
    $('.btn-delete').click(function(event) {
        var row = $(this).parents('tr'),
            id = row.data('id'),
            form = $('#form-delete'),
            url = form.attr('action').replace(':ELEMENT_ID', id),
            data = form.serialize();

        row.fadeOut();

        $.post(url, data, function(result) {
            alert(result.message);
        }).fail(function(result) {
            alert('El usuario no fue eliminado. ERROR: ' + result.statusText);
            row.fadeIn();
        });

        event.preventDefault();
    });

    // tooltip load for bootstrap
    $('[data-toggle="tooltip"]').tooltip()

    // edit bio for users profile
    $('p.profile-bio').on('click', function(event) {
        event.preventDefault();

        el = $(this);
        textarea = $(this).parent().find('.form-group');

        $(el).toggleClass('hidden');
        $(textarea).toggleClass('hidden');
    });

    // toggle class for textarea, cancel button
    $('.cancel-edit-bio').on('click', function(event) {
        event.preventDefault();

        padre = $(this).parent();
        bio = $('p.profile-bio');

        $(padre).toggleClass('hidden');
        $(bio).toggleClass('hidden');
    });

    // hide empty social inputs, and show with button
    /*$(".social-fields input.form-control").each(function(i, e) {
        texto = $(e).parent().find("label").text();
        parents = $(e).parents(".social-fields");
        parents.append("<ul><li>"+texto+"</li></ul>");
        
        $(e).attr("value") == "" ? $(e).parent().hide() : $(e).parent().show()
    })*/


});
// change imagen on error
function imgError(image) {
    image.onerror = "";
    image.src = "/assets/images/profile_pictures/user-placeholder.png";
    image.title = "Tu imagen no se ha encontrado, al parecer fue eliminada.";
    return true;
}