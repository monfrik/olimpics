const personalLinkButton = document.querySelector('.personalLink')
const username = document.querySelector('.username')
const formConnection = document.querySelector('.formConnection')
const formReview = document.querySelector('.formReview')
const reservationButton = document.querySelector('.reservationButton');
const getReviewButton = document.querySelector('.getReview');
const checboxes = document.querySelectorAll('.checkbox')
const authTypeCheckbox = document.querySelector('.authType');
const permissionCheckbox = document.querySelector('.permission');

personalLinkButton.addEventListener('click', function(){
  if (!username) {
    displayformConnection();
  }
})

reservationButton?.addEventListener('click', function(){
  if (!username) {
    formConnection.style.display = 'block'
  }
})

getReviewButton?.addEventListener('click', function(){
  if (username) {
    formReview.style.display = 'block'
  }
})

authTypeCheckbox.addEventListener('change', event => {
  if (event.target.checked) {
    permissionCheckbox.setAttribute('disabled', true);
    permissionCheckbox.removeAttribute('required');
  } else {
    makeRequired();
  }
})

permissionCheckbox.addEventListener('change', event => {
  if (event.target.checked) {
    authTypeCheckbox.setAttribute('disabled', true);
    authTypeCheckbox.removeAttribute('required');
  } else {
    makeRequired();
  }
})

function makeRequired(){
  checboxes.forEach(checkbox => {
    checkbox.removeAttribute('disabled');
    checkbox.setAttribute('required', true);
  })
}
