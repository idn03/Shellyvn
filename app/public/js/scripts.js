// Loading Effect
window.addEventListener('load', function() {
  setTimeout(function() {
    // Hide the spinner
    document.querySelector('.spinner-container').style.display = 'none';
    
    // Show the main content with a smooth transition
    const mainContent = document.querySelector('main');
    mainContent.style.display = 'block';
    setTimeout(() => {
      mainContent.style.opacity = '1';
    }, 100);
  }, 1500);
});

// Input Radio Effect
const radioButtons = document.querySelectorAll('input[type="radio"]');

function updateRadioBoxStyle() {
  document.querySelectorAll('.form__radio-box').forEach(box => {
    box.classList.remove('radio-checked');
  });

  radioButtons.forEach(radio => {
    if (radio.checked) {
      radio.closest('.form__radio-box').classList.add('radio-checked');
    }
  });
}

radioButtons.forEach(radio => {
  radio.addEventListener('change', updateRadioBoxStyle);
});