function addToCard (a) {
    let productName = a.parentElement.querySelector(".product_name").innerHTML;
    let productPrice = a.parentElement.querySelector(".price").innerHTML;
    let productImg = a.parentElement.querySelector("img").src;
    let altText = a.parentElement.querySelector("img").alt;

    let item = {productName: productName, productPrice: productPrice, productImg: productImg, altText: altText};

    let shopList = JSON.parse(localStorage.getItem("shoppingCard"));
    if (shopList === null) shopList = [];

    shopList.push(item);
    localStorage.setItem("shoppingCard", JSON.stringify(shopList));

    updateCard();
}

function addToCard2 (a) {
    let productName = a.parentElement.querySelector(".product_name").innerHTML;
    let productPrice = a.parentElement.querySelector(".price").innerHTML;
    let productImg = a.parentElement.parentElement.querySelector(".pics_container").querySelector(".thumb2").src;
    let altText = a.parentElement.parentElement.querySelector(".pics_container").querySelector("img").alt;
    let item = {productName: productName, productPrice: productPrice, productImg: productImg, altText: altText};

    let shopList = JSON.parse(localStorage.getItem("shoppingCard"));
    if (shopList === null) shopList = [];

    shopList.push(item);
    localStorage.setItem("shoppingCard", JSON.stringify(shopList));

    updateCard();
}

function updateCard() {
    let shopList = JSON.parse(localStorage.getItem("shoppingCard"));
    if (shopList === null) return;

    let totalAmount = 0;

    let cartHTML = "";
    shopList.forEach((item, index) => {
        cartHTML += `
        <div class="cart_item">
            <img alt=${item.altText}  class="cart_img ob1" src=${item.productImg}>
            <p class="ob2">${item.productName}</p>
            <p class="cart_price ob3">A$${item.productPrice}</p>
            <button onclick="removeItem(${index}) "class="remove_item ob4">Remove</button>
        </div>
    `; 

    totalAmount += parseInt(item.productPrice);

    });

    document.querySelector(".cart_items").innerHTML = cartHTML;
    document.getElementById("total_amount").innerHTML = totalAmount;
    document.getElementById("itemsCount").innerHTML = shopList.length;
}

function removeItem(index) {
    let shopList = JSON.parse(localStorage.getItem("shoppingCard"));
    shopList.splice(index, 1);
    localStorage.setItem("shoppingCard", JSON.stringify(shopList));
    updateCard();
}

function changeImg(b) {
    document.querySelector(".main_img").src = b.src;
}