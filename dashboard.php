<?php
require_once "app/header.php";
$connect = new PDO("mysql:host=localhost;dbname=estimate", "root", "");
function fill_unit_select_box($connect)
{
    $output = '';
    $query = "SELECT * FROM labourtype ORDER BY labour_type ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["labour_type"].'">'.$row["labour_type"].'</option>';
    }
    return $output;
}
function fill_unit_select_boxOption($connect)
{
    $output = '';
    $query = "SELECT * FROM labor_options ORDER BY labour_option ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["labour_option"].'">'.$row["labour_option"].'</option>';
    }
    return $output;
}

function fill_unit_select_boxparttype($connect)
{
    $output = '';
    $query = "SELECT * FROM  parttype ORDER BY parttype ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["parttype"].'">'.$row["parttype"].'</option>';
    }
    return $output;
}

?>

<div class="container">

    <h4 align="center">Enter Item Details</h4>
    <br />
    <form method="post" id="insert_form">
        <div class="table-repsonsive">
            <span id="error"></span>
            <table class="table table-bordered table-sm" id="item_table">
                <tr style="font-family: 'Kanit', sans-serif; text-align: center">
                    <th>Lobour Type </th>
                    <th>Labor Options </th>
                    <th>Part Description</th>
                    <th>Part Type</th>
                    <th>Part Number</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Labor Unit</th>
                    <th> Cost </th>
                    <th> Amount </th>
                    <th><button type="button" name="add" class="btn btn-success btn-sm add d-print-none"><i class="fas fa-plus"></i></button></th>
                </tr>
            </table>
            <div class="row text-right" style="margin-top:20px">
                <div class="col-md-8">

                </div>
                <div class=" col-md-4">
                    <table class="table table-bordered table-hover" id="tab_logic_total">
                        <tbody>
                        <tr>
                            <th class="text-center">Sub Total</th>
                            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                        </tr>
                        <tr>
                            <th class="text-center">Tax</th>
                            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                    <input type="number" class="form-control" id="tax" placeholder="0">
                                    <div class="input-group-addon">%</div>
                                </div></td>
                        </tr>
                        <tr>
                            <th class="text-center">Tax Amount</th>
                            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                        </tr>
                        <tr>
                            <th class="text-center">Grand Total</th>
                            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div align="center">
                <input type="submit" name="submit" class="btn btn-info d-print-none" value="Insert" />
                <input type="submit" name="submit" class="btn btn-dark d-print-none" value="print" onclick="window.print();" />
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        $(document).on('click', '.add', function(){
            var html = '';
            html += '<tr>';
            html += '<td><select name="lobourType[]" class="form-control lobourType"><option value="">Labour Type</option><?php echo fill_unit_select_box($connect); ?></select></td>';
            html += '<td><select name="loboutOption[]" class="form-control loboutOption"><option value="">Select Unit</option><?php echo fill_unit_select_boxOption($connect); ?></select></td>';
            html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
            html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_boxparttype($connect); ?></select></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove d-print-none"><i class="fas fa-minus"></i></button></td></tr>';
            $('#item_table').append(html);
        });

        $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
        });

        $('#insert_form').on('submit', function(event){
            event.preventDefault();
            var error = '';
            $('.lobourType').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Select Labour Type at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_name').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Enter Item Name at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_quantity').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Enter Item Quantity at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });


            var form_data = $(this).serialize();
            if(error == '')
            {
                $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        if(data == 'ok')
                        {
                            $('#item_table').find("tr:gt(0)").remove();
                            $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                            $('#error').html(window.location.replace("make_invoice.php"));
                        }
                    }
                });
            }
            else
            {
                $('#error').html('<div class="alert alert-danger">'+error+'</div>');
            }
        });

    });
</script>
