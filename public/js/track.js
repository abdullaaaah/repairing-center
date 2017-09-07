$(document).ready(function(){

  $("#track-phone-btn").click(function() {

    //collect the value
    var phone = $("#track-phone-number-field").val();

    //remove spaces and dashes

    //run ajax and find if there is any results
    $.ajax({

      url: "/repairs/phone/"+phone,
      type: "GET",
      async: false,
      success: function(data)
      {
        //redirect if results found
        if(data)
        {
          window.location = "/repairs/"+data.id;
        } else {
          $("#track-errors").show().html("No repair has been found associated with this phone number.");
        }
      }

   });


  });

  $("#track-email-btn").click(function() {

    //collect the value
    var email = $("#track-email-field").val();

    //run ajax and find if there is any results
    $.ajax({

      url: "/repairs/email/"+email,
      type: "GET",
      async: false,
      success: function(data)
      {
        //redirect if results found
        if(data)
        {
          window.location = "/repairs/"+data.id;
        } else {
          $("#track-errors").show().html("No repair has been found associated with this email address.");
        }
      }

   });


  });

});
