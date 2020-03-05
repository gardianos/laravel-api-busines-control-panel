$(document).ready(function(){

    $btnNewSupplier = $('#btn-new-supplier');
    $supplierMessage = $('#new-supplier-message');
    $btnAddRow = $('#add-row-supplies');
    $btnRemoveRow = $('#remove-row-supplies');


     /* suppliers list */
     $supplierList = $('#suppliers-list');
     /* supply list */
     $supplyListItems = $('#supplies-list-items');

     $($btnAddRow).click(function(){

        $newListItem = $("<li></li>");
        $newListItem.addClass("list-group-item");

        $newDiv = $("<div></div>");
        $newDiv.addClass("d-flex flex-row");

        $inputName = $("<input />");
        $inputName.addClass("form-control");
        $inputName.attr("name","request-supplies-name[]");
        $inputName.attr("placeholder","name of the item");

        $inputQuantity = $("<input />");
        $inputQuantity.addClass("form-control");
        $inputQuantity.attr("name","request-supplies-quantity[]");
        $inputQuantity.attr("placeholder","quantity");

        $newDiv.append($inputName);
        $newDiv.append($inputQuantity);

        $newListItem.append($newDiv);

        $lastLi = document.querySelector(".last-li");

        $($newListItem).insertAfter("li.last-li");
        $($lastLi).removeClass("last-li");
        $($newListItem).addClass("last-li");
     })

     $($btnRemoveRow).click(function(){
       
        $lastLi = document.querySelector(".last-li");
        $count = 0;
        $('#supplies-list-items li').each(function () {
            
            $thisClass = this.className;
            
            if($thisClass != "last-li"){
                console.log(this);
            }else{
                this.remove();
            }
            
            $count++;
        });

        $test = $count - 3;
        if($count > 3){
            $($lastLi).remove();
        }
        $(`#supplies-list-items li:nth-child(${$test})`).addClass("last-li");
     })

     /* populate suppliers list */
     $($supplierList).empty();
 
     $.ajax({
         method:"GET",
         url: `api/supplier/${$userId}`,
         cache: false,
         data: { get_param: 'value' }, 
         dataType: 'json',
         success: function (data) { 
         $.each(data, function(index) {
             $newOption = $("<li></li>");
             $newOption.addClass("list-group-item");
             $newButton = $("<button></button>");
             $newButton.attr("type","button");
             $newButton.attr("onclick",`showSupplier(${data[index].id})`);
             $newButton.addClass("btn btn-primary");
             $newButton.text(data[index].name);
             $newOption.append($newButton);
 
             $supplierList.append($newOption);
 
 
              });
         }
     });

    $($btnNewSupplier).click(function(){

    /* supplier input*/
    $supplierName= $('#new-supplier-name').val();
    $supplierManager= $('#new-supplier-manager').val();
    $supplierPhone= $('#new-supplier-phone').val();
    $supplierEmail = $('#new-supplier-email').val();



        $.ajax({
            url: 'api/supplier/new',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify( { 
                "userId": $userId, 
                "name" : $supplierName,
                "manager" : $supplierManager,
                "phone" : $supplierPhone,
                "email" : $supplierEmail

            } ),
            processData: false,
            success: function( data, textStatus, jQxhr ){
                $divAlert = $("<div></div>");
                $divAlert.addClass("alert alert-success alert-dismissible fade show");
                $divAlert.attr("role","alert");
                
                $divMessage= $("<p></p>").text("Supplier was registered successfully!");
                
                $divBtn = $("<button></button>");
                $divBtn.attr("type","button");
                $divBtn.attr("data-dismiss","alert");
                $divBtn.attr("aria-label","Close");
                $divBtn.attr("type","button");
                $divBtn.addClass("close");
                
                $btnSpan = $("<span></span>").text("x");
                $btnSpan.attr("aria-hidden","true");
                
                $divBtn.append($btnSpan);
                $divAlert.append($divMessage);
                $divAlert.append($divBtn);

                $supplierMessage.append($divAlert);
            
            },
            error: function( jqXhr, textStatus, errorThrown ){
                $divAlert = $("<div></div>");
                $divAlert.addClass("alert alert-danger alert-dismissible fade show");
                $divAlert.attr("role","alert");
                
                $divMessage= $("<p></p>").text(errorThrown);
                
                $divBtn = $("<button></button>");
                $divBtn.attr("type","button");
                $divBtn.attr("data-dismiss","alert");
                $divBtn.attr("aria-label","Close");
                $divBtn.attr("type","button");
                $divBtn.addClass("close");
                
                $btnSpan = $("<span></span>").text("x");
                $btnSpan.attr("aria-hidden","true");
                
                $divBtn.append($btnSpan);
                $divAlert.append($divMessage);
                $divAlert.append($divBtn);

                $supplierMessage.append($divAlert);
                console.log( errorThrown );
            }
        });

    })
});

function showSupplier(id){

    $.ajax({
        method:"GET",
        url: `api/supplier/${$userId}/${id}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {

                $("#profile-supplier-name").text(data[index].name);
                $("#profile-supplier-manager").text(data[index].manager);
                $("#profile-supplier-phone").text(data[index].phone);
                $("#profile-supplier-email").text(data[index].email);

            });
        }
    });
}