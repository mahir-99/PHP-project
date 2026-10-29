// Only small interface interactions. PHP handles all database operations.
document.querySelectorAll('[data-confirm-delete]').forEach(form => {
  form.addEventListener('submit', event => {
    if (!confirm('Delete this student permanently?')) event.preventDefault();
  });
});
const menuButton = document.querySelector('[data-toggle-menu]');
const closeMenu = () => {
  document.body.classList.remove('menu-open');
  if (menuButton) menuButton.setAttribute('aria-expanded', 'false');
};
if (menuButton) {
  menuButton.addEventListener('click', () => {
    const isOpen = document.body.classList.toggle('menu-open');
    menuButton.setAttribute('aria-expanded', String(isOpen));
  });
}
document.querySelectorAll('[data-close-menu], .sidebar .side-link').forEach(item => {
  item.addEventListener('click', closeMenu);
});
