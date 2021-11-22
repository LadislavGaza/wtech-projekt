window.addEventListener('load', function() {
    const buy = document.getElementById('add-to-cart');

    if (buy !== null){
        buy.addEventListener('click', function() {
            const notif = document.getElementById('cart-notification');
            
            this.innerHTML = '<img class="icon" id="cart-add-icon" src="icons/check.svg">Pridané do košíka';
            this.style.color = 'white';
            this.style.backgroundColor = 'green';
            
            notif.style.display = 'grid';
        }); 
    }
    
    const filter = document.getElementById('product-filter');
    filter.addEventListener('change', function() {
       this.closest('form').submit(); 
    });
})