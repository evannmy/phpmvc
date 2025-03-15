$(function() {
  $('.add-button').on('click', function() {
    $('#formContactLabel').html('Form Add Contact');
    $('.modal-footer button[type=submit]').html('Add Contact');
    $('form').attr('action', 'http://localhost/~vann/phpmvc/public/contacts/add')

    $('form #id').val('');
    $('form #name').val('');
    $('form #email').val('');
    $('form #phoneNumber').val('');
  });

  $('.update-button').on('click', function() {
    $('#formContactLabel').html('Form Update Contact');
    $('.modal-footer button[type=submit]').html('Update Contact');
    $('form').attr('action', 'http://localhost/~vann/phpmvc/public/contacts/update');
    
    contactId = $(this).data('id');
    
    $.ajax({
      url: 'http://localhost/~vann/phpmvc/public/contacts/getUpdate',
      method: 'POST',
      data: { id: contactId },
      dataType: 'JSON',
      success: function(response) {
        contact = response;
        
        $('form #id').val(contact['id']);
        $('form #name').val(contact['name']);
        $('form #email').val(contact['email']);
        $('form #phoneNumber').val(contact['phone_number']);
      }
    });
  });
});