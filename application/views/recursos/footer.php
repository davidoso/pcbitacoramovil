        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url('assets/vendor/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/js/get_puesto.js'); ?>"></script>

        <!-- FontAwesome 5 -->
        <script defer src="<?php echo base_url('assets/vendor/js/fontawesome-all.js'); ?>"></script>

    </body>

    <!-- Custom script -->
    <script type="text/javascript">
        $(document).ready(function($) {
          var list_target_id = 'equipo'; //first select list ID
          var list_select_id = 'familia'; //second select list ID
          var initial_target_html = '<option value="">Elige una familia</option>'; //Initial prompt for target select

          $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
          $('#'+list_select_id).prop('selectedIndex', 0);; //Change select to its first option (by index)

          $('#'+list_select_id).change(function(e) {
            //Grab the chosen value on first select list change
            var selectvalue = $(this).val();

            //Display 'loading' status in the target select list
            $('#'+list_target_id).html('<option value="">Cargando equipos...</option>');

            if (selectvalue == "") {
                //Display initial prompt in target select if blank value selected
               $('#'+list_target_id).html(initial_target_html);
            } else {
              //Make AJAX request, using the selected value as the GET
              $.ajax({url: "<?php echo site_url('Principal/ajax_equipos?f=')?>"+selectvalue,
                     success: function(output) {
                        //alert(output);
                        $('#'+list_target_id).html(output);
                    },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " "+ thrownError);
                  }});
                }
            });
        });
    </script>
</html>