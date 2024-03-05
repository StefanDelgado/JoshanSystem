const sidebar = document.getElementById('sidebar');
const logo = document.querySelector('.logo img');
const adminName = document.querySelector('.admin-name');
const arrowIcon = document.querySelector('.arrow-icon');

arrowIcon.addEventListener('click', () => {
  sidebar.classList.remove('closed');
  document.querySelector('.navigation').style.display = 'block';
  adminName.style.display = 'block';
});

logo.addEventListener('click', () => {
  sidebar.classList.toggle('closed');
  
  // Add this line to show/hide the navigation based on sidebar state
  document.querySelector('.navigation').style.display = sidebar.classList.contains('closed') ? 'none' : 'block';
  adminName.style.display = sidebar.classList.contains('closed') ? 'none' : 'block';
});

// Google Maps initialization
function initMap() {
  console.log("Initializing Google Map...");
  const map = new google.maps.Map(document.getElementById("google-map"), {
    center: { lat: 40.7128, lng: -74.006 },
    zoom: 12,
  });
  console.log("Google Map initialized successfully.");
}
