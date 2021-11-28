window.addEventListener('load', function() {
    //const buy = document.getElementById('add-to-cart');

    /*if (buy !== null){
        buy.addEventListener('click', function() {
            const notif = document.getElementById('cart-notification');
            
            this.innerHTML = '<img class="icon" id="cart-add-icon" src="/icons/check.svg">Pridané do košíka';
            this.style.color = 'white';
            this.style.backgroundColor = 'green';
            
            notif.style.display = 'grid';
        }); 
    }*/
    
    const sort = document.getElementById('product-sort');

    if (sort !== null){
        sort.addEventListener('change', function() {
        this.closest('form').submit(); 
        });
    }
});

function changeQuantity(){
    this.closest('form').submit();
}