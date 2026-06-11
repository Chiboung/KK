
function toggleMobileMenu() {
    const mobileNav = document.getElementById('mobileNav');
    mobileNav.classList.toggle('show');
    document.body.classList.toggle('lock-scroll');
}


// Get current page file name
const current = window.location.pathname.split("/").pop();

document.querySelectorAll('.menu-item').forEach(link => {
const href = link.getAttribute("href");
if (href === current) {
    link.classList.add('active');
}

link.addEventListener('click', function () {
    document.querySelectorAll('.menu-item').forEach(el => el.classList.remove('active'));
    this.classList.add('active');
});
});


function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

// Close dropdown if clicked outside
document.addEventListener('click', function(event) {
    const profile = document.querySelector('.user-profile');
    const dropdown = document.getElementById('dropdownMenu');
    if (!profile.contains(event.target)) {
    dropdown.style.display = 'none';
    }
});

function openSearchPanel() {
  document.getElementById('searchPanel').classList.add('show');
}

function closeSearchPanel() {
  document.getElementById('searchPanel').classList.remove('show');
}

function toggleClearButton() {
  const input = document.getElementById('searchInput');
  const clearBtn = document.getElementById('clearBtn');
  clearBtn.style.display = input.value ? 'block' : 'none';
}

function clearSearch() {
  const input = document.getElementById('searchInput');
  input.value = '';
  toggleClearButton();
  input.focus();
}

//color in theme
function toggleThemeDropdown() {
  const dropdown = document.getElementById('themeDropdown');
  dropdown.classList.toggle('hidden');
}

// Apply theme dynamically 
document.querySelectorAll('input[name="theme"]').forEach(input => {
  input.addEventListener('change', function () {
    switch (this.value) {
      case 'purple-amber':
        document.body.style.backgroundColor = '#673ab7';
        document.body.style.color = '#ffc107';
        break;
      case 'indigo-pink':
        document.body.style.backgroundColor = '#3f51b5';
        document.body.style.color = '#e91e63';
        break;
      case 'pink-bluegrey':
        document.body.style.backgroundColor = '#e91e63';
        document.body.style.color = '#607d8b';
        break;
      case 'purple-green':
        document.body.style.backgroundColor = '#9c27b0';
        document.body.style.color = '#4caf50';
        break;
    }
  });
});
