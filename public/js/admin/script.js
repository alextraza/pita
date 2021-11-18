document.addEventListener("DOMContentLoaded", function() {

  document.body.addEventListener('click', (e) => {
    ddToggle(e); // show delete sublinks
    openFilterToggle(e);
    sortBy(e);

    if (! confirmDelete(e.target)) {
      e.preventDefault();
    };
  });

  document.body.addEventListener('change', (e) => {
    filterBy(e);
  });

  // filter grid
  function filterBy(e) {
    if(e.target.classList.contains('filter-input')) {
      if (form = document.getElementById('filter-search')) {
        form.submit();
      }
    }
  }

  // sort grig
  function sortBy(e) {
    if(e.target.classList.contains('sorting')) {
      let sortInput = e.target.querySelector('input[type=hidden]');
      if (!sortInput) {
        return false;
      }
      if (sortInput.value == '') {
        resetSortInputs();
        sortInput.value = 'desc';
      } else if (sortInput.value == 'desc') {
        resetSortInputs();
        sortInput.value = 'asc';
      } else {
        resetSortInputs();
      }
      if (form = document.getElementById('filter-search')) {
        form.submit();
      }
    }
  }

  function resetSortInputs() {
    let inputs = document.querySelectorAll('.sorting input[type=hidden]');
    if (inputs) {
      inputs.forEach((element) => {
        element.value = '';
      });
    }
  }


  // show delete sublinks
  function ddToggle(event) {
    ddHide(); //hide sublinks
    if (event.target.classList.contains('dd-toggle')) {
      event.target.classList.toggle('active');
      event.preventDefault();
      return false;
    }
  }
  function ddHide() {
    if (dd = document.querySelectorAll('.dd-toggle.active')) {
      dd.forEach((element) => {
        element.classList.remove('active');
      })
    }
  }

  // confirm element delete
  function confirmDelete(button) {
    if (button.parentNode.classList.contains('dd-container')) {
      if (confirm('Вы действительно хотите удалить данный элемент?')) {
        return true;
      }
      return false;
    }
    return true;
  }

  // show/hide filter input
  function openFilterToggle(event) {
    if (event.target.classList.contains('filter')) {
      if (event.shiftKey) {
        event.target.nextElementSibling.value = '';
        if (form = document.getElementById('filter-search')) {
          form.submit();
        }
      } else {
        event.target.classList.toggle('open');
      }
      event.preventDefault();
    }
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

  // init slimselect
  var categorySelect = initSlimSelect('category_id');
  var orderStatusSelect = initSlimSelect('order_status');
  var paymentStatusSelect = initSlimSelect('payment_status');

  function initSlimSelect(id) {
    let selectBox = document.getElementById(id);
    if (selectBox) {
      var result = new SlimSelect({
        select: selectBox,
      })
      return result;
    }
    return false;
  }

  let filterSelectBox = document.querySelectorAll('select.filter-input');
  if (filterSelectBox) {
    filterSelectBox.forEach((element) => {
      new SlimSelect({
        select: element,
        placeholder: '------',
        allowDeselect: true,
      });
    });
  }

  // init markdown editor

  let textarea = document.getElementById("content");
  if (textarea) {
    var simplemde = new SimpleMDE({ element: textarea });
  }

})
