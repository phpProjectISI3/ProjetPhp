document.querySelector('#Search').addEventListener('click', function () {
    let elem = document.getElementById('SearchZone');
    
    if (elem.classList.contains('SearchZoneStyle')) {
        elem.classList.remove("SearchZoneStyle");
        document.getElementsByClassName('alternate')[0].style.visibility = 'hidden';
        document.getElementsByClassName('alternate')[1].style.visibility = 'hidden';
        document.getElementsByClassName('alternate')[2].style.visibility = 'hidden';
        // console.log("Removed");
    } else {
        elem.classList.add("SearchZoneStyle");
        // console.log("Added");
        document.getElementsByClassName('alternate')[0].style.visibility = 'visible';
        document.getElementsByClassName('alternate')[1].style.visibility = 'visible';
        document.getElementsByClassName('alternate')[2].style.visibility = 'visible';
    }
});