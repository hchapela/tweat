/**
 * Responsive
 */

const $inputSubmit = document.querySelector('.search-btn')

if (window.innerWidth < 800) {
    $inputSubmit.value = "Find your meal"
}

window.addEventListener('resize', () => {
    if (window.innerWidth <= 800) {
        $inputSubmit.value = "Find your meal"
    } else {
        $inputSubmit.value = ""
    }
})

/**
 * Loader
 */

const $loader = document.querySelector('.loader')
const $submitBtn = document.querySelector('.search-btn')

$submitBtn.addEventListener('click', () => {
    $loader.style.display = "flex"
    document.body.style.overflow = "hidden"
})