function submitForm() {
  const name = document.getElementById('qf-name').value.trim();
  const email = document.getElementById('qf-email').value.trim();
  if (!name || !email) {
    document.getElementById('qf-name').style.borderColor = name ? '' : '#E24B4A';
    document.getElementById('qf-email').style.borderColor = email ? '' : '#E24B4A';
    return;
  }
  document.getElementById('qf-form').style.display = 'none';
  document.getElementById('qf-thanks').style.display = 'block';
}


const checkboxes = document.querySelectorAll("input[type='checkbox']");

checkboxes.forEach(box => {
    box.addEventListener('click', () => {
        box.style.border = "2px solid hsl(200, 56%, 19%)";
    });
});