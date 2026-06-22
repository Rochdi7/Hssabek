// Apply the saved theme settings from local storage
// This runs early in <head> to prevent flash of unstyled content
(function() {
    var html = document.querySelector("html");
    var theme = localStorage.getItem('theme') || 'light';

    // Handle automatic theme (system preference)
    if (theme === 'automatic') {
        theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    var layout = localStorage.getItem('layout') || 'default';
    var size = localStorage.getItem('size') || 'default';
    var width = localStorage.getItem('width') || 'fluid';

    html.setAttribute("data-bs-theme", theme);
    html.setAttribute('data-sidebar', localStorage.getItem('sidebarTheme') || 'light');
    html.setAttribute('data-color', localStorage.getItem('color') || 'primary');
    html.setAttribute('data-topbar', localStorage.getItem('topbar') || 'white');
    html.setAttribute('data-layout', layout);
    html.setAttribute('data-size', size);
    html.setAttribute('data-width', width);

    // Apply font family if set
    var fontFamily = localStorage.getItem('fontFamily');
    if (fontFamily) {
        html.style.setProperty('--bs-body-font-family', fontFamily);
    }

    // Apply body classes on DOMContentLoaded based on layout/size/width
    document.addEventListener('DOMContentLoaded', function() {
        var body = document.body;
        var layoutMini = 0;

        // Layout classes
        if (layout === 'mini') {
            body.classList.add('mini-sidebar');
            body.classList.remove('menu-horizontal');
            layoutMini = 1;
        } else if (layout === 'horizontal' || layout === 'horizontal-single' || layout === 'horizontal-overlay') {
            body.classList.add('menu-horizontal');
            body.classList.remove('mini-sidebar');
        } else {
            body.classList.remove('mini-sidebar', 'menu-horizontal');
        }

        // Size classes
        if (size === 'compact') {
            body.classList.add('mini-sidebar');
            body.classList.remove('expand-menu');
            layoutMini = 1;
        } else if (size === 'hoverview') {
            body.classList.add('expand-menu');
            if (layoutMini === 0) body.classList.remove('mini-sidebar');
        } else {
            if (layoutMini === 0) body.classList.remove('mini-sidebar');
            body.classList.remove('expand-menu');
        }

        // Width classes
        if (width === 'box') {
            body.classList.add('layout-box-mode');
            body.classList.add('mini-sidebar');
        } else {
            if (layoutMini === 0 && size !== 'compact') body.classList.remove('mini-sidebar');
            body.classList.remove('layout-box-mode');
        }

        // Sidebar background
        var sidebarBg = localStorage.getItem('sidebarBg');
        if (sidebarBg) {
            body.setAttribute('data-sidebarbg', sidebarBg);
        } else {
            body.removeAttribute('data-sidebarbg');
        }
    });
})();

// Header dark/light mode toggle buttons
document.addEventListener('DOMContentLoaded', function() {
    var darkModeToggle = document.getElementById('dark-mode-toggle');
    var lightModeToggle = document.getElementById('light-mode-toggle');
    var mobileThemeToggle = document.getElementById('theme-toggle-mobile');
    var mobileThemeToggleLabel = document.getElementById('theme-toggle-mobile-label');
    var mobileThemeToggleIcon = document.getElementById('theme-toggle-mobile-icon');
    var currentTheme = localStorage.getItem('theme') || 'light';
    var themeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

    function getEffectiveTheme(theme) {
        if (theme === 'automatic') {
            return themeMediaQuery.matches ? 'dark' : 'light';
        }

        return theme || 'light';
    }

    function syncThemeControls(theme) {
        var effectiveTheme = getEffectiveTheme(theme);

        if (effectiveTheme === 'dark') {
            if (darkModeToggle) darkModeToggle.classList.remove('activate');
            if (lightModeToggle) lightModeToggle.classList.add('activate');
            if (mobileThemeToggleIcon) mobileThemeToggleIcon.className = 'isax isax-sun-1 me-2';
            if (mobileThemeToggleLabel) {
                mobileThemeToggleLabel.textContent =
                    mobileThemeToggleLabel.dataset.lightLabel || 'Mode clair';
            }
        } else {
            if (darkModeToggle) darkModeToggle.classList.add('activate');
            if (lightModeToggle) lightModeToggle.classList.remove('activate');
            if (mobileThemeToggleIcon) mobileThemeToggleIcon.className = 'isax isax-moon me-2';
            if (mobileThemeToggleLabel) {
                mobileThemeToggleLabel.textContent =
                    mobileThemeToggleLabel.dataset.darkLabel || 'Mode sombre';
            }
        }
    }

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-bs-theme', getEffectiveTheme(theme));
        localStorage.setItem('theme', theme);
        localStorage.setItem('darkMode', theme === 'dark' ? 'enabled' : 'disabled');
        currentTheme = theme;
        syncThemeControls(theme);
    }

    syncThemeControls(currentTheme);

    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            applyTheme('dark');
        });
    }

    if (lightModeToggle) {
        lightModeToggle.addEventListener('click', function() {
            applyTheme('light');
        });
    }

    if (mobileThemeToggle) {
        mobileThemeToggle.addEventListener('click', function() {
            var nextTheme = getEffectiveTheme(currentTheme) === 'dark' ? 'light' : 'dark';
            applyTheme(nextTheme);
        });
    }

    // Listen for system theme changes when in automatic mode
    if (currentTheme === 'automatic') {
        themeMediaQuery.addEventListener('change', function(e) {
            if (localStorage.getItem('theme') === 'automatic') {
                var newTheme = e.matches ? 'dark' : 'light';
                document.documentElement.setAttribute('data-bs-theme', newTheme);
                syncThemeControls('automatic');
            }
        });
    }
});
