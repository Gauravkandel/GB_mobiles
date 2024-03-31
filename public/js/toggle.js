function toggledash() {
    var tog1 = document.getElementById('tog1');
    var tog2 = document.getElementById('tog2');
    var sidebar = document.getElementById('sidebar');
    var container = document.getElementById('container');
    container.classList.replace('main_container', 'containers');
    tog1.style.display = 'none';
    tog2.style.display = "flex";
    tog2.style.marginRight = "-28%";
    sidebar.style.width = '70px';
    var none = document.getElementsByClassName("respon_dash");
    for (var i = 0; i < none.length; i++) {
        none[i].style.display = "none";
        none[i].style.opacity = "0";
    }
}
function toggledash2() {
    var tog1 = document.getElementById('tog1');
    var tog2 = document.getElementById('tog2');
    var sidebar = document.getElementById('sidebar');
    var none = document.querySelector('.respon_dash');
    var container = document.getElementById('container');
    container.classList.replace('containers', 'main_container');
    tog1.style.display = 'flex';
    tog2.style.display = "none";
    sidebar.style.width = '270px';
    none.style.display = 'block';
    none.style.display = 'flex';
    var none = document.getElementsByClassName("respon_dash");
    for (var i = 0; i < none.length; i++) {
        none[i].style.display = "block";
        none[i].style.opacity = "1";
    }
}
