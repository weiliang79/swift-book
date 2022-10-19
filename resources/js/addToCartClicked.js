function addToCartClicked(url) {

    //TODO: check url if wrong
    axios.post(url)
        .then(response => {
            alert('Book successful add to cart with ' + response.data.cart.quantity + ' Quantity.');
            window.location.reload();
        })
        .catch(error => {
            console.log(error);
            //TODO: change error message
            alert('Error during add to cart.');
        });
}

function addToCartClickedDetailPage(url) {
    axios.post(url)
        .then(response => {
            alert('Book successful add to cart with ' + response.data.cart.quantity + ' Quantity.');
            document.getElementById('addToCartBtn').disabled = true;
        }).catch(error => {
            console.log(error);
            //TODO: change error message
            alert("Error during add to cart.");
        });
}

window.addToCartClicked = addToCartClicked
window.addToCartClickedDetailPage = addToCartClickedDetailPage