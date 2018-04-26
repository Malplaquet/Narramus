var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var acte = this.nextElementSibling;
        if (acte.className === "acte") {
            acte.className = "acte appeared";
        } else {
            acte.className = "acte";
        }
    });
}
