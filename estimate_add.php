<?php
require_once "app/header.php";
require_once "classes/invoic.php";
$invoice = new Invoic();
$message="";
if(isset($_POST['save'])){
    $message = $invoice->invoicAdd($_POST);
}
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card text-center card mb-3">
                <div class="card-header bg-dark text-white">
                    ESTIMATED ADD
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <p> <?php echo $message; ?></p>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label"> Labor Type </label>
                            <div class="col-sm-9">
                                <select name="labor" class="form-control">
                                    <option> Select Labor Type </option>
                                    <option> Body </option>
                                    <option> Refinish </option>
                                    <option> Mechanical </option>
                                    <option> Frame </option>
                                    <option> Material </option>
                                    <option> Glass  </option>
                                    <option> Carbon Fiber </option>
                                    <option> Fleet </option>
                                    <option> User Defined 1 </option>
                                    <option> User Defined 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Labor Options</label>
                            <div class="col-sm-9">
                                <select name="labor_options" class="form-control">
                                    <option > Select Labor Options </option>
                                    <option> Remove/Replace </option>
                                    <option> Repair </option>
                                    <option>  Remove/Install </option>
                                    <option>  Align </option>
                                    <option> Overhaul </option>
                                    <option>  Access/Inspect </option>
                                    <option> Check/Adjust </option>
                                    <option> Paintless Repair </option>
                                    <option> Blend </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Part Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="partdescription" class="form-control" id="PartDescription" placeholder="Part Description" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Part Type</label>
                            <div class="col-sm-9">
                                <select name="part_type" class="form-control">
                                    <option > Select Part Type </option>
                                    <option> New </option>
                                    <option> Aftermarket (New) </option>
                                    <option> Remanufactured </option>
                                    <option>  Qual Recycled Part </option>
                                    <option> Sublet </option>
                                    <option>  Rechromed </option>
                                    <option> OE Surplus </option>
                                    <option> Recored </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label"> Part Number</label>
                            <div class="col-sm-9">
                                <input type="text" name="part_number" class="form-control" id="PartNumber" placeholder="Part Number" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" id="Price" placeholder="Price" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Tax</label>
                            <div class="col-sm-9">
                                <input type="text" name="tax" class="form-control" id="Tax" placeholder="Tax" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Labor Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="laborunit" class="form-control" id="LaborUnit" placeholder="Labor Unit" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Cost (per unit) </label>
                            <div class="col-sm-9">
                                <input type="text" name="cost" class="form-control" id="Cost" placeholder="Cost" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <input type="submit" name="save" value="Save" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "app/footer.php";?>