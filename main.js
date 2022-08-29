
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
    fetch("https://world.openfoodfacts.org/api/v2/search?categories_tags=" + search.value)
    .then(search => search.json())
    .then(search2 => {
        output.textContent = "";
        output.textContent = JSON.parse(search2.products) ;
})
}  
/*
function get_users(pageid)
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://fr.openfoodfacts.org?json=true&page="+pageid, true);
    xhr.onload = function()
    {
        var html = '';
        if( xhr.status == 200 )
        {
            var response = JSON.parse(xhr.response);
            var page_number = response.page; 
            var total_pages = response.page_count;	
            var data = response.products;
            //html = '<table>'; 
            //html+='<tr>'; 
            html = '<div class="container-fluid">';    
            html += '<div class="row">';
            for(let i=0;i<data.length;i++)
            {
                current_user = data[i];
                //html += ' <td><fieldset><legend><strong>' + current_user.product_name  + '</a><img src="'+ current_user.image_url + '" /></fieldset></td>';
                if(i % 4 == 0){
                    //html += '</tr>';
                    html += '</div>';
                    html += '<div class="row">';
                    //html += '<tr>';  
                }
                html += ' <div class="col-6 col-md-3" id="colonne">' + '<img src="'+ current_user.image_url + '" / height="300" width="250"><br>'+ '<div id="qte">' + current_user.quantity + '</div>' +'&nbsp;' +current_user.product_name + '&nbsp;'+ current_user.brands +'</div>';
 
            }
            html +='</div>';

            var next_page = page_number < total_pages ? ' - <a onclick="return get_users(' + (page_number + 1) + '); return false;" href="javascript:none">Page suivante</a>' : ''; 
			var previous_page = page_number > 1 ? '<a onclick="return get_users(' + (page_number - 1) + '); return false;" href="javascript:none">Page précédente</a> - ' : '';

            html += '<div class="page_info">' + previous_page + 'Page <strong>' + page_number + '</strong>/<strong>' + total_pages + '</strong>' + next_page + '</div>';
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
        //html+='</table>';
        document.getElementById("js_result").innerHTML = html;
    };
    xhr.send();
    
}
*/
btn.onclick = () =>
{
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://fr.openfoodfacts.org?json=true&code="+ champ.value, true);
    xhr.onload = function()
    {
        var html = '';
        if( xhr.status == 200)
        {
            var response = JSON.parse(xhr.response);
            var page_number = response.page; 
            var total_pages = response.page_count;	
            var data = response.products;

            html = '<div class="container-fluid">';    
            html += '<div class="row">';

            for(let i=0;i<data.length;i++)
            {
                current_user = data[i];
                //html += ' <td><fieldset><legend><strong>' + current_user.product_name  + '</a><img src="'+ current_user.image_url + '" /></fieldset></td>';
                if(i % 4 == 0){
                    //html += '</tr>';
                    html += '</div>';
                    html += '<div class="row">';
                    //html += '<tr>';  
                }
                html += ' <div class="col-6 col-md-3" id="colonne">' + '<img src="'+ current_user.image_url + '" / height="300" width="250"><br>'+ '<div id="qte">' + current_user.quantity + '</div>' +'&nbsp;' +current_user.product_name + '&nbsp;'+ current_user.brands +'</div>';
 
            }
            html +='</div>';

            var next_page = page_number < total_pages ? ' - <a onclick="return get_users(' + (page_number + 1) + '); return false;" href="javascript:none">Page suivante</a>' : ''; 
			var previous_page = page_number > 1 ? '<a onclick="return get_users(' + (page_number - 1) + '); return false;" href="javascript:none">Page précédente</a> - ' : '';

            html += '<div class="page_info">' + previous_page + 'Page <strong>' + page_number + '</strong>/<strong>' + total_pages + '</strong>' + next_page + '</div>';
        }
        document.getElementById("js_one").innerHTML = html;
    }
    xhr.send();
}