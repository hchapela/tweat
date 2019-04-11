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