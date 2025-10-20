const page = document.querySelector('.container');
const nbSection = page.dataset.nb;

for (let j = 1; j <= nbSection; j++) {

    const div = document.querySelector('.section' + j);
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