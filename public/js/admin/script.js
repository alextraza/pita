document.addEventListener("DOMContentLoaded", function() {

  var ddToggler = document.querySelectorAll('.dd-toggle');
  if (ddToggler) {
    ddToggler.forEach(function(element) {
      element.onclick = function() {
        element.classList.toggle('active');
        return false;
      }

    })
  }

  var massDelBnt = document.getElementById('massDel');
  if (massDelBnt) {
    massDelBnt.onclick = function() {
      if (confirm('Вы действительно хотите удалить выбранные элементы?')) {
        var param = '';
        let checked = document.querySelectorAll('.checkMe:checked');
        checked.forEach(function(element, key) {
          if (!key) {
            param += '?';
          } else {
            param += '&';
          }
          param += 'id[]=' + element.value;
        });
        param = massDelBnt.href + param;
        window.location = param;
      }
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
      checkbox.addEventListener('change', (event) => {
        let checked = document.querySelectorAll('.checkMe:checked');
        if (checked.length > 0) {
          document.getElementById('massDel').classList.remove('disabled')
        } else {
          document.getElementById('massDel').classList.add('disabled')
        }
      });
    });
  }

  var changeStatusButton = document.querySelectorAll('.changeStatus');
  if (changeStatusButton) {
    changeStatusButton.forEach(function(element) {
      element.onclick = function() {
        var data = new FormData;
        let token = document.head.querySelector('meta[name="csrf-token"]');
        data.append('_token', token.content);
        axios.post(element.href, data)
             .then(function(res) {
               if (res == 1) {
               }
             })
             .catch(function(err) {
               console.log(err);
             });
        element.querySelector('.status').classList.toggle('denied');
        element.querySelector('.status').classList.toggle('accept');
        return false;
      }

    })
  }

  var changePosInputs = document.querySelectorAll('.changePos');
  if (changePosInputs) {
    changePosInputs.forEach(function(element) {
      element.addEventListener('change', (event) => {
        var data = new FormData;
        let token = document.head.querySelector('meta[name="csrf-token"]');
        data.append('_token', token.content);
        data.append('id', event.target.dataset.id);
        data.append('pos', event.target.value);

        axios.post(event.target.dataset.path, data)
             .then(function(res) {
               if (res == 1) {
               }
             })
             .catch(function(err) {
               console.log(err);
             });

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
