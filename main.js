btn.onclick = () => {
    fetch("https://world.openfoodfacts.org/api/v2/product/" + champ.value)
        .then(reponse => reponse.json())
        .then(reponse2 => {
            outputname.textContent = "";
            outputcode.textContent = "";
            outputcategorie.textContent = "";   
            outputcode.textContent = `Produit numero ${reponse2.code}`;
            outputname.textContent = `${reponse2.product.product_name}`;
            outputcategorie.textContent = `${reponse2.product.categories}`;
            const img = document.createElement("img");
            img.src = reponse2.product.image_url;
            img.width = "100;";
            outputimage.appendChild(img);

})}

btnsearch.onclick = () => {
    fetch("https://world.openfoodfacts.org/api/v2/search?categories_tags=" + search.value + "&fields=product_name")
    .then(search => search.json())
    .then(search2 => {
        output.textContent = "";
        output.textContent = JSON.parse(search2.products) ;
})
}  