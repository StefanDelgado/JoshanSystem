// Function to toggle dark mode
function toggleDarkMode() {
  const body = document.body;
  const mainContent = document.querySelector('.main-content');

  // Toggle dark mode class on body
  body.classList.toggle('dark-mode');

  // Toggle background gradient for main content
  mainContent.classList.toggle('dark-mode-content');
}
