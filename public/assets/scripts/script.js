const $inputSubmit = document.querySelector('.search-btn')

if (window.innerWidth < 600) {
    $inputSubmit.value = "Find your meal"
}

window.addEventListener('resize', () => {
    if (window.innerWidth <= 600) {
        $inputSubmit.value = "Find your meal"
    } else {
        $inputSubmit.value = ""
    }
})