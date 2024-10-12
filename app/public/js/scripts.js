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