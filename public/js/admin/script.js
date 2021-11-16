document.addEventListener("DOMContentLoaded", function() {

  var ddToggler = document.querySelector('.dd-toggle');
  if (ddToggler) {
    ddToggler.onclick = function() {
      ddToggler.classList.toggle('active');
      return false;
    }
  }

  // mass check
  var checkAll = document.getElementById('checkAll');
  var checkMes = document.querySelectorAll('.checkMe');

  if (checkAll) {
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
    });
  }

  // show atlernative item inputs

  var hasAlt = document.getElementById('has_alt');
  if (hasAlt) {
    let altTarget = document.getElementById('alter');
    hasAlt.addEventListener('change', (event) => {
      if (event.target.checked) {
        altTarget.classList.remove('hidden');
      } else {
        altTarget.classList.add('hidden');
      }
    });
  }

  var showImage = document.querySelector('.showImage');
  if (showImage) {
    let close = document.querySelector('.img__wrapper .close');
    close. onclick = function() {
      showImage.classList.toggle('active');
      return false;
    }
    showImage.onclick = function() {
      showImage.classList.toggle('active');
      return false;
    }
  }

  var filterBtn = document.querySelectorAll('a.filter');
  if (filterBtn) {
    filterBtn.forEach(function(filter) {
      filter.onclick = function() {
        filter.classList.toggle('open');
        return false;
      }

    })
  }

  // init slimselect
  let categoryField = document.getElementById("category_id");
  if (categoryField) {
    var category = new SlimSelect({
      select: categoryField,
    })
  }

  // init markdown editor

  let textarea = document.getElementById("content");
  if (textarea) {
    var simplemde = new SimpleMDE({ element: textarea });
  }

})
