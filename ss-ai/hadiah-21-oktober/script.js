// Tab switching functionality
function showTab(tabName) {
    // Hide all tab contents
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(content => {
        content.classList.remove('active');
    });
    
    // Remove active class from all buttons
    const buttons = document.querySelectorAll('.tab-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab content
    document.getElementById(tabName).classList.add('active');
    
    // Add active class to clicked button
    event.target.classList.add('active');
}

// Surprise functionality
function showSurprise() {
    const surpriseBox = document.getElementById('surprise');
    surpriseBox.classList.add('show');
    
    // Create confetti effect
    createConfetti();
    
    // Hide surprise after 5 seconds
    setTimeout(() => {
        surpriseBox.classList.remove('show');
    }, 5000);
}

// Create confetti animation
function createConfetti() {
    const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#f9ca24', '#f0932b', '#eb4d4b'];
    
    for (let i = 0; i < 50; i++) {
        setTimeout(() => {
            const confetti = document.createElement('div');
            confetti.style.position = 'fixed';
            confetti.style.width = '10px';
            confetti.style.height = '10px';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.left = Math.random() * window.innerWidth + 'px';
            confetti.style.top = '-10px';
            confetti.style.borderRadius = '50%';
            confetti.style.pointerEvents = 'none';
            confetti.style.zIndex = '1000';
            confetti.style.transition = 'all 3s linear';
            
            document.body.appendChild(confetti);
            
            // Animate falling
            setTimeout(() => {
                confetti.style.top = window.innerHeight + 'px';
                confetti.style.transform = 'rotate(720deg)';
            }, 100);
            
            // Remove after animation
            setTimeout(() => {
                document.body.removeChild(confetti);
            }, 3000);
        }, i * 100);
    }
}

// Add some interactive elements when page loads
window.addEventListener('load', function() {
    // Add floating hearts animation
    setInterval(createFloatingHeart, 3000);
});

function createFloatingHeart() {
    const heart = document.createElement('div');
    heart.innerHTML = '❤️';
    heart.style.position = 'fixed';
    heart.style.left = Math.random() * window.innerWidth + 'px';
    heart.style.bottom = '-50px';
    heart.style.fontSize = '20px';
    heart.style.pointerEvents = 'none';
    heart.style.zIndex = '100';
    heart.style.transition = 'all 4s ease-out';
    heart.style.opacity = '0.7';
    
    document.body.appendChild(heart);
    
    setTimeout(() => {
        heart.style.bottom = window.innerHeight + 'px';
        heart.style.opacity = '0';
        heart.style.transform = 'translateX(' + (Math.random() * 200 - 100) + 'px)';
    }, 100);
    
    setTimeout(() => {
        document.body.removeChild(heart);
    }, 4000);
}

// Add typewriter effect to letter
function typeWriter(element, text, speed = 50) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Add smooth scrolling for better UX
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});