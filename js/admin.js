const btnOrientation = document.querySelectorAll('.btn-orientation');
const inputOrdre = document.getElementById('ordre');
const btnRetour = document.getElementById('btn-retour');
let ordre = [];

btnOrientation.forEach(btn => {
    btn.addEventListener('click', () => {
        const typeOrientation = btn.dataset.orientation;
        ordre.push(typeOrientation);
        inputOrdre.value = ordre.join(' / ');
    });
});

btnRetour.addEventListener('click', () => {
    ordre.pop();
    inputOrdre.value = ordre.join(' / ');
});