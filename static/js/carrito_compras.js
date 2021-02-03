let cont=0;

const addToShoppingCartButtons = document.querySelectorAll('.addToCart');
//console.log(':D: addToShoppingCartButtons', addToShoppingCartButtons);
addToShoppingCartButtons.forEach((addToCartButton) => {
  addToCartButton.addEventListener('click', addToCartClicked);
  //const cartCount = item.querySelector('.cart-Count');
  //cartCount
});

//const comprarButton = document.querySelector('.comprarButton');
//comprarButton.addEventListener('click', comprarButtonClicked);

const shoppingCartItemsContainer = document.querySelector(
  '.shoppingCartItemsContainer'
);

function addToCartClicked(event) {
  const button = event.target;
  const item = button.closest('.card');
  //console.log(':D: addToCart -> item', item);

  const itemTitle = item.querySelector('.card-title').textContent;
 // console.log(':D: addToCart -> title', itemTitle);
  const itemPrice = item.querySelector('.card-price').textContent;
 // console.log(':D: addToCart -> price', itemPrice);
  const itemImage = item.querySelector('.card-image').src;
 // console.log(':D: addToCart -> image', itemImage);
  addItemToShoppingCart(itemTitle, itemPrice, itemImage);
  Swal.fire({
    position: 'center',
    icon: 'info',
    title: 'Información...',
    text: 'Producto agregado correctamente',
    //timer: 1900,
    //showConfirmButton: false
    //footer: '<a href>Why do I have this issue?</a>'
  })
}

function addItemToShoppingCart(itemTitle, itemPrice, itemImage) {
  const elementsTitle = shoppingCartItemsContainer.getElementsByClassName(
    'shoppingCartItemTitle'
  );
  //document.getElementById('cart-Count').innerHTML = contElement;
  for (let i = 0; i < elementsTitle.length; i++) {
    if (elementsTitle[i].innerText === itemTitle) {
      let elementQuantity = elementsTitle[i].parentElement.parentElement.parentElement.querySelector(
        '.shoppingCartItemQuantity'
      );
      elementQuantity.value++;
      //document.getElementById('cart-Count').innerHTML = elementQuantity.value;
      updateShoppingCartTotal();
      return;
    }
  }

  const shoppingCartRow = document.createElement('div');
  const shoppingCartContent = `
  <div class="row shoppingCartItem">
        <div class="col-6">
            <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <img src=${itemImage} width='50' height='50' class="shopping-cart-image">
                <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0">${itemTitle}</h6>
            </div>
        </div>
        <div class="col-2">
            <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <p class="item-price mb-0 shoppingCartItemPrice">${itemPrice}</p>
            </div>
        </div>
        <div class="col-4">
            <div
                class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                <input class="shopping-cart-quantity-input shoppingCartItemQuantity cant" id='' type="number"
                    value="1">
                <button class="btn btn-danger buttonDelete" type="button">X</button>
            </div>
        </div>
    </div>`;
  shoppingCartRow.innerHTML = shoppingCartContent;
  shoppingCartItemsContainer.append(shoppingCartRow);

  shoppingCartRow
    .querySelector('.buttonDelete')
    .addEventListener('click', removeShoppingCartItem);

  shoppingCartRow
    .querySelector('.shoppingCartItemQuantity')
    .addEventListener('change', quantityChanged);

  updateShoppingCartTotal();
  //cont++;
  //document.cart-Count.value=0+cont;

}

function updateShoppingCartTotal() {
  let total = 0;
  let cant = 0;
  const shoppingCartTotal = document.querySelector('.shoppingCartTotal');

  const shoppingCartItems = document.querySelectorAll('.shoppingCartItem');
  
  //console.log(':D: shoppingCartTotal -> shoppingCartItems', shoppingCartItems);
    shoppingCartItems.forEach((shoppingCartItem) => {
    const shoppingCartItemPriceElement = shoppingCartItem.querySelector(
      '.shoppingCartItemPrice'
    );
    
    const shoppingCartItemPrice = Number(
      shoppingCartItemPriceElement.textContent.replace('$', '')
    );   
   
    const shoppingCartItemQuantityElement = shoppingCartItem.querySelector(
      '.shoppingCartItemQuantity'
    );
    //console.log(':D: updateShoppingCartTotal -> shoppingCartItemPriceElement', shoppingCartItemQuantityElement);
    
    const shoppingCartItemQuantity = Number(
      shoppingCartItemQuantityElement.value
    );
    total = total + shoppingCartItemPrice * shoppingCartItemQuantity;
    cant = shoppingCartItemQuantity;

  });
  shoppingCartTotal.innerHTML = `$${total.toFixed(2)}`;
  document.getElementById('cart-Count').innerHTML = cant;
}


function removeShoppingCartItem(event) {
  const buttonClicked = event.target;
  buttonClicked.closest('.shoppingCartItem').remove();
  updateShoppingCartTotal();
}

function quantityChanged(event) {
  const input = event.target;
  input.value <= 0 ? (input.value = 1) : null;
  updateShoppingCartTotal();
}
/*
function comprarButtonClicked() {
  shoppingCartItemsContainer.innerHTML = '';
  updateShoppingCartTotal();
}*/

