$(document).ready(function(){

    /* user id */
    $userId = $('#user-id').text();

    /* btn for client */
    $btnNewClient = $('#btn-new-client');
    $btnEditClient = $('#btn-edit-client');
    $btnRemoveClient = $('#btn-remove-client');
    $clientMessage = $('#new-client-message');


    /* clients list */
    $clientList = $('#clients-list');

    /* populate clients list */
    $($clientList).empty();

    $.ajax({
        method:"GET",
        url: `api/client/${$userId}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {
            $newOption = $("<li></li>");
            $newOption.addClass("list-group-item");
            $newButton = $("<button></button>");
            $newButton.attr("type","button");
            $newButton.attr("onclick",`showClient(${data[index].id})`);
            $newButton.addClass("btn btn-primary");
            $fullname = data[index].name + ' ' + data[index].surname;
            $newButton.text($fullname);
            $newOption.append($newButton);

            $clientList.append($newOption);


             });
        }
    });

    /* add new client ajax post */
    ($btnNewClient).click(function(){
        
        /* client input*/
        $clientName= $('#new-client-name').val();
        $clientSurname= $('#new-client-surname').val();
        $clientCompany= $('#new-client-company').val();
        $clientPhone= $('#new-client-phone').val();
        $clientAddress= $('#new-client-address').val();
        $clientEmail= $('#new-client-email').val();


        $.ajax({
            url: 'api/client/new',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify( { 
                "userId": $userId, 
                "name": $clientName,
                "surname": $clientSurname,
                "company": $clientCompany,
                "phone": $clientPhone,
                "address": $clientAddress,
                "email": $clientEmail,
            } ),
            processData: false,
            success: function( data, textStatus, jQxhr ){
                $divAlert = $("<div></div>");
                $divAlert.addClass("alert alert-success alert-dismissible fade show");
                $divAlert.attr("role","alert");
                
                $divMessage= $("<p></p>").text("Client was registered successfully!");
                
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

                $clientMessage.append($divAlert);
               
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

                $clientMessage.append($divAlert);
                console.log( errorThrown );
            }
        });
    });

    $($btnEditClient).click(function(){

        /* get the input values */
        $id = $($clientId).text();
        $clientName = $($clientName).val();
        $clientSurname = $($clientSurname).val();
        $clientCompany = $($clientCompany).val();
        $clientPhone = $($clientPhone).val();
        $clientAddress = $($clientAddress).val();
        $clientEmail = $($clientEmail).val();

        setTimeout(function(){
            $.ajax({
                url: 'api/client/update',
                dataType: 'json',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify( { 
                    "userId": $userId, 
                    "clientId": $id,
                    "name" : $clientName,
                    "surname" : $clientSurname,
                    "company" : $clientCompany,
                    "phone" : $clientPhone,
                    "address" : $clientAddress,
                    "email" : $clientEmail

                } ),
                processData: false,
                success: function( data, textStatus, jQxhr ){
                    $divAlert = $("<div></div>");
                    $divAlert.addClass("alert alert-success alert-dismissible fade show");
                    $divAlert.attr("role","alert");
                    
                    $divMessage= $("<p></p>").text("Client was edited successfully!");
                    
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

                    $("#edit-client-message").append($divAlert);
                    
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

                    $("#edit-client-message").append($divAlert);
                    console.log( errorThrown );
                }
            });
            }, 300);


    });

});

function showClient(id){

    /* get the input fields */
    $clientName = $('#client-profile-name');
    $clientSurname = $('#client-profile-surname');
    $clientCompany = $('#client-profile-company');
    $clientPhone = $('#client-profile-phone');
    $clientAddress = $('#client-profile-address');
    $clientEmail = $('#client-profile-email');
    $clientPurchases = $('#client-profile-purchases');

    $.ajax({
        method:"GET",
        url: `api/client/${$userId}/${id}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {

                $($clientName).val(data[index].name);
                $($clientSurname).val(data[index].surname);
                $($clientCompany).val(data[index].company);
                $($clientPhone).val(data[index].phone);
                $($clientAddress).val(data[index].address);
                $($clientEmail).val(data[index].email);
                $($clientPurchases).val(data[index].totalpurchases);

                $('#btn-test-client').attr("onclick",`editClient(${data[index].id})`);
                $($btnRemoveClient).attr("onclick",`removeClient(${data[index].id})`);

            });
        }
    });

}

function editClient(id){

        /* get the input fields */
        $clientId = $('#client-id');
        $clientName = $('#edit-client-name');
        $clientSurname = $('#edit-client-surname');
        $clientCompany = $('#edit-client-company');
        $clientPhone = $('#edit-client-phone');
        $clientAddress = $('#edit-client-address');
        $clientEmail = $('#edit-client-email');
        $clientPurchases = '0';
    
        $.ajax({
            method:"GET",
            url: `api/client/${$userId}/${id}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {

                    $($clientId).text(data[index].id);
                    $($clientName).val(data[index].name);
                    $($clientSurname).val(data[index].surname);
                    $($clientCompany).val(data[index].company);
                    $($clientPhone).val(data[index].phone);
                    $($clientAddress).val(data[index].address);
                    $($clientEmail).val(data[index].email);
                    $($clientPurchases).val($clientPurchases);
    
                });
            }
        });

}



function removeClient(id){

    $.ajax({
        method:"DELETE",
        url: `api/client/${$userId}/${id}`,
        success: function( data, textStatus, jQxhr ){

            alert("deleted");
        },
        error: function( jqXhr, textStatus, errorThrown ){
            alert("something went wrong,check console");
            console.log( errorThrown );
        }
    });
}