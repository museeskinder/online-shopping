const mainImage = document.getElementById('main-img');
const smallImage = document.getElementsByClassName('small-img');

for(let i = 0; i < 4; i++) {
    smallImage[i].addEventListener('click', () => {
        mainImage.src = smallImage[i].src;
    })
}