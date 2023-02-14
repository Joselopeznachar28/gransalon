let buttonAddProducts = document.querySelector('#buttonAddProducts');
buttonAddProducts?.addEventListener('onclick', addProducts);

function changeProducts(index = 0){
    console.log(index);
    const select = document.getElementById('floatingProduct'+index);
    const selecteValue = select.value;
    const product = products.find(item => item.id === +selecteValue);
    console.log(product);
    products.find( (item) => {
        console.log(item.id === selecteValue);
    });
    if (product) {
        const floatingPrice = document.getElementById('floatingPrice'+index);
        console.log(floatingPrice);
        floatingPrice.value = product.price;
    }
}

function changeTotal(index = 0) {
    const floatingQuantity = document.getElementById('floatingQuantity'+index);
    const floatingPrice = document.getElementById('floatingPrice'+index);
    const floatingTotalProduct = document.getElementById('floatingTotalProduct'+index);

    const quantity = floatingQuantity.value;
    const price = floatingPrice.value;

    if (quantity && price && quantity>0 && price>0) {
        floatingTotalProduct.value = +price * +quantity;
    }
    calculateTotalSale();
}

let count = 0; 

function addProducts(){
    count++;
    let addingData = document.querySelector('#otherProducts');
    addingData.insertAdjacentHTML('beforeend', repeatProductsHTML() );
}

function productsOptios(){
    let htmlOption = '';
    products.forEach(product => {
        htmlOption += '<option value='+product.id+'>'+product.name+'</option>';
    });
    return htmlOption;
}

function calculateTotalSale(){
    let total = 0;
    for (let i = 0; i <= count; i++) {
        const floatingTotalProduct = document.getElementById('floatingTotalProduct'+i);
        console.log(floatingTotalProduct)
        if (floatingTotalProduct && floatingTotalProduct.value > 0) {
            total += +floatingTotalProduct.value
        }
    }

    const totalSale = document.getElementById('totalSale');
    if (totalSale) {
        totalSale.innerHTML = total;
    }
}

function repeatProductsHTML(){
    
    let htmlRepeat = '<div class="col-sm-3"><div class="form-floating"><select class="form-select" onchange="changeProducts('+count+')" id="floatingProduct'+count+'" name="products['+count+'][product_id]">';
    htmlRepeat += '<option selected disabled>-- Seleccionar --</option>'+productsOptios()+'</select><label for="floatingProduct">Alimentos y Bebidas</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><input class="form-control" id="floatingPrice'+count+'" onchange="changeTotal('+count+')" name="products['+count+'][price]" readonly>';
    htmlRepeat += '<label for="floatingPrice'+count+'">Precio</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><input type="number" class="form-control" id="floatingQuantity'+count+'"onchange="changeTotal('+count+')" placeholder="Cantidad del Producto" name="products['+count+'][quantity]"><label for="floatingQuantity'+count+'">Cantidad</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><input class="form-control" readonly id="floatingTotalProduct'+count+'"  name="products['+count+'][totalToProducts]"><label for="floatingTotalProduct'+count+'">Total</label></div></div>';

    return htmlRepeat;       

}