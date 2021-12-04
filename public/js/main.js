
function productSort(ev) {
    ev.closest('form').submit();
}

function changeQuantity() {
    this.closest('form').submit();
}

function search(){
    this.closest('form').submit();
}

function previewImage() {
    const [file] = event.target.files;
    if (file) {
        let productImg = document.querySelector('#product-image');
        productImg.src = URL.createObjectURL(file);
    }
}