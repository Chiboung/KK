<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Header</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="src/style.css">
  
</head>
<body>
  <div class="main-header">
    <div class="header">
      <div class="header-left">
        <div class="menu-box" onclick="toggleMobileMenu()">
          <i class="fa-solid fa-bars"></i>
          <span class="menu-text">Menu</span>
        </div>
        <a href="index.php" class="logo logo-box" onclick="this.style.backgroundColor=' #2a2a2a'">ZHIWENYI</a>
      </div>

      <nav class="menu-all">
        <a href="index.php" class="menu-item hide-on-mobile"><i class="fas fa-home"></i>&nbsp; Home</a>
        <a href="#" class="menu-item hide-on-mobile" ><i class="fas fa-question-circle"></i>&nbsp; FAQ</a>
        <a href="#" class="menu-item hide-on-mobile"><i class="fas fa-edit"></i>&nbsp; Request</a>
       <!-- Menu item -->
        <a href="#" class="menu-item hide-on-mobile" onclick="toggleThemeDropdown()">
          <i class="fas fa-palette"></i>&nbsp; Theme
</a>

        <!-- Theme dropdown panel -->
        <div id="themeDropdown" class="theme-selector hidden">
          <label class="theme-option">
            <input type="radio" name="theme" value="purple-amber">
            <span>Deep Purple & Amber</span>
            <i class="gear" style="color: #9c27b0;"></i>
          </label>

          <label class="theme-option">
            <input type="radio" name="theme" value="indigo-pink">
            <span>Indigo & Pink</span>
            <i class="gear" style="color: #3f51b5;"></i>
          </label>

          <label class="theme-option">
            <input type="radio" name="theme" value="pink-bluegrey">
            <span>Pink & Blue-grey</span>
            <i class="gear" style="color: #e91e63;"></i>
          </label>

          <label class="theme-option">
            <input type="radio" name="theme" value="purple-green" checked>
            <span>Purple & Green</span>
            <i class="gear" style="color: #9c27b0;"></i>
          </label>
        </div>

        <a href="#" class="menu-item hide-on-mobile"><i class="fas fa-compass"></i>&nbsp; KKKK</a>
        <!-- Search Panel -->
         <a href="javascript:void(0);" onclick="openSearchPanel()"><i class="fas fa-search"></i>&nbsp; Search</a>
        <!-- Responsive Search Panel -->
        <div id="searchPanel" class="search-panel">
  <div class="search-header">
    <i class="fas fa-arrow-left search-btn-back " style="margin:0;" onclick="closeSearchPanel()"></i>
    <div class="search-input-wrapper">
    <input type="text" id="searchInput" class="search-input" placeholder="Search..." oninput="toggleClearButton()" />
    <span id="clearBtn" class="clear-btn" onclick="clearSearch()">x</span>
  </div>
  </div>

  <div class="search-filters">
    <button class="filter-btn active">All</button>
    <button class="filter-btn">Honor of Kings</button>
    <button class="filter-btn">HOK</button>
    <button class="filter-btn">Anime</button>
    <button class="filter-btn">Girl</button>
  </div>

  <div class="search-results">
    <div class="search-result">Not Found</div>
  </div>

  <div class="request-btn">Request Drama</div>
</div>


        <div class="navbar">
          <span class="profile-text">ZHIWENYI</span>
    <div class="user-profile" onclick="toggleDropdown()">
      <img src="https://www.shutterstock.com/image-photo/beautiful-chinese-girl-sakura-260nw-352208243.jpg" alt="Profile Photo">
      <div class="dropdown-menu" id="dropdownMenu">
        <div class="navbar" style="border-bottom: 1px solid #333; padding-right:8%;">
    <div class="user-profile" onclick="toggleDropdown()">
      <img src="https://www.shutterstock.com/image-photo/beautiful-chinese-girl-sakura-260nw-352208243.jpg" alt="Profile Photo">
      <h2>ZHIWENYI</h2>
        </div>
  </div>
        <a href="#">Username</a>
        <a href="#">Profile</a>
        <a href="#">Edit</a>
        <a href="#">History</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </div>
      </nav>      
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobileNav" class="mobile-nav">
      <div class="header-left-mb">
        <div class="menu-box-mb" onclick="toggleMobileMenu()">
          <i class="fa-solid fa-bars"></i>
        </div>
        <a href="#" class="logo-mb logo-box" onclick="this.style.backgroundColor=' #2a2a2a'" style="color:orange;padding: 5px 15px;">ZHIWENYI</a>
      </div>
      <a href="index.php" class="menu-item" style="border-radius:0px;box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);"><i class="fas fa-home"></i>&nbsp; Home</a>
      <a href="header.php" class="menu-item" style="border-radius:0px;box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);"><i class="fas fa-question-circle"></i>&nbsp; FAQ</a>
      <a href="#" class="menu-item" style="border-radius:0px;box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);"><i class="fas fa-edit"></i>&nbsp; Request Drama</a>
      <a href="#" class="menu-item" style="border-radius:0px;box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);"><i class="fas fa-palette"></i>&nbsp; Theme</a>
      <a href="#" class="menu-item" style="border-radius:0px;box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);"><i class="fas fa-compass"></i>&nbsp; Explore</a>
    </div>
  </div>
<script src="src/script.js"></script>
</body>
</html>
