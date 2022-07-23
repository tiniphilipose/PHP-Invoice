<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<title>Invoice System</title>
<script src="js/invoice.js"></script>
<div class="container content-invoice">
  <form action="print_invoice.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
    <div class="row">
      <div class="col-md-8 mt-5">
        <h2 class="title">PHP Invoice System</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table" id="invoiceItem">
          <tr>
            <th width="2%">No</th>
            <th width="38%">Item Name</th>
            <th width="15%">Quantity</th>
            <th width="15%">Price($)</th>
            <th width="15%">Tax</th>
            <th width="15%">Line Total</th>
          </tr>
          <tr>
            <td><div class="itemRow" id="itemRow_1"> 1</div></td>
            <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
            <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
            <td><input type="number" class="form-control taxRate" name="taxRate[]" id="taxRate_1"></td>
            <td><input type="number" name="lineTotal[]" id="lineTotal_1" class="form-control lineTotal" autocomplete="off"></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12">
        <button class="btn btn-primary float-right" id="addRows" type="button">+ Add item</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <label>Subtotal without tax: &nbsp;</label>
        <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal" style="cursor: not-allowed;">
      </div>
      <div class="col-md-3">
        <label>Discount ($):</label>
        <input value="" type="number" class="form-control" name="discount" id="discount">
      </div>
      <div class="col-md-3">
        <label>Subtotal with tax:</label>
        <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" style="cursor: not-allowed;">
      </div>
      <div class="col-md-3">
        <label>Total: </label>
        <input value="" type="number" class="form-control" name="total" id="total" style="cursor: not-allowed;">
      </div>
      <div class="col-md-12 mt-3">
        <input type="submit" name="invoice_btn" id="invoice_btn" value="Generate Invoice" class="btn btn-success submit_btn invoice-save-btm float-right">
      </div>
    </div>
  </form>
</div>
<div class="container mt-5 mb-5 display_inv"></div>
</body>
</html>