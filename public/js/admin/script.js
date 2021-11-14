document.addEventListener("DOMContentLoaded", function() {
  var ddToggler = document.querySelector('.dd-toggle');
  ddToggler.onclick = function() {
    ddToggler.classList.toggle('active');
    return false;
  }
})
