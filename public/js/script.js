$(document).ready(function() {

  $("#home-section-1").height($(window).height());


  $(window).resize(function() {
    $("#home-section-1").height($(this).height());
 }).resize();



  var height = $(window).height();

  //$("#about-section-1").height(height-(height/3));

  var Variations = false;

  var selectedVariation = 0;

  var selectedPhone = false;

  var Cities = false;

  var selectedCountry = false;

  var selectedCity = false;


  $("#option-2").click(function() {
    alert("Sorry, we dont support online reservations for this option yet. Please call us.");
  });

  $("#option-3").click(function() {
    alert("Sorry, we dont support online reservations for this option yet. Please call us.");
  });


  //Phone Variation

  $('#step-two-phones').change(function() {

    selectedPhone = $(this).val();

    $.ajax({

      url: "/variations/phone/"+$(this).val(),
      type: "GET",
      async: false,
      success: function(data)
      {
        Variations = data;
      }

   });


   $("#step-two-variations").html("<option>Select</option>");



   selectedVariation = Variations[0].id;

   $('#step-two-variations').html("<option value='" + Variations[0].id + "' class='variations-option' selected> Select </option>");


   for(var i = 1; i < Variations.length; i++ )
   {

     $('#step-two-variations').append($('<option>', {

       value: Variations[i].id,
       text: Variations[i].color + ", " + Variations[i].capacity + " GB"

     })).find("option").addClass('variations-option');

   }

   $('#step-two-variations').change(function() {

     $('#variation-field').val($(this).val());

   });



  });

//end variation


  //country and city

  $('#country_id').change(function() {

    $("#city_id").html("<option value='0'>Select</option>");

    selectedCountry = $(this).val();

    if(selectedCountry==1)
    {
      $("#city-label").html("Available Cities");
    } else {
      $("#city-label").html("Available States");
    }


    if($(this).val())
    {
      $.ajax({

        url: "/country/"+$(this).val()+"/cities",
        type: "GET",
        async: false,
        success: function(data)
        {
          Cities = data;
        }

     });
    }

    for(var i = 0; i < Cities.length; i++)
    {
      $('#city_id').append($('<option>', {

        value: Cities[i].id,
        text: Cities[i].name

      })).find("option").addClass('city-option').attr('data-cod',Cities[i].supports_cod).attr('data-paypal', Cities[i].supports_paypal);

    }//end for


    $('#city_id').change(function() {

      $("#city-field").val($(this).val());

    });




  });

  //uk api

  $("#address-field").click(function() {

    $.get("https://api.getAddress.io/find/" + $("#postal-code-field").val().replace(/\s+/g, '') + "?api-key=sQTyz3d7mE2w2Gm2XdJOUQ10150", function(data, status){

      $(this).val(data.addresses[1]);
      $(this).val(data.addresses[1]);
      $("#address-field").val(data.addresses[1]);


    });

  });



});
