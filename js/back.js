// Aria Kumar(ak8fk)

function start() {

    $(".heart.fa").click(function() {
        $(this).toggleClass("fa-heart fa-heart-o");
      });
      
    // alert('hello');

    // var allImages = document.getElementsByTagName("img");
    // for (var i = 0; i < allImages.length; i++) {
    //     var img = allImages[i];
    //     img.onclick = function () {

    //         var name = this.parentNode.childNodes[6].innerHTML;
    //         window.location.href = name + ".html";
    //     };
    // }
    // var allStars = document.getElementsByClassName("fa-star");
    // for (var i = 0; i < allStars.length; i++) {
    //     var star = allStars[i];
    //     star.onclick = function () {

    //         if (this.getAttribute("class") == "far fa-star") {
    //             alert('hello');
    //             this.setAttribute("class", "fas fa-star");
    //             this.setAttribute("type", "checkbox");
    //             this.setAttribute("class", "checked");

    //         }
    //         else {
    //             alert('no');

    //             this.setAttribute("class", "far fa-star");
    //             this.setAttribute("type", "not_checkbox");
    //             this.setAttribute("class", "not_checked");
    //         }
    //     };

    // }
}


start();