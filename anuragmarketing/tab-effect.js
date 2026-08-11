// ─── Tab Away Effect ─────────────────────────────────────────────────────────
let originalTitle   = document.title;
let originalFavicon = "";

const _links = document.querySelectorAll('link[rel*="icon"]');
if (_links.length > 0) originalFavicon = _links[0].href;

function getSadFavicon() {
    const canvas = document.createElement('canvas');
    canvas.width  = 32;
    canvas.height = 32;
    const ctx = canvas.getContext('2d');
    ctx.font          = '28px serif';
    ctx.textAlign     = 'center';
    ctx.textBaseline  = 'middle';
    ctx.fillText('😔', 16, 18);
    return canvas.toDataURL();
}
const sadFavicon = getSadFavicon();



// ─── Main DOMContentLoaded ────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {

    // Mobile Menu
    const menuToggle = document.getElementById('mobile-menu');
    const navMenu    = document.querySelector('.nav-menu');
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }

    // ─── Scroll Reveal (IntersectionObserver) ────────────────────────────────
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .scale-up');
    if (revealElements.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    if (entry.target.classList.contains('stats-section')) {
                        startCounters(entry.target);
                    }
                }
            });
        }, { threshold: 0.15 });
        revealElements.forEach(el => revealObserver.observe(el));
    }

    // ─── Stats Counter ────────────────────────────────────────────────────────
    function startCounters(section) {
        section.querySelectorAll('.counter').forEach(counter => {
            const target    = +counter.getAttribute('data-target');
            const increment = target / 60;
            let current     = 0;
            const step = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(step);
                } else {
                    counter.textContent = target;
                }
            };
            if (+counter.textContent === 0) requestAnimationFrame(step);
        });
    }

    // Blog rendering is now handled server-side in blog.php and index.php for SEO.
});

// ─── WhatsApp Floating Button (loads on every page) ──────────────────────────
(function () {
    // Don't add duplicate buttons
    if (document.getElementById('whatsapp-float')) return;

    // Inject CSS
    var style = document.createElement('style');
    style.textContent = [
        '#whatsapp-float{',
            'position:fixed;bottom:28px;right:28px;z-index:99999;',
            'background:#25D366;width:60px;height:60px;border-radius:50%;',
            'display:flex;align-items:center;justify-content:center;',
            'box-shadow:0 4px 20px rgba(37,211,102,.45);',
            'text-decoration:none;animation:wa-pulse 2.2s infinite;',
            'transition:transform .2s ease,box-shadow .2s ease;',
        '}',
        '#whatsapp-float:hover{',
            'transform:scale(1.12);',
            'box-shadow:0 6px 28px rgba(37,211,102,.65);',
            'animation:none;',
        '}',
        '#whatsapp-float:hover .wa-tooltip{opacity:1;transform:translateX(0);}',
        '.wa-tooltip{',
            'position:absolute;right:70px;background:#111827;color:#fff;',
            'font-size:13px;font-weight:600;padding:6px 14px;border-radius:8px;',
            'white-space:nowrap;opacity:0;transform:translateX(8px);',
            'transition:opacity .25s ease,transform .25s ease;',
            'pointer-events:none;font-family:Inter,sans-serif;',
        '}',
        '.wa-tooltip::after{',
            'content:"";position:absolute;left:100%;top:50%;',
            'transform:translateY(-50%);border:6px solid transparent;',
            'border-left-color:#111827;',
        '}',
        '@keyframes wa-pulse{',
            '0%{box-shadow:0 0 0 0 rgba(37,211,102,.55)}',
            '70%{box-shadow:0 0 0 14px rgba(37,211,102,0)}',
            '100%{box-shadow:0 0 0 0 rgba(37,211,102,0)}',
        '}'
    ].join('');
    document.head.appendChild(style);

    // Inject HTML
    var btn = document.createElement('a');
    btn.id        = 'whatsapp-float';
    btn.href      = 'https://wa.me/919821038868';
    btn.target    = '_blank';
    btn.rel       = 'noopener noreferrer';
    btn.setAttribute('aria-label', 'Chat with us on WhatsApp');
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="30" height="30"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg><span class="wa-tooltip">Chat with us!</span>';

    document.body.appendChild(btn);
})();
