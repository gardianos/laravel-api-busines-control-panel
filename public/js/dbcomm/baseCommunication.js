$(document).ready(function(){

    /* user id */
    $userId = $('#user-id').text();
    
    /* btn for Category */
    $btnNewCat = $('#btn-new-category');
    $catMessage = $('#new-category-message');

    /*btn for Article */
    $btnArticle = $('#btn-add-article');
    $btnNewArticle = $('#btn-new-article');
    $articleMessage = $('#new-article-message');
    $articleList = $('#article-category-select');

    /* btn for edit article */
    $btnEditArticle = $('#btn-edit-article');
    $btnEditArticleSubmit = $('#btn-edit-article-new');
    $editArticleMessage = $('#edit-article-message');

    /* edit inputs for article */
    $editMessage = $("#edit-article-message");
    $editInputName = $("#edit-article-name");
    $editInputPrice = $("#edit-article-price");
    $editInputBarcode = $("#edit-article-barcode");
    $editInputQuantity = $("#edit-article-quantity");
    $editInputCategory = $("#article-edit-category-select");
    $btnEditSave = $("#btn-edit-article-new");
    
    /*search articles */
    $searchField = $("#search-inventory-article");

    $searchField.change(function(){
        $inventoryUl.empty();

        $keyword = $searchField.val();

        $.ajax({
            method:"GET",
            url: `api/search/article/${$userId}/${$keyword}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {
                $newOption = $("<li></li>");
                $newOption.addClass("list-group-item");
                $newOption.attr("id", `article-${data[index].id}`);
                $newOption.text(data[index].name);
                $newDiv = $("<div></div>");
                $newDiv.addClass("d-flex justify-content-end");
                $newParagraph = $("<p></p>");
                $newParagraph.addClass("text-danger p-2");
                $newParagraph.text(data[index].quantity);
                $newDiv.append($newParagraph);
                $newOption.append($newDiv);
    
                $inventoryUl.append($newOption);
                });
            }
        });
    });


    /* this category for add new article category name */
    let $category = "";
    $i = 0;
    /* populate the category list */
    $categoryUl = $("#inventory-category-list");
    $.ajax({
        method:"GET",
        url: `api/category/${$userId}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {
            $newOption = $("<li></li>");
            $newOption.addClass("list-inline-item");
            $newOption.attr("id", `category-${data[index].id}`);
            $newButton = $("<button></button>");
            $newButton.attr("type","button");
            $newButton.attr("onclick",`showCategory(${data[index].id})`);
            $newButton.addClass("btn btn-primary");
            $oldName = data[index].name;
            $newName = $oldName.charAt(0);
            $newButton.text($newName);
            $newOption.append($newButton);
            $i++

            $categoryUl.append($newOption);
             });
        }
    });

    $("#btn-new-category").click
    /* populate the inventory list */
    $inventoryUl = $("#inventory-article-list");

    $.ajax({
        method:"GET",
        url: `api/article/${$userId}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {
            $newOption = $("<li></li>");
            $newOption.addClass("list-group-item");
            $newOption.attr("id", `article-${data[index].id}`);
            $newOption.text(data[index].name);
            $newDiv = $("<div></div>");
            $newDiv.addClass("d-flex justify-content-end");
            $newParagraph = $("<p></p>");
            $newParagraph.addClass("text-danger p-2");
            $newParagraph.text(data[index].quantity);
            $newDiv.append($newParagraph);
            $newOption.append($newDiv);

            $inventoryUl.append($newOption);
             });
        }
    });



    /* add new category ajax post*/
    $($btnNewCat).click(function(){


        
        /* category input*/
        $catName= $('#new-category-name').val();

        $.ajax({
            url: 'api/category/new',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify( { "userId": $userId, "name": $catName } ),
            processData: false,
            success: function( data, textStatus, jQxhr ){
                $divAlert = $("<div></div>");
                $divAlert.addClass("alert alert-success alert-dismissible fade show");
                $divAlert.attr("role","alert");
                
                $divMessage= $("<p></p>").text("Category was added successfully");
                
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

                $catMessage.append($divAlert);
               
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

                $catMessage.append($divAlert);
                console.log( errorThrown );
            }
        });

            /* this category for add new article category name */
            let $category = "";
            $i = 0;
            /* populate the category list */
            $($categoryUl).empty();
            $categoryUl = $("#inventory-category-list");
            $.ajax({
                method:"GET",
                url: `api/category/${$userId}`,
                cache: false,
                data: { get_param: 'value' }, 
                dataType: 'json',
                success: function (data) { 
                $.each(data, function(index) {
                    $newOption = $("<li></li>");
                    $newOption.addClass("list-inline-item");
                    $newOption.attr("id", `category-${data[index].id}`);
                    $newButton = $("<button></button>");
                    $newButton.attr("type","button");
                    $newButton.attr("onclick",`showCategory(${data[index].id})`);
                    $newButton.addClass("btn btn-primary");
                    $oldName = data[index].name;
                    $newName = $oldName.charAt(0);
                    $newButton.text($newName);
                    $newOption.append($newButton);
                    $i++

                    $categoryUl.append($newOption);
                        });
                }
            });

            console.log("i worked");

    });

    /* get category list ajax get */
    $($btnArticle).click(function(){    

        $($articleList).empty();

        $.ajax({
            method:"GET",
            url: `api/category/${$userId}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {
                $newOption = $("<option></option>").text(`${data[index].name}`);
                $newOption.attr("value",`${data[index].id}`);
                $("#article-category-select").append($newOption);
                 });
            }
        });
    });
    
    /*add new article ajax post */
    $($btnNewArticle).click(function(){
        
        /* article input*/
        $articleName= $('#new-article-name').val();
        $articlePrice= $('#new-article-price').val();
        $articleQuantity= $('#new-article-quantity').val();
        $articleBarcode= $('#new-article-barcode').val();
        $articleCategory= $('#article-category-select').val();

        

        /*get category from api by ID */
        $.ajax({
            method:"GET",
            url: `api/category/${$userId}/${$articleCategory}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: onSuccess,
        });

        function onSuccess(jsonReturn){
            for (var i=0; i<jsonReturn.length; i++) {
                $category = jsonReturn[i].name;

            }
        }
        
        setTimeout(function(){
            $.ajax({
                url: 'api/article/new',
                dataType: 'json',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify( { 
                    "userId": $userId, 
                    "name": $articleName ,
                    "price" : $articlePrice,
                    "quantity" : $articleQuantity,
                    "barcode" : $articleBarcode,
                    "category" : $category
    
                } ),
                processData: false,
                success: function( data, textStatus, jQxhr ){
                    $divAlert = $("<div></div>");
                    $divAlert.addClass("alert alert-success alert-dismissible fade show");
                    $divAlert.attr("role","alert");
                    
                    $divMessage= $("<p></p>").text("Article was added successfully");
                    
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
    
                    $articleMessage.append($divAlert);
                   
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
    
                    $articleMessage.append($divAlert);
                    console.log( errorThrown );
                }
            });
         }, 300);
        

    });

    /*edit article get */
    $($btnEditArticle).click(function(){
        
        $("#article-edit-item-select").empty();
        $("#article-edit-category-select").empty();

        $.ajax({
            method:"GET",
            url: `api/article/${$userId}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {
                $newOption = $("<option></option>").text(`${data[index].name}`);
                $newOption.attr("value",`${data[index].id}`);
                $("#article-edit-item-select").append($newOption);
                 });
            }
        });

        

        $.ajax({
            method:"GET",
            url: `api/category/${$userId}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {
                $newOption = $("<option></option>").text(`${data[index].name}`);
                $newOption.attr("value",`${data[index].id}`);
                $("#article-edit-category-select").append($newOption);
                 });
            }
        });
    });

    /*onchange select for edit menu */
    $("#article-edit-item-select").change(function(){
        
        $("#article-edit-category-select").empty();


        $selectedArticle = $("#article-edit-item-select").val();
        
        $.ajax({
            method:"GET",
            url: `api/article/${$userId}/${$selectedArticle}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {

                    $("#edit-article-id").val(data[index].id);
                    $($editInputName).val(data[index].name);
                    $($editInputPrice).val(data[index].price);
                    $($editInputBarcode).val(data[index].barcode);
                    $($editInputQuantity).val(data[index].quantity);
                   
                 });
            }
        });

        $.ajax({
            method:"GET",
            url: `api/category/${$userId}`,
            cache: false,
            data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
            $.each(data, function(index) {
                $newOption = $("<option></option>").text(`${data[index].name}`);
                $newOption.attr("value",`${data[index].id}`);
                $("#article-edit-category-select").append($newOption);
                 });
            }
        });


    });

    /* submit changes for edit article*/
    $($btnEditArticleSubmit).click(function(){
        /* article input*/
        $articleId = $("#edit-article-id").val();
        $articleName= $($editInputName).val();
        $articlePrice= $($editInputPrice).val();
        $articleQuantity= $($editInputQuantity).val();
        $articleBarcode= $($editInputBarcode).val();
        $articleCategory= $($editInputCategory).val();
        
        setTimeout(function(){
            $.ajax({
                url: 'api/article/update',
                dataType: 'json',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify( { 
                    "userId": $userId, 
                    "articleId": $articleId,
                    "name": $articleName ,
                    "price" : $articlePrice,
                    "quantity" : $articleQuantity,
                    "barcode" : $articleBarcode,
                    "category" : $articleCategory

                } ),
                processData: false,
                success: function( data, textStatus, jQxhr ){
                    $divAlert = $("<div></div>");
                    $divAlert.addClass("alert alert-success alert-dismissible fade show");
                    $divAlert.attr("role","alert");
                    
                    $divMessage= $("<p></p>").text("Article was editted successfully!");
                    
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

                    $editArticleMessage.append($divAlert);
                    
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

                    $editArticleMessage.append($divAlert);
                    console.log( errorThrown );
                }
            });
            }, 300);
    });

    
});

function showCategory(id){

    $inventoryUl.empty();

    $.ajax({
        method:"GET",
        url: `api/catarticle/${$userId}/${id}`,
        cache: false,
        data: { get_param: 'value' }, 
        dataType: 'json',
        success: function (data) { 
        $.each(data, function(index) {
            $newOption = $("<li></li>");
            $newOption.addClass("list-group-item");
            $newOption.attr("id", `article-${data[index].id}`);
            $newOption.text(data[index].name);
            $newDiv = $("<div></div>");
            $newDiv.addClass("d-flex justify-content-end");
            $newParagraph = $("<p></p>");
            $newParagraph.addClass("text-danger p-2");
            $newParagraph.text(data[index].quantity);
            $newDiv.append($newParagraph);
            $newOption.append($newDiv);

            $inventoryUl.append($newOption);
            });
        }
    });

}



