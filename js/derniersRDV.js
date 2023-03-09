const rowDeletes = document.querySelectorAll(".delete");
rowDeletes.forEach(function(rowDelete) {
    rowDelete.addEventListener('click', function (event) {
        event.preventDefault();
        document.querySelector('.form').action = "inc/rowDelete.php"
        
        let rowTarget = rowDelete.parentNode.parentNode;
        rowTarget.querySelector(".confirm").value = rowTarget.querySelector(".godelete").innerHTML;

        rowTarget.querySelector(".modify").style.display="none";
        rowTarget.querySelector(".delete").style.display="none";
        
// Fonction permettant de créer le bouton "confirmer"
        const buttonConfirm = document.createElement("button");
        buttonConfirm.innerText = "Confirmer";
        buttonConfirm.type = 'submit';
        buttonConfirm.name = 'buttonConfirm';
        buttonConfirm.classList.add('buttonConfirm');
        rowTarget.querySelector('.buttons').appendChild(buttonConfirm);


// Fonction permettant de créer le bouton "annuler"
        const buttonCancel = document.createElement("button");
        buttonCancel.innerText = "Annuler";
        buttonCancel.classList.add('buttonCancel');
        rowTarget.querySelector('.buttons').appendChild(buttonCancel);
        buttonCancel.addEventListener('click', function (event) {
            event.preventDefault();
            buttonConfirm.remove();
            buttonCancel.remove();
            rowTarget.querySelector(".modify").style.display="";
            rowTarget.querySelector(".delete").style.display="";
        })
    })
})


const modify = document.querySelectorAll(".modify");
modify.forEach(function(modif) {
    modif.addEventListener('click', function (event) {
        event.preventDefault();
        let rowTarget = modif.parentNode.parentNode;
        rowTarget.action = "inc/rowModify.php"
        console.log(rowTarget)
        rowTarget.querySelector(".confirm").value = rowTarget.querySelector(".godelete").innerHTML;
        console.log(rowTarget.querySelector(".confirm"))
        
        //Hide rowTarget cells
        rowTarget.querySelector(".start").style.display = 'none'
        rowTarget.querySelector(".end").style.display = 'none'
        /* rowTarget.querySelector(".name").style.display = 'none' */
        rowTarget.querySelector(".address").style.display = 'none'
        rowTarget.querySelector(".commentary").style.display = 'none'


        //Create inputs for modification
        const startInput = document.createElement('input')
        startInput.classList.add('startTd')
        startInput.name = "start"
        startInput.placeholder = "Début"
        startInput.value = rowTarget.querySelector('.start').innerHTML
        startInput.type="datetime-local"
        rowTarget.querySelector(".dates").appendChild(startInput)

        const endInput = document.createElement('input')
        endInput.classList.add('endTd')
        endInput.name = "end"
        endInput.placeholder = "Fin"
        endInput.value = rowTarget.querySelector('.end').innerHTML
        endInput.type="datetime-local"
        rowTarget.querySelector(".dates").appendChild(endInput)
        
        /* const nameTd = document.createElement('td')
        nameTd.classList.add('nameTd')
        rowTarget.insertBefore(nameTd, rowTarget.querySelector(".name"))
        const nameInput = document.createElement('input')
        nameInput.name = "name"
        nameInput.placeholder = 'Nom'
        nameInput.value = rowTarget.querySelector('.name').innerHTML
        rowTarget.querySelector(".nameTd").appendChild(nameInput) */

        const addressTd = document.createElement('td')
        addressTd.classList.add('addressTd')
        rowTarget.insertBefore(addressTd, rowTarget.querySelector(".address"))
        const addressInput = document.createElement('input')
        addressInput.name = "address"
        addressInput.placeholder = 'Adresse'
        addressInput.value = rowTarget.querySelector('.address').innerHTML
        rowTarget.querySelector(".addressTd").appendChild(addressInput)

        const commentaryTd = document.createElement('td')
        commentaryTd.classList.add('commentaryTd')
        rowTarget.insertBefore(commentaryTd, rowTarget.querySelector(".commentary"))
        const commentaryInput = document.createElement('input')
        commentaryInput.name = "commentary"
        commentaryInput.placeholder = 'Commentaire'
        commentaryInput.value = rowTarget.querySelector('.commentary').innerHTML
        rowTarget.querySelector(".commentaryTd").appendChild(commentaryInput)

        const formModif = modif.parentNode

        rowTarget.querySelector(".modify").style.display="none";
        rowTarget.querySelector(".delete").style.display="none";

        // Fonction permettant de créer le bouton "confirmer"
        const buttonConfirm = document.createElement("button");
        buttonConfirm.innerText = "Confirmer";
        buttonConfirm.type = 'submit';
        buttonConfirm.name = 'buttonConfirm';
        buttonConfirm.classList.add('buttonConfirm');
        formModif.appendChild(buttonConfirm);


        // Fonction permettant de créer le bouton "annuler"
        const buttonCancel = document.createElement("button");
        buttonCancel.innerText = "Annuler";
        buttonCancel.classList.add('buttonCancel');
        formModif.appendChild(buttonCancel);
        buttonCancel.addEventListener('click', function (event) {
            event.preventDefault();
            buttonConfirm.remove();
            buttonCancel.remove();

            //Show rowTarget cells
            rowTarget.querySelector(".start").style.display = ''
            rowTarget.querySelector(".end").style.display = ''
            rowTarget.querySelector(".name").style.display = ''
            rowTarget.querySelector(".address").style.display = ''
            rowTarget.querySelector(".commentary").style.display = ''

            rowTarget.querySelector(".modify").style.display="";
            rowTarget.querySelector(".delete").style.display="";

            startInput.remove();
            endInput.remove();
            nameTd.remove();
            addressTd.remove();
            commentaryTd.remove();
        })
    })
})


const addClient = document.querySelector(".selectClientTd");
const addClientPos = addClient.getBoundingClientRect();
addClient.addEventListener('change', function () {
    if(addClient.value == 'addClient') {
        addClient.value = '0';

        // Fonction permettant de créer le bouton "confirmer"
        const addClientForm = document.createElement("form");
        
        addClientForm.classList.add("addClientForm");
        addClient.parentElement.appendChild(addClientForm);
        addClientForm.action = 'inc/clientAdd.php';
        addClientForm.method = 'POST';
        addClientForm.style.position = 'fixed';
        addClientForm.style.height = '100px';
        addClientForm.style.width = '1000px';
        addClientForm.style.top = '350px';
        addClientForm.style.left = '350px';
        addClientForm.style.zIndex = '1';
        addClientForm.style.backgroundColor = 'white';
        addClientForm.style.border = '1px solid black';

        const title = document.createElement("h2");
        title.innerHTML = 'Ajouter un client';

        const lastName = document.createElement("input");
        lastName.name = 'addLastName'
        const firstName = document.createElement("input");
        firstName.name = 'addFirstName'
        const address = document.createElement("input");
        address.name = 'addAddress'
        const email = document.createElement("input");
        email.name = 'addEmail'
        const phone = document.createElement("input");
        phone.name = 'addPhone'

        const confirm = document.createElement("button");
        confirm.innerHTML = 'Ajouter';
        confirm.type = 'submit';
        confirm.classList.add('confirm');

        const cancel = document.createElement("button");
        cancel.innerHTML = 'Annuler'
        cancel.addEventListener('click', function (event) {
            event.preventDefault();
            addClientForm.remove();
        })
        
        lastName.placeholder = 'Nom';
        firstName.placeholder = 'Prénom';
        address.placeholder = 'Adresse';
        email.placeholder = 'email';
        phone.placeholder = 'phone';

        

        document.querySelector('.addClientForm').append(title,lastName, firstName, address, email, phone,confirm,cancel);
        

    }
})
