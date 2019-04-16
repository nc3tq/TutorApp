// Aria Kumar(ak8fk)

function start() {
    var allImages = document.getElementsByTagName("img");
    for(var i = 0; i < allImages.length; i++) {
        var img = allImages[i];
        img.onclick = function() {
            var name = this.parentNode.childNodes[6].innerHTML;
            window.location.href = name + ".html";
        };
    }
    var allStars = document.getElementsByClassName("fa-star");
    for(var i = 0; i < allStars.length; i++) {
        var star = allStars[i];
        star.onclick = function() {
            if(this.getAttribute("class") == "far fa-star") {

                // $newfav = 'INSERT INTO Students (tutor_name) VALUES ("'.$row['iduser'].'","'.$_GET['IDp'].'");';    //IDp = ID product obtained from URL

                this.setAttribute("class", "fas fa-star");
            }
            else
               this.setAttribute("class", "far fa-star");
        };
        
    }
}
        

start();