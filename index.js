




/* script etoile */


document.getElementsByClassName('start').addEventListener('click', function() {
    var etoile = document.getElementsByClassName('start');
    if (etoile.style.display.filter === 50%) {
        etoile.style.display.filter = 0%;
        
    } else {
        etoile.style.display.filter = 50%;
    }
});


