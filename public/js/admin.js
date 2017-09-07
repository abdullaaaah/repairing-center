$(document).ready(function() {

  $(".clickable").click(function() {
    window.location = $(this).attr('data-href');
  });

  $(".confirmable").click(function(e) {
    e.preventDefault();

    var confirm = window.confirm("This action is irreversible.");
    if(confirm)
    {
      var form_id = $(this).data('form-id');
      $("#form-"+form_id).submit();
    } else {
    }

  });


});
