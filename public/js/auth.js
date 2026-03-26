function initAuth() {

    document.documentElement.setAttribute('data-bs-theme', 'light');
    
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const mainContainer = document.getElementById('container');

    if (signUpButton && signInButton && mainContainer) {
        signUpButton.addEventListener('click', () => {
            mainContainer.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            mainContainer.classList.remove("right-panel-active");
        });
    }

    const setupToggle = (checkId, inputIds) => {
        const check = document.getElementById(checkId);
        const inputs = inputIds.map(id => document.getElementById(id)).filter(el => el);
        if (check && inputs.length > 0) {
            check.addEventListener('change', function() {
                inputs.forEach(input => input.type = this.checked ? 'text' : 'password');
            });
        }
    };

    setupToggle('showLoginPassword', ['loginPassword']);
    setupToggle('showRegisterPassword', ['registerPassword', 'registerPasswordConfirmation']);

    initCanvas();
}

function initCanvas() {
    const canvas = document.getElementById("canvas1");
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particlesArray;

    let mouse = { x: null, y: null, radius: (canvas.height / 80) * (canvas.width / 80) };

    window.addEventListener('mousemove', function(event) { mouse.x = event.x; mouse.y = event.y; });
    window.addEventListener('resize', function() {
        canvas.width = innerWidth; canvas.height = innerHeight;
        mouse.radius = ((canvas.height / 80) * (canvas.height / 80));
        init();
    });

    class Particle {
        constructor(x, y, directionX, directionY, size, color) {
            this.x = x; this.y = y; this.directionX = directionX; this.directionY = directionY;
            this.size = size; this.color = color;
        }
        draw() {
            ctx.beginPath(); ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
            ctx.fillStyle = '#8E9EAB'; ctx.fill();
        }
        update() {
            if (this.x > canvas.width || this.x < 0) this.directionX = -this.directionX;
            if (this.y > canvas.height || this.y < 0) this.directionY = -this.directionY;
            let dx = mouse.x - this.x; let dy = mouse.y - this.y;
            let distance = Math.sqrt(dx * dx + dy * dy);
            if (distance < mouse.radius + this.size) {
                if (mouse.x < this.x && this.x < canvas.width - this.size * 10) this.x += 3;
                if (mouse.x > this.x && this.x > this.size * 10) this.x -= 3;
                if (mouse.y < this.y && this.y < canvas.height - this.size * 10) this.y += 3;
                if (mouse.y > this.y && this.y > this.size * 10) this.y -= 3;
            }
            this.x += this.directionX; this.y += this.directionY;
            this.draw();
        }
    }

    function init() {
        particlesArray = [];
        let numberOfParticles = (canvas.height * canvas.width) / 9000;
        for (let i = 0; i < numberOfParticles * 2; i++) {
            let size = (Math.random() * 3) + 1;
            let x = (Math.random() * ((innerWidth - size * 2) - (size * 2)) + size * 2);
            let y = (Math.random() * ((innerHeight - size * 2) - (size * 2)) + size * 2);
            particlesArray.push(new Particle(x, y, (Math.random() * 2) - 1, (Math.random() * 2) - 1, size, '#8E9EAB'));
        }
    }

    function connect() {
        for (let a = 0; a < particlesArray.length; a++) {
            for (let b = a; b < particlesArray.length; b++) {
                let distance = ((particlesArray[a].x - particlesArray[b].x) ** 2) + ((particlesArray[a].y - particlesArray[b].y) ** 2);
                if (distance < (canvas.width / 7) * (canvas.height / 7)) {
                    ctx.strokeStyle = `rgba(142, 158, 171, ${1 - (distance / 20000)})`;
                    ctx.lineWidth = 1; ctx.beginPath();
                    ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                    ctx.lineTo(particlesArray[b].x, particlesArray[b].y); ctx.stroke();
                }
            }
        }
    }

    function animate() {
        requestAnimationFrame(animate); ctx.clearRect(0, 0, innerWidth, innerHeight);
        particlesArray.forEach(p => p.update()); connect();
    }

    init(); animate();
}

document.addEventListener('turbo:load', initAuth);
if (!window.Turbo) {
    document.addEventListener('DOMContentLoaded', initAuth);
}
