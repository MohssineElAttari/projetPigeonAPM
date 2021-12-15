const box = document.querySelector('.box');
const type = document.querySelectorAll('.type')
for (const child of box.children) {
    child.addEventListener('click', function (e) {
        console.log(e.target.textContent);
        document.getElementById('type_reg').value = e.target.textContent;
        document.querySelector('.model').classList.add('hidden');
        replaceType(e.target.textContent);
    })
}

function replaceType(value) {
    type.forEach(element => element.textContent = value)
}

const step1 = document.querySelector('.step-1')
const step2 = document.querySelector('.step-2')
const fini = document.querySelector('.fini');
const retour = document.querySelector('.retour');
const suivi = document.querySelector('.suivi')
suivi.addEventListener('click', function (e) {
    if (!logo.value ||
        !nom.value ||
        !abreviation.value ||
        !(document.getElementById('nom-res').value) ||
        !(document.getElementById('prenom_res').value)
    ) {
        return alert('remplir les donnees')
    }
    step1.classList.add('hidden')
    step2.classList.remove('hidden')
})
retour.addEventListener('click', function () {
    step1.classList.remove('hidden')
    step2.classList.add('hidden')
})
