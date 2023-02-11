let buttonAddProducts = document.querySelector('#buttonAddProducts');
buttonAddProducts?.addEventListener('onclick', addProducts);

let count = 0; 

function addProducts(){
    count++;
    let addingData = document.querySelector('#otherProducts');
    addingData.insertAdjacentHTML('beforeend', repeatProductsHTML() );
    console.log('hola');
}

function concessionairesOptios(){
    let htmlOption = '';
    concessionaires.forEach(concessioanre => {
        htmlOption += '<option value='+concessioanre.id+'>'+concessioanre.name+'</option>';
    });
    return htmlOption;
}

function repeatProductsHTML(){
    
    let htmlRepeat = '<div class="col-sm-3"><div class="form-floating"><select class="form-select" id="floatingProduct" name="products['+count+'][name]">';
    htmlRepeat += '<option selected disabled>-- Seleccionar --</option><option disabled class="bg-black text-bold text-white">Bebidas</option><option value="santa_teresa">Santa Teresa Linaje</option>';
    htmlRepeat += '<option value="old_par">Old Par 12</option><option value="buchanans_12">Buchanans 12</option><option value="buchanans_18">Buchanans 18</option><option value="diplomatico_re">Diplomatico R.E.</option>';
    htmlRepeat += '<option value="grey_goose">Grey Goose</option><option value="espumante">Espumante</option><option value="vino_blanco">Vino Blanco</option><option value="red_bull">Red Bull</option>';
    htmlRepeat += '<option value="agua_gasificada">Agua Gasificada</option><option value="refresco_lata">Refresco de Lata</option><option value="soda">Soda</option><option value="aguakina">AguaKina</option>';
    htmlRepeat += '<option value="agua">Agua</option><option disabled class="bg-black text-bold text-white">Alimentos</option><option value="sushi">Sushi</option><option value="tequeño">Tequeño</option>';
    htmlRepeat += '<option value="carpaccio_lomito">Carpaccio Lomito</option><option value="ceviche">Ceviche</option><option value="coctel_camarones">Coctel De Camarones</option><option value="pizza">Pizza</option></select><label for="floatingProduct">Alimentos y Bebidas</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><select class="form-select" id="floatingPrice" name="products['+count+'][price]">';
    htmlRepeat += '<option selected disabled>-- Seleccionar --</option><option disabled class="bg-black text-bold text-white">Bebidas</option><option value = 60 >USD 60</option><option value = 100 >USD 100</option><option value = 50 >USD 50</option>';
    htmlRepeat += '<option value = 20 >USD 20</option><option value = 7 >USD 7</option><option value = 5 >USD 5</option><option value = 3 >USD 3</option><option value = 1 >USD 1</option>';
    htmlRepeat += '<option disabled class="bg-black text-bold text-white">Alimentos</option><option value = 30 >30</option><option value = 12 >12</option><option value = 25 >25</option><option value = 20 >20</option></select><label for="floatingPrice">Precios</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><input type="number" class="form-control" id="quantitys" placeholder="Cantidad del Producto" name="products['+count+'][quantity]"><label for="quantity">Cantidad</label></div></div>';
    htmlRepeat += '<div class="col-sm-3"><div class="form-floating"><select class="form-select" id="floatingProduct" name="products['+count+'][concessionaire_id]">'+concessionairesOptios()+'<option selected disabled>-- Seleccionar --</option></select><label for="floatingProduct">Aliado Comercial</label></div></div>';

    return htmlRepeat;       

}