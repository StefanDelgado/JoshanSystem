const sidebar = document.getElementById('sidebar');
const logo = document.querySelector('.logo img');
const adminName = document.querySelector('.admin-name');
const arrowIcon = document.querySelector('.arrow-icon');

// Check if the sidebar state is stored in localStorage
const isSidebarClosed = localStorage.getItem('sidebarClosed') === 'true';

// Function to open the sidebar
function openSidebar() {
  sidebar.classList.remove('closed');
  document.querySelector('.navigation').style.display = 'block';
  adminName.style.display = 'block';
}

// Function to close the sidebar
function closeSidebar() {
  sidebar.classList.add('closed');
  document.querySelector('.navigation').style.display = 'none';
  adminName.style.display = 'none';
}

// Set initial state based on localStorage
if (isSidebarClosed) {
  closeSidebar();
} else {
  openSidebar();
}

// Toggle sidebar state on arrow icon click
arrowIcon.addEventListener('click', () => {
  sidebar.classList.toggle('closed');
  const isClosed = sidebar.classList.contains('closed');
  if (isClosed) {
    closeSidebar();
    // Store the state in localStorage
    localStorage.setItem('sidebarClosed', 'true');
  } else {
    openSidebar();
    // Store the state in localStorage
    localStorage.setItem('sidebarClosed', 'false');
  }
});

// Toggle sidebar state on logo click
logo.addEventListener('click', () => {
  sidebar.classList.toggle('closed');
  const isClosed = sidebar.classList.contains('closed');
  if (isClosed) {
    closeSidebar();
    // Store the state in localStorage
    localStorage.setItem('sidebarClosed', 'true');
  } else {
    openSidebar();
    // Store the state in localStorage
    localStorage.setItem('sidebarClosed', 'false');
  }
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
