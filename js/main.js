window.addEventListener('load', function() {
    const buy = document.getElementById('add-to-cart');

    buy.addEventListener('click', function() {
        const icon = document.getElementById('cart-add-icon');
        const notif = document.getElementById('cart-notification');
        
        this.innerHTML = '<img class="icon" id="cart-add-icon" src="icons/check.svg">Pridané do košíka';
        this.style.color = 'white';
        this.style.backgroundColor = 'green';
        notif.style.display = 'grid';
    });    
})