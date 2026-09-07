document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('menuToggle');
    const menu = document.getElementById('menuLinks');

    if (!button || !menu) return;

    const cerrarMenu = () => {
        menu.classList.remove('active');
        button.setAttribute('aria-expanded', 'false');
        button.setAttribute('aria-label', 'Abrir menú');
    };

    button.addEventListener('click', () => {
        const abierto = menu.classList.toggle('active');
        button.setAttribute('aria-expanded', String(abierto));
        button.setAttribute('aria-label', abierto ? 'Cerrar menú' : 'Abrir menú');
    });

    menu.querySelectorAll('a').forEach((enlace) => enlace.addEventListener('click', cerrarMenu));

    document.addEventListener('keydown', (evento) => {
        if (evento.key === 'Escape') cerrarMenu();
    });
});
