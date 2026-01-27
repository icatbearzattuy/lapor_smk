<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <script src="//unpkg.com/vue@2/dist/vue.js"></script>
  <script src="//unpkg.com/element-ui@2.15.14/lib/index.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="//unpkg.com/element-ui@2.15.14/lib/theme-chalk/index.css">
  <script src="//unpkg.com/element-ui/lib/umd/locale/id.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body { font-family: 'Poppins', sans-serif; }
    .is-selected {
      color: #1989FA;
      font-weight: bold;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex">
  <section>
  <!-- Mobile Menu Button -->
  <button class="sidebar-menu-button fixed left-5 top-5 z-20 hidden lg:hidden w-10 h-10 bg-blue-500 text-white rounded items-center justify-center">
    <span class="material-symbols-rounded">menu</span>
  </button>

  <!-- Sidebar -->
  <aside class="sidebar fixed top-0 left-0 z-10 h-screen bg-white transition-all duration-400 w-[270px]">
    
    <!-- Sidebar Header -->
    <header class="flex items-center justify-between p-6 relative">
      <a href="#" class="header-logo">
        <img src="logo.png" alt="Logo" class="w-12 h-12 rounded-full object-contain">
      </a>
      <button class="sidebar-toggler absolute right-5 w-9 h-9 bg-blue-500 text-white rounded flex items-center justify-center transition-all duration-400 hover:bg-blue-800">
        <span class="material-symbols-rounded transition-transform duration-400">chevron_left</span>
      </button>
    </header>

    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
      <!-- Primary Nav -->
      <ul class="nav-list primary-nav flex flex-col gap-1 px-4 translate-y-4 transition-all duration-400 overflow-y-auto pb-5" style="height: calc(100vh - 227px); scrollbar-width: thin; scrollbar-color: transparent transparent;">
        
        <!-- Dashboard -->
        <li class="nav-item relative">
          <a href="{{ route('admin.dashboard') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-900 border border-white transition-all duration-400 hover:bg-gray-100 whitespace-nowrap">
            <span class="material-symbols-rounded">dashboard</span>
            <span class="nav-label transition-opacity duration-300">Dashboard</span>
          </a>
          <ul class="dropdown-menu h-0 overflow-hidden list-none pl-4 transition-all duration-400">
            <li class="nav-item"><a class="nav-link dropdown-title hidden px-4 py-2 text-blue-900 font-medium">Dashboard</a></li>
          </ul>
        </li>

        <!-- Services Dropdown -->
        <li class="nav-item dropdown-container relative">
          <a href="#" class="nav-link dropdown-toggle flex items-center gap-3 px-4 py-3 rounded-lg text-gray-900 border border-white transition-all duration-400 hover:bg-gray-100 whitespace-nowrap">
            <span class="material-symbols-rounded">groups</span>
            <span class="nav-label transition-opacity duration-300">Manajemen Akun</span>
            <span class="dropdown-icon material-symbols-rounded ml-auto transition-transform duration-400">keyboard_arrow_down</span>
          </a>
          <ul class="dropdown-menu h-0 overflow-hidden list-none pl-4 transition-all duration-400">
            <li class="nav-item"><a class="nav-link dropdown-title hidden px-4 py-2 text-blue-900 font-medium">Manajemen Akun</a></li>
            <li class="nav-item"><a href="#" class="nav-link dropdown-link flex items-center gap-3 px-4 py-2 rounded-lg text-gray-900 transition-all duration-400 hover:bg-gray-100">Siswa</a></li>
            <li class="nav-item"><a href="#" class="nav-link dropdown-link flex items-center gap-3 px-4 py-2 rounded-lg text-gray-900 transition-all duration-400 hover:bg-gray-100">Admin</a></li>
          </ul>
        </li>

        <!-- Laporan -->
        <li class="nav-item relative">
          <a href="{{ route('admin.laporan') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-900 border border-white transition-all duration-400 hover:bg-gray-100 whitespace-nowrap">
            <span class="material-symbols-rounded">breaking_news</span>
            <span class="nav-label transition-opacity duration-300">Laporan</span>
          </a>
          <ul class="dropdown-menu h-0 overflow-hidden list-none pl-4 transition-all duration-400">
            <li class="nav-item"><a class="nav-link dropdown-title hidden px-4 py-2 text-blue-900 font-medium">Laporan</a></li>
          </ul>
        </li>
      </ul>

      <!-- Secondary Nav (Bottom) -->
      <ul class="nav-list secondary-nav absolute bottom-9 w-full bg-white flex flex-col gap-1 px-4">

        <!-- Sign Out -->
        <li class="nav-item relative">
          <a href="#" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-900 border border-white transition-all duration-400 hover:bg-gray-100 whitespace-nowrap">
            <span class="material-symbols-rounded">logout</span>
            <span class="nav-label transition-opacity duration-300">Sign Out</span>
          </a>
          <ul class="dropdown-menu h-0 overflow-hidden list-none pl-4 transition-all duration-400">
            <li class="nav-item"><a class="nav-link dropdown-title hidden px-4 py-2 text-blue-900 font-medium">Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </aside>

  <script>
    // Toggle dropdown visibility
    const toggleDropdown = (dropdown, menu, isOpen) => {
      dropdown.classList.toggle("open", isOpen);
      menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
      const icon = dropdown.querySelector('.dropdown-icon');
      if (icon) {
        icon.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0deg)';
      }
    };

    // Close all open dropdowns
    const closeAllDropdowns = () => {
      document.querySelectorAll(".dropdown-container.open").forEach((openDropdown) => {
        toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
      });
    };

    // Attach click event to dropdown toggles
    document.querySelectorAll(".dropdown-toggle").forEach((dropdownToggle) => {
      dropdownToggle.addEventListener("click", (e) => {
        e.preventDefault();
        const dropdown = dropdownToggle.closest(".dropdown-container");
        const menu = dropdown.querySelector(".dropdown-menu");
        const isOpen = dropdown.classList.contains("open");
        closeAllDropdowns();
        toggleDropdown(dropdown, menu, !isOpen);
      });
    });

    // Sidebar collapse functionality
    const sidebar = document.querySelector(".sidebar");
    const toggleButtons = document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button");
    
    toggleButtons.forEach((button) => {
      button.addEventListener("click", () => {
        closeAllDropdowns();
        sidebar.classList.toggle("collapsed");
        
        // Toggle collapsed styles
        if (sidebar.classList.contains("collapsed")) {
          sidebar.classList.remove("w-[270px]");
          sidebar.classList.add("w-[85px]");
          
          // Hide labels and dropdown icons
          document.querySelectorAll(".nav-label, .dropdown-icon").forEach(el => {
            el.style.opacity = "0";
            el.style.pointerEvents = "none";
          });
          
          // Transform toggler button
          const togglerIcon = document.querySelector(".sidebar-toggler span");
          togglerIcon.style.transform = "rotate(180deg)";
          
          // Adjust toggler position
          document.querySelector(".sidebar-toggler").style.transform = "translate(-4px, 65px)";
          
          // Adjust primary nav
          document.querySelector(".primary-nav").style.transform = "translateY(65px)";
          document.querySelector(".primary-nav").style.overflow = "unset";
          
          // Show dropdown titles when collapsed
          document.querySelectorAll(".dropdown-title").forEach(el => {
            el.classList.remove("hidden");
          });
          
        } else {
          sidebar.classList.remove("w-[85px]");
          sidebar.classList.add("w-[270px]");
          
          // Show labels and dropdown icons
          document.querySelectorAll(".nav-label, .dropdown-icon").forEach(el => {
            el.style.opacity = "1";
            el.style.pointerEvents = "auto";
          });
          
          // Reset toggler button
          const togglerIcon = document.querySelector(".sidebar-toggler span");
          togglerIcon.style.transform = "rotate(0deg)";
          
          // Reset toggler position
          document.querySelector(".sidebar-toggler").style.transform = "none";
          
          // Reset primary nav
          document.querySelector(".primary-nav").style.transform = "translateY(15px)";
          document.querySelector(".primary-nav").style.overflow = "auto";
          
          // Hide dropdown titles when expanded
          document.querySelectorAll(".dropdown-title").forEach(el => {
            el.classList.add("hidden");
          });
        }
      });
    });

    // Collapsed dropdown behavior on hover
    sidebar.addEventListener("mouseenter", (e) => {
      if (sidebar.classList.contains("collapsed") && e.target.closest(".nav-item")) {
        const navItem = e.target.closest(".nav-item");
        const dropdownMenu = navItem.querySelector(".dropdown-menu");
        if (dropdownMenu) {
          dropdownMenu.style.position = "absolute";
          dropdownMenu.style.top = "-10px";
          dropdownMenu.style.left = "100%";
          dropdownMenu.style.opacity = "1";
          dropdownMenu.style.height = "auto";
          dropdownMenu.style.pointerEvents = "auto";
          dropdownMenu.style.transform = "translateY(12px)";
          dropdownMenu.style.borderRadius = "0 10px 10px 0";
          dropdownMenu.style.background = "white";
          dropdownMenu.style.paddingRight = "10px";
        }
      }
    });

    // Mobile responsive
    if (window.innerWidth <= 1024) {
      sidebar.classList.add("collapsed");
      document.querySelector(".sidebar-menu-button").classList.remove("hidden");
      document.querySelector(".sidebar-menu-button").classList.add("flex");
      
      // Mobile collapsed = hidden off-screen
      sidebar.style.left = "-270px";
      sidebar.classList.remove("w-[85px]");
      sidebar.classList.add("w-[270px]");
    }

    // Mobile menu button behavior
    document.querySelector(".sidebar-menu-button")?.addEventListener("click", () => {
      if (sidebar.style.left === "-270px") {
        sidebar.style.left = "0";
      } else {
        sidebar.style.left = "-270px";
      }
    });

    // Scrollbar hover effect
    const primaryNav = document.querySelector(".primary-nav");
    primaryNav.addEventListener("mouseenter", () => {
      primaryNav.style.scrollbarColor = "#EEF2FF transparent";
    });
    primaryNav.addEventListener("mouseleave", () => {
      primaryNav.style.scrollbarColor = "transparent transparent";
    });
  </script>
  </section>

  <section class="main-content flex-1 transition-all duration-400 ml-[270px]">
    <div class="container mx-auto  p-6">
      @yield('content')
    </div>
  </section>

</body>
</html>