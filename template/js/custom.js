/** 
 * Created by janek.mander on 14.03.2017. 
 */ 
var admin_url = "http://ubuntu.ametikool.ee/~janek/TAK15/materjalid/php/katused/public/admin/"; 

$(".delete-confirm").click(function () { 
    var title = "Are you sure?*"; 
    var text = "You will not be able to recover this imaginary file!*"; 
    var confirmButtonText = "Yes, delete it!*"; 

    var heading_1 = "Deleted*"; 
    var confirm_text = "Your imaginary file has been deleted.*"; 

    var ID = $(this).data("delete-id"); 
    var url = $(this).data("url"); 

    var closestTr = $(this).closest("tr"); 

    swal({ 
        title: title, 
        text: text, 
        type: "warning", 
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55", 
        confirmButtonText: confirmButtonText, 
        closeOnConfirm: false 
    }, 
    function(){ 
        $.ajax({ 
            method: "POST", 
            url: admin_url + url + ".php?ID=" + ID 
        }) 
        .done(function( data ) { 
            if(data == '') { 
                closestTr.remove(); 
                swal(heading_1, confirm_text, "success"); 
            } else { 
                swal("ERROR", data, "error"); 
            } 

        }); 
    }); 
});