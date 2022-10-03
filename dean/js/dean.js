

function display_dep() {
    var faculty = document.getElementById('faculty').value;
    var dep = document.getElementsByClassName('dep');

    if (faculty === "Science and Technology") {
        dep[0].style.display = "inline";
        dep[1].style.display = "none";
        dep[2].style.display = "none";
    }
    if (faculty === "Business") {
        dep[0].style.display = "none";
        dep[2].style.display = "none";
        dep[1].style.display = "inline";
    }
    if (faculty === "Engineering") {
        dep[0].style.display = "none";
        dep[1].style.display = "none";
        dep[2].style.display = "inline";
    }
    if (faculty === "") {
        dep[0].style.display = "none";
        dep[1].style.display = "none";
        dep[2].style.display = "none";
    }
    
}
