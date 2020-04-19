var i = 0;
var images = [];

images[0] = "../images/1.jpg";
images[1] = "../images/2.jpg";
images[2] = "../images/3.jpg";

function next () {

    if (i < images.length - 1) {
        i++;
    }
    else {
        i = 0;
    }
    
    document.slide.src = images[i];
}

function previous () {
    if (i > 0)
        i--;

    else {
        i = images.length - 1;
    }
    document.slide.src = images[i];
}

document.slide.src = images[0];
