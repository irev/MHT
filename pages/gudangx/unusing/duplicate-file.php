<script src="js/jquery-2.2.1.min.js"></script>
<form id="form_keluar" action="javascript:void(0);" method="POST" autocomplete="off">
    <input type="submit" value="Submit">
    <br>
    <br>
    <div class="bigjane"><button id="add">Add Field</button>
        <div class='input_line'>
            <input type="text" name="input_0" placeholder="Input1"><input type="text" name="input_0" placeholder="Input2"><input type="text" name="input_0" placeholder="Input3"><input type="button" class="duplicate" value="duplicate"><input type="button" class="remove" value="remove"><br></div>
    	</div>
</form>

<script type="text/javascript">
	jQuery(document).ready(function () {
    'use strict';
    var input = 1,
        button = ("<button class='add'>Add Field</button>");
    var blank_line = $('.input_line').clone();
    $('#add').click(function () {
       
        $('form').append(blank_line.clone())
        $('.input_line').last().before($(this));
    });
    
    $('#form_keluar').on('click', '.remove', function () {
        $(this).parent().remove();
         $('.input_line').last().before($('#add'));
        input = input - 1;
    });
    
    $('#form_keluar').on('click', '.duplicate', function () {
       $('form').append($(this).parent().clone());
          $('.input_line').last().before($('#add'));
        input = input + 1;
    });
});

</script>