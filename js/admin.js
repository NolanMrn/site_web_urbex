function initSection(div) {
    const btnOrientation = div.querySelectorAll('.btn-orientation');
    const inputOrdre = div.querySelector('.ordre');
    const btnRetour = div.querySelector('.btn-retour');
    let ordre = [];

    btnOrientation.forEach(btn => {
        btn.addEventListener('click', () => {
            const typeOrientation = btn.dataset.orientation;
            ordre.push(typeOrientation);
            let res = '';
            for (let i = 0 ; i < ordre.length ; i++) {
                res += (i + 1) + '.' + ordre[i];
                if (i < ordre.length - 1) {
                    res += ' / ';
                }
            }
            inputOrdre.value = res;
        });
    });

    btnRetour.addEventListener('click', () => {
        ordre.pop();
        let res = '';
        for (let i = 0 ; i < ordre.length ; i++) {
            res += (i + 1) + '.' + ordre[i];
            if (i < ordre.length - 1) {
                res += ' / ';
            }
        }
        inputOrdre.value = res;
    });
}


const page = document.querySelector('.container');
let nbSection = parseInt(page.dataset.nbsections);
const nbSectionsInput = document.getElementById('nbSections');

const btnAjouterSection = document.querySelector('.btn-ajouter_section');

btnAjouterSection.addEventListener('click', () => {
    nbSection++;
    page.dataset.nbsections = nbSection;
    nbSectionsInput.value = nbSection;
    const nouvelleSection = document.createElement('div');
    nouvelleSection.classList.add('section', 'section' + nbSection);
    nouvelleSection.innerHTML = `
        <div class="form-group">
            <label for="paragraphe${nbSection}">Paragraphe n°${nbSection} :</label>
            <textarea id="paragraphe${nbSection}" name="paragraphe${nbSection}" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label>Images :</label>
            <div class="choix-orientation">
                <button type="button" class="btn-orientation" data-orientation="vertical">Vertical</button>
                <button type="button" class="btn-orientation" data-orientation="horizontal">Horizontal</button>
                <button type="button" class="btn-retour">Annuler la dernière image</button>
            </div>
        </div>
        <div class="form-group">
            <label for="ordre${nbSection}">Ordre :</label>
            <textarea id="ordre${nbSection}" name="ordre${nbSection}" class="ordre" rows="2" readonly></textarea>
        </div>
    `;
    const form = page.querySelector('form');
    form.insertBefore(nouvelleSection, btnAjouterSection.closest('.form-group'));
    initSection(nouvelleSection);
});


const btnSupprimerSection = document.querySelector('.btn-supprimer_section');

btnSupprimerSection.addEventListener('click', () => {
    if (nbSection > 0) {
        
        const derniereSection = document.querySelector('.section' + nbSection);
        if (derniereSection) {
            derniereSection.remove();
        }
    nbSection--;
    page.dataset.nbsections = nbSection;
    nbSectionsInput.value = nbSection;
    }
});


const selectCategorie = document.getElementById('categorie');
const nouvelleCategorieContainer = document.getElementById('nouvelle_categorie_container');

selectCategorie.addEventListener('change', function() {
    if (this.value === 'autre') {
        nouvelleCategorieContainer.style.display = 'contents';
        document.getElementById('nouvelle_categorie').required = true;
    } else {
        nouvelleCategorieContainer.style.display = 'none';
        document.getElementById('nouvelle_categorie').required = false;
        document.getElementById('nouvelle_categorie').value = "";
    }
});
const selectPays = document.getElementById('pays');
const nouveauPaysContainer = document.getElementById('nouveau_pays_container');

selectPays.addEventListener('change', function() {
    if (this.value === 'autre') {
        nouveauPaysContainer.style.display = 'contents';
        document.getElementById('nouveau_pays').required = true;
    } else {
        nouveauPaysContainer.style.display = 'none';
        document.getElementById('nouveau_pays').required = false;
        document.getElementById('nouveau_pays').value = "";
    }
});


function validerFormulaire() {
    const dateExplo = document.getElementById('date_explo').value;
    if (!/^\d{4}-\d{2}$/.test(dateExplo)) {
        alert("Date invalide, utilisez AAAA/MM");
        return false;
    }
    const mois = parseInt(dateExplo.slice(5, 7), 10);
    console.log(mois);
    if (mois < 1 || mois > 12) {
        alert("Mois invalide, utilisez les chiffres de 01 à 12");
        return false;
    }
    const numBanniere = parseInt(document.getElementById('num_banniere').value);
    if (numBanniere <= 0) {
        alert("Numéro de bannière invalide, utilisé un numéro positif")
        return false;
    }
    return true;
}



const nbPhotosInput = document.getElementById('nbPhotos');
let nbPhotos = parseInt(nbPhotosInput.value, 10)
const btnAjouterPhoto = document.querySelectorAll('.btn-orientation');
console.log(nbPhotosInput.value);

btnAjouterPhoto.forEach(btn => {
    btn.addEventListener('click', () => {
        nbPhotos++;
        nbPhotosInput.value = nbPhotos;
    })
});