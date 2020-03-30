// window.addEventListener('load', () => {
    let links = document.querySelectorAll('#fh5co-primary-menu li a');

    let url = window.location.href.split("/");

    switch (url[url.length - 1]) {
        case "about":
            links[1].className = "active";
            break;
        case "service":
            links[2].className = "active";
            break;
        case "blog":
            links[3].className = "active";
            break;
        case "contact":
            links[4].className = "active";
            break;
        default:
            links[0].className = "active";
    }
// })