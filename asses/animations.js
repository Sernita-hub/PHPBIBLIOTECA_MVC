/**
 * Biblioteca MVC — Animaciones de Scroll
 * Usa IntersectionObserver para revelar elementos al hacer scroll
 */
(function () {
    'use strict';

    // --- Intersection Observer para elementos .reveal y .table-row-reveal ---
    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Una vez visible no necesita seguir siendo observado
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1,       // Se activa al tener 10% visible
            rootMargin: '0px 0px -30px 0px'
        }
    );

    function initReveal() {
        // Revelar cards y encabezados de página
        document.querySelectorAll('.reveal').forEach(function (el) {
            observer.observe(el);
        });

        // Revelar filas de tabla
        document.querySelectorAll('.table-row-reveal').forEach(function (el) {
            observer.observe(el);
        });
    }

    // --- Ejecutar cuando el DOM esté listo ---
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initReveal);
    } else {
        initReveal();
    }

    // --- Ripple effect en botones ---
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.btn-primary');
        if (!btn) return;

        const ripple = document.createElement('span');
        const rect = btn.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.cssText = [
            'position:absolute',
            'border-radius:50%',
            'background:rgba(255,255,255,0.35)',
            'pointer-events:none',
            'width:' + size + 'px',
            'height:' + size + 'px',
            'left:' + x + 'px',
            'top:' + y + 'px',
            'transform:scale(0)',
            'animation:rippleEffect 0.6s ease-out forwards'
        ].join(';');

        if (!document.getElementById('ripple-style')) {
            const style = document.createElement('style');
            style.id = 'ripple-style';
            style.textContent = '@keyframes rippleEffect{to{transform:scale(2.5);opacity:0}}';
            document.head.appendChild(style);
        }

        btn.appendChild(ripple);
        setTimeout(function () { ripple.remove(); }, 700);
    });

    // --- Highlight fila activa en tablas al hacer hover ---
    document.addEventListener('mouseover', function (e) {
        const row = e.target.closest('tbody tr');
        if (row) {
            const table = row.closest('table');
            if (table) {
                table.querySelectorAll('tbody tr').forEach(function (r) {
                    r.style.opacity = (r === row) ? '1' : '0.6';
                });
            }
        }
    });

    document.addEventListener('mouseout', function (e) {
        const row = e.target.closest('tbody tr');
        if (row) {
            const table = row.closest('table');
            if (table) {
                table.querySelectorAll('tbody tr').forEach(function (r) {
                    r.style.opacity = '1';
                });
            }
        }
    });

    // --- Revelar la auth-card con animación de entrada ---
    const authCard = document.querySelector('.auth-card');
    if (authCard) {
        authCard.style.opacity = '0';
        authCard.style.transform = 'translateY(40px)';
        authCard.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                authCard.style.opacity = '1';
                authCard.style.transform = 'translateY(0)';
            });
        });
    }

})();
