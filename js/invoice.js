
 $(document).ready(function () {
   var count = $(".itemRow").length;
   $(document).on('click', '#addRows', function () {
     count++;
     var htmlRows = '';
     htmlRows += '<tr>';
     htmlRows += '<td><div class="itemRow" id="itemRow_' + count + '">' + count + '</div></td>';
     htmlRows += '<td><input type="text" name="productName[]" id="productName_' + count + '" class="form-control" autocomplete="off"></td>';
     htmlRows += '<td><input type="number" name="quantity[]" id="quantity_' + count + '" class="form-control quantity" autocomplete="off"></td>';
     htmlRows += '<td><input type="number" name="price[]" id="price_' + count + '" class="form-control price" autocomplete="off"></td>';
     htmlRows += '<td><input type="number" name="taxRate[]" id="taxRate_' + count + '" class="form-control taxRate" autocomplete="off"></td>';
     htmlRows += '<td><input type="number" name="lineTotal[]" id="lineTotal_' + count + '" class="form-control lineTotal" autocomplete="off"></td>';
     htmlRows += '</tr>';
     $('#invoiceItem').append(htmlRows);
   });
   $(document).on('blur', "[id^=taxRate_]", function () {
     calculateTotal();
   });
   $(document).on('blur', "#discount", function () {
     var discount = $(this).val();
     var totalAftertax = $('#totalAftertax').val();
     if (discount && totalAftertax) {
       totalAftertax = totalAftertax - discount;
       $('#total').val(totalAftertax);
     } else {
       $('#total').val(totalAftertax);
     }
   });
 });

 function calculateTotal() {
   var totalAmount = 0;
   $("[id^='price_']").each(function () {
     var id = $(this).attr('id');
     id = id.replace("price_", '');
     var price = $('#price_' + id).val();
     var quantity = $('#quantity_' + id).val();
     if (!quantity) {
       quantity = 1;
     }
     var total = price * quantity;
     $('#lineTotal_' + id).val(parseFloat(total));
     totalAmount += total;
   });
   $('#subTotal').val(parseFloat(totalAmount));
   var subTotal = $('#subTotal').val();
   if (subTotal) {
     $("[id^='taxRate_']").each(function () {
       var taxid = $(this).attr('id');
       taxid = taxid.replace("taxRate_", '');
       var taxRate = $('#taxRate_' + taxid).val();
       var total = $('#lineTotal_' + taxid).val();
       var taxAmount = total * taxRate / 100;
       $('#taxAmount').val(taxAmount);
       subTotal = parseFloat(subTotal) + parseFloat(taxAmount);
     });
     $('#totalAftertax').val(subTotal);
     var discount = $('#discount').val();
     var totalAftertax = $('#totalAftertax').val();
     if (discount && totalAftertax) {
       totalAftertax = totalAftertax - discount;
       $('#total').val(totalAftertax);
     } else {
       $('#total').val(subTotal);
     }
   }
 }
