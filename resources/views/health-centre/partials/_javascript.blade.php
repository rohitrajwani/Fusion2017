{!! Html::script('js/jquery-3.1.1.min.js') !!}
<!--Import jQuery before materialize.js-->
{!! Html::script('js/materialize.min.js') !!}
{!! Html::script('js/addfield.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
        $(".dropdown-button").dropdown();
        $('.materialboxed').materialbox();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            min:1,
            max:7,
            format: 'yyyy-mm-dd'
          });
    });
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#tab"); //Fields wrapper
    var add_button      = $("#add"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3 offset-s3"><input type="text" name="tablet[]"><label>Name</label></div><div class="col s3"><input type="number" name="no[]"><label>No. of Tablet</label></div></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script>
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
