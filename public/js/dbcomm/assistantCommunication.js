$(document).ready(function(){
    
    $btnGoodsAddRow = $("#send-goods-add-row");
    $btnGoodsRemoveRow = $("#send-goods-remove-row")

    /* get table */
    $goodsTable = $("#send-goods-table");
    /* get tbody */
    $goodsTbody = $("#send-goods-table-body");


    $($btnGoodsAddRow).click(function(){

        $newTr = $("<tr></tr>");

        $TdOne = $("<td></td>");
        $nameInput = $("<input />");
        $nameInput.addClass("form-control");
        $nameInput.attr("type","text");
        $nameInput.attr("name","send_goods_name[]");
        $nameInput.attr("placeholder","name of the item");
        $TdOne.append($nameInput);

        $TdTwo = $("<td></td>");
        $quantityInput = $("<input />");
        $quantityInput.addClass("form-control");
        $quantityInput.attr("type","number");
        $quantityInput.attr("name","send_goods_quantity[]");
        $quantityInput.attr("placeholder","quantity");
        $TdTwo.append($quantityInput);

        $newTr.append($TdOne);
        $newTr.append($TdTwo);

        $goodsTbody.append($newTr);
    }); 

    $($btnGoodsRemoveRow).click(function(){
        var table = document.getElementById("send-goods-table");
        var rowCount = table.rows.length;
    
       if(rowCount > 2){
        table.deleteRow(rowCount -2);
       }
    });

    /* POS */
    $tableRows = 1;
    $totalAmount = 0;
    
});

function sendToCart($id){



    $.ajax({
        method:"GET",
        url: `api/article/${$userId}/${$id}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {

                newCartItem(data[index].id, data[index].name, data[index].price, $tableRows);
               
             });
        }
    });


    
}

function newCartItem($id,$name,$price,$tableRow){
    

    $posItemQuantity = $(`#pos-cart-item-quantity-${$id}`).val();
    $posItemPrice = $(`#pos-cart-item-price-${$id}`).val();

    if($posItemQuantity != undefined){
        $.get( `api/article/${$userId}/${$id}`, function( data ) {
            $currentPrice = data[0].price;
            $totalAmount += data[0].price;
          
            $posItemQuantity++;
            $(`#pos-cart-item-quantity-${$id}`).val($posItemQuantity);
            $(`#pos-cart-item-price-${$id}`).val($posItemQuantity * $currentPrice);
            $("#pos-total-amount").val($totalAmount);

          });
    
    

    }else{

    // First row + 1 td
      $newItemRow = $("<tr></tr>");
      $newItemRow.addClass(`table-row-${$tableRow}`);

      // 1 td
      $newItemColName = $("<td></td>");
      $newItemColName.attr("colspan","2");
  
      // input name
      $newItemInputName = $("<input />");
      $newItemInputName.addClass("form-control");
      $newItemInputName.attr("type","text");
      $newItemInputName.attr("name","pos_cart_item[]");
      $newItemInputName.attr("id",`pos-cart-item-${$id}`);
      $newItemInputName.attr("value", `${$name}`);
      $newItemInputName.attr("readonly");
  
      // append to 1st row
      $newItemColName.append($newItemInputName);
      $newItemRow.append($newItemColName);
  
      // Second row + 2 td
      $newItemRowTwo = $("<tr></tr>");
      $newItemRowTwo.addClass(`table-row-${$tableRow}`);
  
      // 1 td
      $newItemColQuantity =$("<td></td>");
  
      // input quantity
      $newItemInputQuantity = $("<input />");
      $newItemInputQuantity.addClass("form-control");
      $newItemInputQuantity.attr("type","text");
      $newItemInputQuantity.attr("name","pos_cart_item_quantity[]");
      $newItemInputQuantity.attr("id",`pos-cart-item-quantity-${$id}`);
      $newItemInputQuantity.attr("value", "1");
      $newItemInputQuantity.attr("readonly");
  
      // 2 td
      $newItemColPrice =$("<td></td>");
  
      //input price
      $newItemInputPrice = $("<input />");
      $newItemInputPrice.addClass("form-control");
      $newItemInputPrice.attr("type","text");
      $newItemInputPrice.attr("name","pos_cart_item_price[]");
      $newItemInputPrice.attr("id",`pos-cart-item-price-${$id}`);
      $newItemInputPrice.attr("value", `${$price}`)
      $newItemInputPrice.attr("readonly");
  
      //append to 2nd row
      $newItemColQuantity.append($newItemInputQuantity);
      $newItemColPrice.append($newItemInputPrice);
      $newItemRowTwo.append($newItemColQuantity);
      $newItemRowTwo.append($newItemColPrice);
  
      //append rows to the tbody
      $("#pos-cart-table-body").append($newItemRow);
      $("#pos-cart-table-body").append($newItemRowTwo);

      $.get( `api/article/${$userId}/${$id}`, function( data ) {
        $totalAmount += data[0].price;
      
        $("#pos-total-amount").val($totalAmount);

      });

      
      $tableRows++;
    }
  
}


// <tr>
// <td colspan="2">
//     <input type="text" class="form-control" name="pos-cart-item[]" readonly/>
// </td>
// </tr>
// <tr>
// <td>
//     <input type="number" class="form-control" name="pos-cart-quantity[]" readonly />
// </td>
// <td>
//     <input type="number" class="form-control" name="pos-cart-quantity[]" readonly />
// </td>
// </tr>