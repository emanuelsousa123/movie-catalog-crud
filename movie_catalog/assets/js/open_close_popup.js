function open_popup(type) {
    document.getElementById("dark-background").style.display = 'flex';
    document.getElementById(type).style.display = 'flex';
}

function close_popup(type) {
    document.getElementById("dark-background").style.display = 'none';
    document.getElementById(type).style.display = 'none';
}

function open_close(type1,type2) {
    document.getElementById(type1).style.display = 'flex';
    document.getElementById(type2).style.display = 'none';
}