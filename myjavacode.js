$(document).ready(function () {
    $("#login").click(function () {
        $("#loginform").slideDown();
        $(this).fadeOut();
    });
});

// this is normal java for password visibility
function myPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}