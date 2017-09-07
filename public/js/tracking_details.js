var repair_id = $("#track-container").attr('data-id');

var trackings = [];

var tracking_status = false;

$.ajax({

  url: "/repairs/track/"+repair_id,
  type: "GET",
  async: false,
  success: function(data)
  {
    trackings = JSON.parse(data);
  }

});

tracking_status = trackings[trackings.length-1].status;

var x = 0;

for(var i = 1; i < trackings[trackings.length-1].status + 1; i++ )
{
  x++
  $("#track-item-"+x).addClass('track-item-done');
  $("#track-item-"+x).prepend('<i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>');

}
