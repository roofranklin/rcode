/* abre e fecha o menu quando clicar no ícone */
const nav = document.querySelector('.header-nav')
const toggle = document.querySelectorAll('.toggle')

for (const element of toggle) {
  element.addEventListener('click', function () {
    nav.classList.toggle('show')
  })
}

// dropdown

const dropdown = document.querySelector('#btn-gen')
const content = document.querySelector('#ul-gen')

const dropdown_2 = document.querySelector('#btn-trans')
const content_2 = document.querySelector('#ul-trans')

dropdown.addEventListener('click', function () {
  content.classList.toggle('show')
})

dropdown_2.addEventListener('click', function () {
  content_2.classList.toggle('show')
})
