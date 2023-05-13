function searchProducts() {
    const searchText = document.getElementById('search').value;
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';
    
    fetch(`search-products.php?search=${searchText}`)
      .then(response => response.json())
      .then(products => {
        products.forEach(product => {
          const productDiv = document.createElement('div');
          productDiv.innerHTML = `
            <h3>${product.Nombre}</h3>
            <p>${product.Descripcion}</p>
            <p>Stock: ${product.Stock}</p>
            <p>Precio de venta: ${product.PrecioVenta}</p>
          `;
          productList.appendChild(productDiv);
        });
      });
  }
  