<template>
  <div class="main-header">
    <div class="header">
      <div class="header-left">
        <div class="menu-box" @click="toggleMobileMenu">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 28px; height: 28px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- <span class="menu-text">Menu</span> -->
        </div>
        <router-link to="/" class="logo logo-box" >
          ZHIWENYI
        </router-link>
      </div>

      <nav class="menu-all">
        <router-link to="/" class="menu-item hide-on-mobile" active-class="active">
          <i class="fas fa-home"></i>Home
        </router-link>
        <router-link to="/faq" class="menu-item hide-on-mobile" active-class="active">
          <i class="fas fa-question-circle"></i>FAQ
        </router-link>
        <router-link to="/request" class="menu-item hide-on-mobile" active-class="active">
          <i class="fas fa-edit"></i>Request
        </router-link>
        
        <a href="#" class="menu-item hide-on-mobile" @click.prevent="toggleThemeDropdown">
          <i class="fas fa-palette"></i>Theme
        </a>

        <div v-if="isThemeDropdownOpen" class="theme-selector">
          <label v-for="theme in themes" :key="theme.value" class="theme-option">
            <input 
              type="radio" 
              name="theme" 
              :value="theme.value" 
              :checked="currentTheme === theme.value"
              @change="changeTheme(theme.value)"
            >
            <span>{{ theme.label }}</span>
            <i class="gear" :style="{ color: theme.gearColor }"></i>
          </label>
        </div>

        <router-link to="/explore" class="menu-item hide-on-mobile" active-class="active">
          <i class="fas fa-compass"></i>Explore
        </router-link>
        
        <a href="javascript:void(0);" @click="openSearchPanel">
          <i class="fas fa-search"></i>Search
        </a>

        <div class="search-panel" :class="{ 'show': isSearchOpen }">
          <div class="search-header">
            <span class="search-btn-back-wrapper" @click="closeSearchPanel">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="white" style="width: 24px; height: 24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
              </svg>
            </span>
            <div class="search-input-wrapper">
              <input 
                type="text" 
                v-model="searchQuery" 
                class="search-input" 
                placeholder="Search..." 
              />
              <span v-if="searchQuery" class="clear-btn" @click="clearSearch">x</span>
            </div>
          </div>

          <div class="search-filters">
            <button 
              v-for="filter in filters" 
              :key="filter" 
              class="filter-btn" 
              :class="{ active: activeFilter === filter }"
              @click="activeFilter = filter"
            >
              {{ filter }}
            </button>
          </div>

          <div class="search-results">
            <div class="search-result">Not Found</div>
          </div>

          <div class="request-btn">Request</div>
        </div>

        <div class="navbar" ref="profileWrapper">
          <span class="profile-text">ZHIWENYI</span>
          <div class="user-profile" @click.stop="toggleDropdown">
            <img src="https://www.shutterstock.com/image-photo/beautiful-chinese-girl-sakura-260nw-352208243.jpg" alt="Profile Photo">
            
            <div v-if="isProfileDropdownOpen" class="dropdown-menu">
              <div class="navbar" style="border-bottom: 1px solid #333; padding-right:8%;">
                <div class="user-profile">
                  <img src="https://www.shutterstock.com/image-photo/beautiful-chinese-girl-sakura-260nw-352208243.jpg" alt="Profile Photo">
                  <h2>ZHIWENYI</h2>
                </div>
              </div>
              <router-link to="/username">Username</router-link>
              <router-link to="/profile">Profile</router-link>
              <router-link to="/edit">Edit</router-link>
              <router-link to="/history">History</router-link>
              <a href="#" @click.prevent="handleLogout">Logout</a>
            </div>
          </div>
        </div>
      </nav>      
    </div>

    <div class="mobile-nav" :class="{ 'show': isMobileMenuOpen }">
      <div class="header-left-mb">
        <div class="menu-box-mb" @click="toggleMobileMenu">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 28px; height: 28px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
        <router-link to="#" class="logo-mb logo-box" @click="toggleMobileMenu" style="color:orange; padding: 5px 15px;">
          ZHIWENYI
        </router-link>
      </div>
      <router-link to="/" class="menu-item-mb" @click="toggleMobileMenu">
        <i class="fas fa-home"></i>&nbsp; Home
      </router-link>
      <router-link to="/faq" class="menu-item-mb" @click="toggleMobileMenu">
        <i class="fas fa-question-circle"></i>&nbsp; FAQ
      </router-link>
      <router-link to="/request" class="menu-item-mb" @click="toggleMobileMenu">
        <i class="fas fa-edit"></i>&nbsp; Request
      </router-link>
      <router-link to="/theme" class="menu-item-mb" @click="toggleMobileMenu">
        <i class="fas fa-palette"></i>&nbsp; Theme
      </router-link>
      <router-link to="/explore" class="menu-item-mb" @click="toggleMobileMenu">
        <i class="fas fa-compass"></i>&nbsp; Explore
      </router-link>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isMobileMenuOpen = ref(false);
const isThemeDropdownOpen = ref(false);
const isSearchOpen = ref(false);
const isProfileDropdownOpen = ref(false);

const searchQuery = ref('');
const activeFilter = ref('All');
const filters = ['All', 'Honor of Kings', 'HOK', 'Anime', 'Girl'];

const profileWrapper = ref(null);
const currentTheme = ref('purple-green');
const themes = [
  { value: 'purple-amber', label: 'Deep Purple & Amber', gearColor: '#9c27b0', bg: '#673ab7', text: '#ffc107' },
  { value: 'indigo-pink', label: 'Indigo & Pink', gearColor: '#3f51b5', bg: '#3f51b5', text: '#e91e63' },
  { value: 'pink-bluegrey', label: 'Pink & Blue-grey', gearColor: '#e91e63', bg: '#e91e63', text: '#607d8b' },
  { value: 'purple-green', label: 'Purple & Green', gearColor: '#9c27b0', bg: '#9c27b0', text: '#4caf50' }
];

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
  document.body.classList.toggle('lock-scroll', isMobileMenuOpen.value);
};

const toggleThemeDropdown = () => {
  isThemeDropdownOpen.value = !isThemeDropdownOpen.value;
};

const openSearchPanel = () => {
  isSearchOpen.value = true;
};

const closeSearchPanel = () => {
  isSearchOpen.value = false;
};

const clearSearch = () => {
  searchQuery.value = '';
};

const toggleDropdown = () => {
  isProfileDropdownOpen.value = !isProfileDropdownOpen.value;
};

const handleLogoClick = (e) => {
  e.target.style.backgroundColor = '#2a2a2a';
};

const handleLogout = () => {
  console.log("Logging out...");
};

const changeTheme = (themeValue) => {
  currentTheme.value = themeValue;
  const targetTheme = themes.find(t => t.value === themeValue);
  if (targetTheme) {
    document.body.style.backgroundColor = targetTheme.bg;
    document.body.style.color = targetTheme.text;
  }
};

const handleOutsideClick = (event) => {
  if (profileWrapper.value && !profileWrapper.value.contains(event.target)) {
    isProfileDropdownOpen.value = false;
  }
};

onMounted(() => {
  document.addEventListener('click', handleOutsideClick);
});

onUnmounted(() => {
  document.removeEventListener('click', handleOutsideClick);
});
</script>

<style scoped>
.header {
  height: 64px;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.916);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 15px;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 15px;
}

/* 💡 ដំណោះស្រាយ៖ លាក់ប៊ូតុង Menu លើ Laptop ទាំងស្រុង (ចុចក៏មិនត្រូវដែរ) */
.menu-box {
  display: none; 
  font-size: 23px;
  color: white;
  cursor: pointer;
  position: relative;
  margin-left: 10px;
}

.menu-box:active, .menu-box-mb:active {
  color: orange;
}

/* លាក់អក្សរ Menu ជំនួយ */
.menu-box .menu-text {
  display: none;
}

.navbar .profile-text {
  visibility: hidden;
  background-color: rgba(0, 0, 0, 0.51);
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 15px;
  position: absolute;
  z-index: 1;
  top: 115%;
  margin-right: -50px;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.3s, visibility 0.3s;
}

.navbar:hover .profile-text {
  visibility: visible;
  opacity: 1;
}

.logo {
  font-size: 23px;
  font-weight: bold;
  color: orange;
  text-decoration: none;
}

.logo-box {
  padding: 5px 15px;
  border-radius: 5px;
}

.logo-box:hover {
  background-color: rgba(48, 46, 46, 0.48);
}

.logo-box:active {
  background-color: rgb(35, 35, 35);
}

.menu-all {
  display: flex;
  align-items: center;
  gap: 0.4px;
}

.menu-all a {
  padding: 10px 15px;
  border-radius: 5px;
  color: white;
  text-decoration: none;
  margin: 0 1px;
}

.menu-all a:hover {
  background-color: rgba(48, 46, 46, 0.48);
}

.menu-all a:active {
  background-color: rgb(35, 35, 35);
}

.mobile-nav {
  position: fixed;
  left: 0;
  top: 0;
  width: 220px;
  height: 100vh;
  background-color: rgb(37, 37, 37);
  transform: translateX(-120%);
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
  z-index: 9999;
}

.mobile-nav.show {
  transform: translateX(0);
}

.mobile-nav a.menu-item-mb {
  padding: 15px;
  color: white;
  text-decoration: none;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}

.mobile-nav a.menu-item-mb:hover {
  background-color: rgba(48, 46, 46, 0.48);
}

.header-left-mb {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 0 15px;
  height: 64px;
  border-bottom: 1px solid #333;
}

.menu-box-mb {
  font-size: 23px;
  color: white;
  cursor: pointer;
  margin-left: 10px;
  display: flex;
  align-items: center;
}

.logo-mb {
  font-size: 23px;
  font-weight: bold;
  color: orange;
  text-decoration: none;
}

/* 💡 ដំណោះស្រាយ៖ បង្ខំឱ្យបង្ហាញតែពេលនៅលើអេក្រង់ទូរស័ព្ទ (Mobile) ប៉ុណ្ណោះ */
@media screen and (max-width: 768px) {
  .menu-box {
    display: flex !important;
    align-items: center;
    gap: 5px;
  }

  .menu-all .hide-on-mobile {
    display: none !important;
  }
}

.menu-item {
  padding: 10px 15px;
  color: #ccc;
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.menu-item:hover {
  background-color: #2a2a2a;
  color: #fff;
}

.menu-item.active {
  background-color: #2a2a2a;
  box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.2);
  color: #fff;
}

.navbar {
  color: white;
  padding: 12px 30px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.navbar .user-profile {
  display: flex;
  align-items: center;
  gap: 12px;
  position: relative;
  cursor: pointer;
}

.navbar .user-profile img {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  object-fit: cover;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.dropdown-menu {
  position: absolute;
  top: 52px;
  right: 0px;
  background-color: rgb(37, 37, 37);
  width: 200px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  display: block;
  z-index: 1000;
  border-radius: 5px;
  padding-bottom: 10px;
}

.dropdown-menu a {
  display: block;
  padding: 10px;
  color: #fff;
  text-decoration: none;
}

.dropdown-menu a:hover {
  background-color: #2a2a2a;
  border-radius: 0px;
}

.search-panel {
  position: fixed;
  top: 0;
  transform: translateX(-50%);
  left: 50%;
  width: 100%;
  height: 100%;
  background-color: #1e1e1e;
  z-index: 1000;
  box-sizing: border-box;
  display: none;
  flex-direction: column;
}

.search-panel.show {
  display: flex;
}

.search-header {
  background-color: #0f0f0f;
  display: flex;
  align-items: center;
  height: 64px;
  padding: 0 15px;
}

.search-btn-back-wrapper {
  padding: 8px 15px;
  color: #ccc;
  border-radius: 5px;
  transition: all 0.3s ease;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin-right: 10px;
}

.search-btn-back-wrapper:hover {
  background-color: rgba(48, 46, 46, 0.48);
}

.search-btn-back-wrapper:active {
  background-color: #202020;
}

.search-input-wrapper {
  position: relative;
  flex: 1;
}

.search-input {
  width: 100%;
  background: transparent;
  border: none;
  border-bottom: 2px solid white;
  color: white;
  font-size: 18px;
  padding: 5px 35px 5px 5px;
  outline: none;
  box-sizing: border-box;
}

.clear-btn {
  position: absolute;
  right: 8px;
  top: 40%;
  transform: translateY(-50%);
  color: #fff;
  font-size: 18px;
  cursor: pointer;
  user-select: none;
  padding: 5px 10px;
  border-radius: 50%;
}

.clear-btn:active {
  background-color: #444;
}

.search-input::placeholder {
  color: gray;
}

.search-filters {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 20px;
  padding: 10px;
  border-bottom: 1px solid #444;
}

.search-filters .filter-btn {
  background-color: #333;
  color: white;
  border: none;
  border-radius: 20px;
  padding: 8px 16px;
  cursor: pointer;
  font-size: 14px;
  transition: background 0.3s ease;
}

.search-filters .filter-btn.active,
.search-filters .filter-btn:hover {
  background-color: #fff;
  color: #111;
}

.search-results {
  overflow-y: auto;
  color: white;
}

.search-result {
  border: 0px solid #444;
  padding: 12px;
  text-align: center;
}

.request-btn {
  color: white;
  border: 1px solid #444;
  border-left: 0px;
  border-right: 0px;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  text-align: center;
}

.request-btn:hover {
  background-color: #333;
}

@media screen and (min-width: 768px) {
  .search-panel {
    width: 70%;
    border-radius: 12px;
  }
}

.theme-selector {
  background-color: #3a3a3a;
  color: white;
  padding: 12px;
  border-radius: 8px;
  position: absolute;
  top: 50px;
  right: 20px;
  z-index: 1000;
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 260px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.theme-option {
  display: flex;
  align-items: center;
  gap: 10px;
}

.theme-option input[type="radio"] {
  accent-color: #4caf50;
}

.theme-option .gear::before {
  content: "⚙️";
}
</style>