$(document).ready(function() {
    var menu = $('.mainmenu');
    function scroll() {
        if ($(window).scrollTop() >= 1) {
            $('.mainmenu').addClass('sticky');
            $('.content').addClass('menu-padding');
        } else {
            $('.mainmenu').removeClass('sticky');
            $('.content').removeClass('menu-padding');
        }
    }
    document.onscroll = scroll;
});
var price = document.getElementById("price").innerHTML;
var quantity = document.getElementById("quantity").value;
var total = document.getElementById("total").innerHTML;
document.getElementById('total').innerHTML = quantity * price;