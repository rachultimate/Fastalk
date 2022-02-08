function updateUserStatus() {
    jQuery.ajax({
        url: 'statusupdater.php',
        sucess:function() {

        }
    })
}

setInterval(function() {
    updateUserStatus();
},1000);