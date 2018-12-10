$( document ).ready(function() {
    $('#picture0').change(function() {
        var file = $(this)[0].files[0].name;
        $(this).next('label').text(file);
      });
      
      $('#instVideo').change(function() {
        var file = $(this)[0].files[0].name;
        $(this).next('label').text(file);
      });
});