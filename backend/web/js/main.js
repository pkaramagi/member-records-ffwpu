/**
 * Created by Philip on 7/22/2016.
 */
 
	
(function($) {

    /* modal variable */

    var modalAdd = $('#user-details-add');
    var userid = $('#user-id').data('id');

    modalAdd.on('show.bs.modal', function(event) {
        var modal = $(this);
        modal.find('.modal-body').css({
            width: 'auto', //probably not needed
            height: 'auto', //probably not needed 
            'max-height': '100%'
        });
        var button = $(event.relatedTarget) // Button that triggered the modal
        var title = button.data('title') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        modal.find('.modal-title').text(title);

        $.post(button.attr('href'), {
            user_id: userid,
            ajax: true
        }, function(data) {
            modal.find('.modalContent').html(data);
        });



        //  modal.find('.modal-body input').val(recipient)

    });


    //
   modalAdd.on('hide.bs.modal', function() {
         tinymce.execCommand('mceRemoveControl', true, 'textarea');
    });

    //Submit data to controller action

    $('body').on('beforeSubmit', 'form#address-form', function(event) {
        var form = $(this);
        event.preventDefault();
        $.post(form.attr('action'), form.serialize(), function(data) {
            $.pjax.reload({
                container: "#address-grid"
            });
            modalAdd.hide();
        });

        return false;
    });

    //Submit data to controller action

    $('body').on('beforeSubmit', 'form#contact-form', function(event) {
        var form = $(this);
        event.preventDefault();
        $.post(form.attr('action'), form.serialize(), function(data) {
            $.pjax.reload({
                container: "#address-grid"
            });
            modalAdd.hide();
        });

        return false;
    });

    

})(window.jQuery);