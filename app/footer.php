<div class="container-fluid bg-secondary text-white p-2">
    <div class="row">
        <div class="col-md-12 text-center">
            <p> Copyright By Cretechbd.com </p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var count = 1;
        $('#add').click(function(){
            count = count + 1;
            var html_code = "<tr id='row"+count+"'>";
            html_code += "<td contenteditable='true' class='item_labour'> </td>"
            html_code += "<td contenteditable='true' class='item_option'> </td>"
            html_code += "<td contenteditable='true' class='item_description'> </td>"
            html_code += "<td contenteditable='true' class='item_parttype'> </td>"
            html_code += "<td contenteditable='true' class='item_partnumber'> </td>"
            html_code += "<td contenteditable='true' class='item_price'> </td>"
            html_code += "<td contenteditable='true' class='item_tax'> </td>"
            html_code += "<td contenteditable='true' class='item_unit'> </td>"
            html_code += "<td contenteditable='true' class='item_cost'> </td>"
            html_code += "<td> <button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-sm remove'>-</button> </td>";
            html_code = "</tr>";
            $('#crud_table').append(html_code);
        });
    });
</script>
</body>
</html>