// Get the modal

function modal() {


        var mod = document.getElementById('myModal');

// Get the button that opens the modal
        var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
        mod.style.display = "block";


        if (window.getComputedStyle(mod, null).getPropertyValue("display") === 'none') {
            mod.style.display = 'block';
        } else {
            mod.style.display = 'none';
        }



// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

}
