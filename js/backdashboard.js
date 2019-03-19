function start() {
    var allImages = document.getElementsByTagName("img");
    for(var i = 0; i < allImages.length; i++) {
        var img = allImages[i];
        img.onclick = function() {
            var name = this.parentNode.childNodes[6].innerHTML;
            window.location.href = name + ".html";
        };
    }
 
        
    
}
        

start();