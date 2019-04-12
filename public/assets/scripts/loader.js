/**
 * Loader
 */

const $loader = document.querySelector('.loader')
const $submitBtn = document.querySelector('.search-btn')

$submitBtn.addEventListener('click', () => {
    $loader.style.display = "flex"
})