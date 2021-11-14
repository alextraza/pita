document.addEventListener("DOMContentLoaded", function() {

  var ddToggler = document.querySelector('.dd-toggle');
  ddToggler.onclick = function() {
    ddToggler.classList.toggle('active');
    return false;
  }

  // mass check
  var checkAll = document.getElementById('checkAll');
  var checkMes = document.querySelectorAll('.checkMe');
  checkAll.addEventListener('change', (event) => {
    if (event.target.checked) {
      document.getElementById('massDel').classList.remove('disabled')
      checkMes.forEach(function(checkbox) {
        checkbox.checked = 'checked';
      });
    } else {
      document.getElementById('massDel').classList.add('disabled')
      checkMes.forEach(function(checkbox) {
        checkbox.checked = '';
      })
    }
  });

  // enable/disable mass-delete button
  checkMes.forEach(function(checkbox) {
    checkbox.addEventListener('change', (event, flag) => {
      let checked = document.querySelectorAll('.checkMe:checked');
      if (checked.length > 0) {
        document.getElementById('massDel').classList.remove('disabled')
      } else {
        document.getElementById('massDel').classList.add('disabled')
      }
    });

  })

})
