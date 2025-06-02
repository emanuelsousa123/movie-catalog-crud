function abrir_popup(x) {
    document.getElementById("dark-background").style.display = 'flex';
    document.getElementById(x).style.display = 'flex';
}

function fechar_popup(x) {
    document.getElementById("dark-background").style.display = 'none';
    document.getElementById(x).style.display = 'none';
}

function abrir_fechar(x,y) {
    document.getElementById(x).style.display = 'flex';
    document.getElementById(y).style.display = 'none';
}