const $inputs = document.querySelectorAll('[data-js="input"]')
if ($inputs) {
  $inputs.forEach($input => {
    $input.addEventListener('input', handleInput, false)
  })
}

function handleInput (e) {
  e.target.value = phoneMask(e.target.value)
}

function phoneMask (phone) {
  return phone.replace(/(\+)/, '8 (')
    .replace(/\D/g, '')
  .replace(/^(8)/, '8 (')
    .replace(/^([0-7,9])/, '8 ($1')
    .replace(/^(8\s\(\d{3})(\d)/, '$1) $2')
    .replace(/(\d{3})(\d{1,2})/, '$1 $2')
  .replace(/(\d{3}\s\d{2})(\d{1,2})/, '$1 $2')
    .replace(/(\s\d{2}\s\d{2})\d+?$/, '$1');
}
