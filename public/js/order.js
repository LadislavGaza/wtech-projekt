function toPayment() {
    document.querySelector('#order-transport').checked = false;
    document.querySelector('#order-payment').checked = true;
    document.querySelector('#order-address').checked = false;
}

function toAddress() {
    document.querySelector('#order-transport').checked = false;
    document.querySelector('#order-payment').checked = false;
    document.querySelector('#order-address').checked = true;
}

function companyInfo(state) {
    if (state) {
        document.querySelector('#order-company-detail').style.display = 'grid';
    } else {
        document.querySelector('#order-company-detail').style.display = 'none';   
    }
}

function outpostChosen() {
    var buttons = document.getElementsByName('selection');
    const place = document.querySelector('#' + this.id + '-place');
    document.querySelector('#outpost-active').textContent = place.textContent;
    
    for (var i = 0; i < buttons.length; i++) {
        let label = document.querySelector('#' + buttons[i].id + '-label');
        if (buttons[i].checked === true)
            label.textContent = 'Vybrané';
        else 
            label.textContent = 'Zvoliť';
    }
}

function outpostSearch(search) {
    let url = '/places';

    if (search !== undefined) {
        let params = new URLSearchParams({
            'search': search.value
        }).toString();
        url = '/places?' + params;
    }   

    fetch(url)
    .then(response => response.json())
    .then(function(data) {
        const places = document.querySelector('#outpost');
        let placesTable = document.querySelector("#outpost > table:first-of-type");
        let checkedRadio;
        let foundOption = false;

        if (placesTable !== null) {
            const buttons = document.getElementsByName('selection');
            for (var i = 0; i < buttons.length; i++) {
                if (buttons[i].checked === true)
                    checkedRadio = buttons[i].id;
            }
            document.querySelector('#outpost-active').textContent = '-';
            placesTable.remove();
        }
        let tablePlaces = document.createElement('table');
        places.appendChild(tablePlaces);

        for (const p of data) {
            let outpost = tablePlaces.insertRow(-1);

            let placeName = outpost.insertCell(-1);
            placeName.id = `selection-${p.id}-place`;
            placeName.textContent = p.name;

            let placeChooser = outpost.insertCell(-1);
            placeChooser.classList.add('table-data-chooser');
            let placeChooserContainer = document.createElement('div');
            placeChooserContainer.classList.add('outpost-chooser');

            let placeChooserRadio = document.createElement('input');
            placeChooserRadio.type = 'radio';
            placeChooserRadio.id = `selection-${p.id}`;            
            placeChooserRadio.name = `selection`;
            placeChooserRadio.value = p.id;

            if (placeChooserRadio.id === checkedRadio) {
                placeChooserRadio.checked = true;
                document.querySelector('#outpost-active').textContent = p.name;
                foundOption = true;
            }
            placeChooserRadio.addEventListener('change', outpostChosen);
            placeChooserContainer.appendChild(placeChooserRadio);

            let placeChooserLabel = document.createElement('label');
            placeChooserLabel.id = `selection-${p.id}-label`;
            placeChooserLabel.for = `selection-${p.id}`;
            if (placeChooserRadio.id === checkedRadio)
                placeChooserLabel.textContent = 'Vybrané';
            else
                placeChooserLabel.textContent = 'Zvoliť';
            placeChooserContainer.appendChild(placeChooserLabel);

            placeChooser.appendChild(placeChooserContainer);            
        }

        // Preselect first radio
        if (data.length > 0 && foundOption === false) {
            const place = document.querySelector(`#selection-${data[0].id}-place`);
            document.querySelector('#outpost-active').textContent = place.textContent;
            document.querySelector(`#selection-${data[0].id}-label`).textContent = 'Vybrané';
            document.querySelector(`#selection-${data[0].id}`).checked = true;
        }
    });
}

window.addEventListener('load', function (event) {
    outpostSearch();
})