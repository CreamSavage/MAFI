/**
 * Sistema MAFI - Utilidades globales de UI (visibilidad de contraseñas, etc.).
 */
window.MAFI = window.MAFI || {};

window.MAFI.togglePassword = function (inputId, iconOrId) {
    const input = document.getElementById(inputId);
    const icon = typeof iconOrId === 'string' ? document.getElementById(iconOrId) : iconOrId;
    if (!input) return;

    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';

    if (icon) {
        icon.classList.toggle('fa-eye', !isPassword);
        icon.classList.toggle('fa-eye-slash', isPassword);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-toggle-password]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const targetId = trigger.getAttribute('data-toggle-password');
            const icon = trigger.querySelector('i') || trigger;
            window.MAFI.togglePassword(targetId, icon);
        });
    });
});
