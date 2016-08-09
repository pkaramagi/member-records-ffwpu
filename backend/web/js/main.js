/**
 * Created by Philip on 7/22/2016.
 */
 
	
(function($) {

    /* modal variable */

    var modalAdd = $('#user-details-add');
    var userid = $('#user-id').data('id');

    modalAdd.on('shown.bs.modal', function(event) {
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


    //remove content from the modal
   modalAdd.on('hidden.bs.modal', function() {
		$(this).find('.modalContent').html('');
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

    $('body').on('beforeSubmit', 'form#donations-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#award-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#punishment-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#unification-career-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#general-career-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#qualification-form', function(event) {
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

    $('body').on('beforeSubmit', 'form#certified-qualification-form', function(event) {
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

    $('.action-link').on('click',function(event){
		var link = $(this);
		var modal = $('#user-details-rud');
		 modal . find ('.modal-title') . text( link.attr('title') );
		 $.post(link.attr('href'), function(data) {
			
            modal.find('.modalContent').html(data);
        });

		 modal.modal('show');
		 event.preventDefault();
	});
    $('#user-details-rud').on('hidden.bs.modal',function(){
		$(this).find('.modalContent').html('');
	});

})(window.jQuery);



