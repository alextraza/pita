document.addEventListener("DOMContentLoaded", function() {
  document.addEventListener('click', (e) => {
    addToCartClick(e);
    rmFromCartClick(e);
    plusMinusUpdate(e);
  });

  document.addEventListener('change', (e) => {
    changeCount(e.target);
  });


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
        let catNavCart = document.querySelector('.cat__nav__cart');
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
