// ==================== FILTER FUNCTIONALITY ====================
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const filterableItems = document.querySelectorAll('.gallery-item, .news-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter items
            filterableItems.forEach(item => {
                if (filterValue === 'all') {
                    item.style.display = 'block';
                    setTimeout(() => item.style.opacity = '1', 10);
                } else {
                    if (item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                        setTimeout(() => item.style.opacity = '1', 10);
                    } else {
                        item.style.opacity = '0';
                        setTimeout(() => item.style.display = 'none', 300);
                    }
                }
            });
        });
    });
});

// ==================== SMOOTH SCROLLING ====================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// ==================== FORM SUBMISSION ====================
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Simple validation
        const nama = formData.get('nama');
        const email = formData.get('email');
        const telepon = formData.get('telepon');
        const pesan = formData.get('pesan');

        if (nama && email && telepon && pesan) {
            // Simulate form submission
            alert('Terima kasih! Pesan Anda telah dikirim. Kami akan menghubungi Anda secepatnya.');
            this.reset();
        } else {
            alert('Mohon lengkapi semua field yang diperlukan.');
        }
    });
}

// ==================== NEWSLETTER SUBSCRIPTION ====================
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = this.querySelector('input[type="email"]').value;
        
        if (email) {
            alert('Terima kasih telah berlangganan! Konfirmasi akan dikirim ke email Anda.');
            this.reset();
        } else {
            alert('Mohon masukkan alamat email yang valid.');
        }
    });
}

// ==================== ACTIVE NAVIGATION LINK ====================
function setActiveNavLink() {
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-menu a');
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === currentPage || 
            (currentPage === '' && link.getAttribute('href') === 'index.html')) {
            link.classList.add('active');
        }
    });
}

setActiveNavLink();

// ==================== SCROLL TO TOP ====================
const scrollTopBtn = document.querySelector('.scroll-top-btn');

window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
        if (scrollTopBtn) scrollTopBtn.style.display = 'block';
    } else {
        if (scrollTopBtn) scrollTopBtn.style.display = 'none';
    }
});

if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ==================== OPACITY TRANSITION ====================
document.querySelectorAll('.gallery-item, .news-card, .staff-card, .program-card, .facility-item').forEach(item => {
    item.style.opacity = '1';
    item.style.transition = 'opacity 0.3s ease';
});
