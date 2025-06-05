function change_src(event) {
        document.getElementById('preview').src = event.target.result;
        document.getElementById('preview').style.display = 'block';
    }

function showPreview() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = change_src;
        reader.readAsDataURL(file);
    } else {
        document.getElementById('preview').style.display = 'none';
        document.getElementById('preview').src = '#';
    }
}

document.getElementById('image_film').addEventListener('change', showPreview);