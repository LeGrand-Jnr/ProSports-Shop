document.getElementById('about-menu').onclick = function() {
                  showPage('about-page');
        const loginForm = document.getElementById('login-form');
        const loginPage = document.getElementById('login-page');
        const homePage = document.getElementById('home-page');
        const exitPage = document.getElementById('exit-page');
        const backBtn = document.getElementById('back-btn');
        const footballPage = document.getElementById('football-page');
        const footballBackBtn = document.getElementById('football-back-btn');
        const basketballPage = document.getElementById('basketball-page');
        const basketballBackBtn = document.getElementById('basketball-back-btn');
        const volleyPage = document.getElementById('volley-page');
        const volleyBackBtn = document.getElementById('volley-back-btn');
        const tennisPage = document.getElementById('tennis-page');
        const tennisBackBtn = document.getElementById('tennis-back-btn');
        const coverPage = document.getElementById('cover-page');
        const loginSignupBtn = document.getElementById('login-signup-btn');
        const coverExitBtn = document.getElementById('cover-exit-btn');
        var navBar = document.getElementById('main-nav');
        // Hide login page initially
        loginPage.classList.add('hidden');
        // Navigation logic for all pages
        function showPage(pageId) {
            [coverPage, loginPage, homePage, exitPage, footballPage, basketballPage, volleyPage, tennisPage].forEach(p => p.classList.add('hidden'));
            document.getElementById(pageId).classList.remove('hidden');
            // Show nav bar on all pages initially
            navBar.style.display = '';
            // If football page, hide nav bar only when scrolled down
            if (pageId === 'football-page') {
                window.addEventListener('scroll', handleFootballNavHide);
            } else {
                window.removeEventListener('scroll', handleFootballNavHide);
            }
        }

// --- CART FUNCTIONALITY ---
// Add item to cart
function addToCart(item) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(item);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert(item.name + ' added to cart!');
}

// To show cart count (optional):
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = document.getElementById('cart-count');
    if (cartCount) cartCount.textContent = cart.length;
}
// Call updateCartCount() after adding/removing items.
document.addEventListener('DOMContentLoaded', updateCartCount);
        function handleFootballNavHide() {
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            if (!footballPage.classList.contains('hidden')) {
                if (scrollY > 20) {
                    navBar.style.display = 'none';
                } else {
                    navBar.style.display = '';
                }
            }
        }
// Add cart button to menu bar in all four sports pages
function addCartButtonToMenu() {
    const nav = document.getElementById('main-nav');
    if (!nav.querySelector('#cart-link')) {
        const cartLink = document.createElement('a');
        cartLink.id = 'cart-link';
        cartLink.href = 'cart.html';
        cartLink.style = 'background:#fff; color:#007bff; border-radius:5px; padding:5px 25px; text-decoration:none; font-weight:bold;';
        cartLink.innerHTML = 'Cart (<span id="cart-count">0</span>)';
        nav.appendChild(cartLink);
    }
    updateCartCount();
}
document.addEventListener('DOMContentLoaded', addCartButtonToMenu);
}
