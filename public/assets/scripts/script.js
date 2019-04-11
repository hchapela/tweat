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
 * Modale
 */

const $shareBtn = document.querySelector('.share')
const $modale = document.querySelector('.modale')
const $closeBtn = document.querySelector('.modale-share-exit')
const $mealName = document.querySelector('.meal-name').innerHTML
const $dailyMeal = document.querySelector('.dailyMeal')
const $twitterMentionButton = document.querySelector('.twitter-mention-button')
let customSentence = `said today, my perfect meal match is ${$mealName}! Find out yours at http://tweat.space/ !`
$twitterMentionButton.dataset.text = customSentence

$dailyMeal.innerHTML = $mealName

$shareBtn.addEventListener('click', () => {
    $modale.style.display = "flex"
    $closeBtn.addEventListener('click', () => {
        $modale.style.display = "none"
    })
})