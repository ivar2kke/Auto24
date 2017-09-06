/** 
 * Created by janek.mander on 28.03.2017. 
 */ 
$("#search-btn").click(function () { 
    var search = $("#search-field").val(); 
    searchProduct(search); 
}); 

$("#search-field").keyup(function () { 
    var search = $("#search-field").val(); 

    if(search.length > 2 && search.length < 255) { 
        searchProduct(search); 
    } else if(search.length == 0) { 
        searchProduct(""); 
    } 
}); 

searchProduct(""); 

function searchProduct(s) { 
    $.ajax({ 
        method: "POST", 
        data: {s: s}, 
        url: admin_url + "pages/product/search.php" 
    }) 
    .done(function( data ) { 
        $("#product-content").html(data); 
    }); 
} 