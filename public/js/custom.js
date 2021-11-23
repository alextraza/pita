document.addEventListener("DOMContentLoaded", function() {
  document.addEventListener('click', (e) => {
    addToCartClick(e);
    rmFromCartClick(e);
    plusMinusUpdate(e);
    showUserModal(e);
    closeModalWindow(e);
  });

  document.addEventListener('change', (e) => {
    changeCount(e.target);
    removeError(e);
  });

  if (userForms = document.querySelectorAll('.ajax-form')) {
    userForms.forEach(form => {
      form.addEventListener('submit', e => {
        e.preventDefault();
        submitForm(e);
      })
    })
  }

  // submit form function
  function submitForm(e) {
    fetch(e.target.action, {
      method: e.target.method,
      body: new FormData(e.target)
    }).then(function(response) {
      if (response.ok) {
        return response.json();
      }
    }).then(function(data) {
      if (data.status == 'error') {
        for (const [key, value] of Object.entries(data.data)) {
          if (key == 'errors') {
            addError(e.target.querySelector('.'+key), value);
          } else {
            addError(e.target.querySelector('[name='+key+']'), value);
          }
        }
      } else {
        if (data.status == 'success') {
          location.reload();
        }
      }
    }).catch(function(error) {
      console.warn(error);
    })
  }

  // add errors to fields
  function addError(element, value) {
    element.parentNode.classList.add('has-error');
    let errorSpan = document.createElement('span');
    errorSpan.classList = 'text-danger';
    errorSpan.innerText = value;
    element.parentNode.appendChild(errorSpan);
  }

  // remove errors if input change
  function removeError(e) {
    if (errorSpan = e.target.parentNode.querySelector('span.text-danger')) {
      errorSpan.remove();
      e.target.parentNode.classList.remove('has-error');
    }
  }

  // add to cart
  async function addToCartClick(e) {
    if (e.target.classList.contains('add-to-cart')) {
      e.preventDefault()
      data = new FormData();
      data.append('_token', getToken());
      data.append('id', e.target.dataset.id);
      let itemBlock = e.target.parentNode.parentNode;
      if (itemBlock.querySelector('[name=has_alt]:checked')) {
        data.append('has_alt', 1);
      }

      try {
        const response = await fetch('/cart/add', {
          method: 'POST',
          body: data
        });
        const result = await response.text();
        let catNavCart = document.querySelectorAll('.cat__nav__cart');
        if (catNavCart) {
          catNavCart.forEach(element => {
            element.innerHTML = result;
          })
        }
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }

  async function rmFromCartClick(e) {
    if (e.target.classList.contains('cart__item__del')) {
      e.preventDefault();
      data = new FormData();
      data.append('_token', getToken());
      data.append('id', e.target.dataset.id);
      try {
        const response = await fetch('/cart/rm', {
          method: 'POST',
          body: data
        });
        const result = await response.json();
        if (result.result == 'success' && result.total > 0) {
          let node = e.target.parentNode;
          if (node.classList.contains('cart__item')) {
            node.remove();
            document.getElementById('total-price').innerText = result.total;
          }
        } else {
          window.location = '/cart';
        }
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }

  function plusMinusUpdate(e) {
    if (e.target.classList.contains('count-plus')) {
      let countInput = e.target.parentNode.querySelector('input[type=number]');
      countInput.value = countInput.value * 1 + 1;
      changeCount(countInput);
    }
    if (e.target.classList.contains('count-minus')) {
      let countInput = e.target.parentNode.querySelector('input[type=number]');
      if (countInput.value > 1) {
        countInput.value = countInput.value * 1 - 1;
        changeCount(countInput);
      }
    }
  }

  function showUserModal(e) {
    if (e.target.id == 'login') {
      if (inp = document.getElementById('tabset_login')) {
        inp.checked = true;
        showModal('userModal');
      }
    }
    if (e.target.id == 'register') {
      if (inp = document.getElementById('tabset_register')) {
        inp.checked = true;
        showModal('userModal');
      }
    }
  }

  function closeModalWindow(e) {
    if (e.target.classList.contains('modal__close')) {
      hideModal(e.target.parentNode.parentNode.id);
    }
    if (e.target.classList.contains('modal__overlay')) {
      hideModal(e.target.parentNode.id);
    }
  }

  function showModal(id) {
    document.getElementById(id).classList.add('active');
  }

  function hideModal(id) {
    document.getElementById(id).classList.remove('active');
  }


  async function changeCount(input) {
    if (input.classList.contains('ch_count')) {
      data = new FormData();
      data.append('_token', getToken());
      data.append('id', input.dataset.id);
      data.append('count', input.value);
      try {
        const response = await fetch('/cart/update', {
          method: 'POST',
          body: data
        });
        const result = await response.json();
        if (result.result == 'success') {
          document.querySelector('#p' + input.dataset.id + ' span').innerText = result.price * input.value
          document.getElementById('total-price').innerText = result.total;
        } else {
          window.location = '/cart';
        }
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }


  function getToken()
  {
    return document.head.querySelector('meta[name="csrf-token"]').content;
  }
});
