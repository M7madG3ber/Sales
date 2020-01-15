function loadAjaxQuantity() {
    var quants = document.querySelectorAll(".addBillPurchaseQuantity");
    quants.forEach(function (item, index) {
        item.addEventListener("blur", function (e) {
            var id = e.target.getAttribute("id");
            var value = e.target.value;
            var num = id[id.length - 1];
            var itemId = $("#addBillPurchaseItem" + num + " option:selected").val();
            var item = {
                id: itemId
            };
            var myJSON = JSON.stringify(item);
            $.ajax({
                url: "getItemQuantity.php",
                dataType: "text",
                type: "post",
                data: { myJSON },
                success: function (response) {
                    var itemObj = JSON.parse(response);
                    if ( parseInt(value) > parseInt(itemObj.item_quantity) ) {
                        $("#alertQuantityCount").text(itemObj.item_quantity);
                        $("#alertQuantity").slideDown(2000);
                        setTimeout(function () {
                            $("#alertQuantity").slideUp(2000);
                        }, 4000);
                        document.getElementById(id).value = "";
                    }
                }
            });
        });
    });
}
function loadAjaxPrice() {
    var quants = document.querySelectorAll(".addBillPurchasePrice");
    quants.forEach(function (item, index) {
        item.addEventListener("blur", function (e) {
            var id = e.target.getAttribute("id");
            var value = e.target.value;
            var num = id[id.length - 1];
            var itemId = $("#addBillPurchaseItem" + num + " option:selected").val();
            var item = {
                id: itemId
            };
            var myJSON = JSON.stringify(item);
            $.ajax({
                url: "getItemPrice.php",
                dataType: "text",
                type: "post",
                data: { myJSON },
                success: function (response) {
                    var itemObj = JSON.parse(response);
                    if ( parseFloat(value) < parseFloat(itemObj.item_price)) {
                        $("#alertPriceCount").text(itemObj.item_price);
                        $("#alertPrice").slideDown(2000);
                        setTimeout(function () {
                            $("#alertPrice").slideUp(2000);
                        }, 4000);
                        document.getElementById(id).value = "";
                    }
                }
            });
        });
    });
}

// $(function () {
//     $("#addBillSaleIcon").on("click", function () {
//         var count = parseInt($("#addBillSaleCount").val()) + 1;
//         $("#addBillSale").append(
//             '<tr><td><div class="form-group" style="margin:0"><select id="addBillSaleItem' +
//             count +
//             '" name="item[]"><?php echo $options; ?></select></div></td><td><div class="form-group" style="margin:0"><input id="addBillSaleQuantity' +
//             count +
//             '" name="quantity[]" type="number" class="form-control" placeholder="الكمية" /></div></td><td><div class="form-group" style="margin:0"><input id="addBillSalePrice' +
//             count +
//             '" name="price[]" type="number" class="form-control" placeholder="السعر" /></div></td></tr>'
//         );
//         $("#addBillSaleCount").val(count);
//     });

//     $("#addBillPurchaseIcon").on("click", function () {
//         var count = parseInt($("#addBillPurchaseCount").val()) + 1;
//         $("#addBillPurchase").append('<tr><td><div class="form-group" style="margin:0"><select id="addBillPurchaseItem' + count + '" name="item[]">$options</select></div></td><td><div class="form-group" style="margin:0"><input id="addBillPurchaseQuantity' + count + '" name="quantity[]" type="number" class="form-control addBillPurchaseQuantity" placeholder="الكمية" /></div></td><td><div class="form-group" style="margin:0"><input id="addBillPurchasePrice' + count + '" name="price[]" type="number" class="form-control addBillPurchasePrice" placeholder="السعر" /></div></td></tr>');
//         $("#addBillPurchaseCount").val(count);
//         loadAjaxQuantity();
//         loadAjaxPrice();
//     });

//     loadAjaxQuantity();
//     loadAjaxPrice();
// });
