$(document).ready(function(){
    var
          images = "#gallery > img" // image selector
        , interval = 4000           // milliseconds between transitions
        , index = 0                 // starting index
        , count = $(images).length  // image count
          // the transition loop
          , handle = setInterval(function() {
            // fade out the current image
            $(images + ":eq(" + index + ")").fadeOut('slow');
            // get the next index, or cycle back to 0
            if (++index === count) index = 0;
            // fade in the next image
            $(images + ":eq(" + index + ")").fadeIn('slow');
        }
        , interval
        )
          , stop = function(){
            clearInterval(handle);
        };
    });

$(document).ready(function() {
  $('#img').fadeIn(1500).delay(3500).fadeOut(1500);
  $('#img').delay(2000).fadeIn(1500);
});