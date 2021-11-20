window.addEventListener('load', function() {
    const buy = document.getElementById('add-to-cart');

    buy.addEventListener('click', function() {
        const notif = document.getElementById('cart-notification');
        
        this.innerHTML = '<img class="icon" id="cart-add-icon" src="icons/check.svg">Pridané do košíka';
        this.style.color = 'white';
        this.style.backgroundColor = 'green';
        
        notif.style.display = 'grid';
    }); 
    
    const outpost = document.querySelector('.outpost-chooser');
    console.log(outpost);
    /*
    for (var i = 0; i < outpost.length; i++) {
        outpost[i].addEventListener('change', function() {
            console.log(this);
            console.log(this.checked);
            console.log(this.id);
            // const name = document.getElementById(this.id);
            // name.textContent = 'Zvolené';
            console.log(outpost);
        });
    }*/
})