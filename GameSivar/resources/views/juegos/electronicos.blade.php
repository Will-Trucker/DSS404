<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>



  <style>
body {
    font-family: Arial, sans-serif;
    background-color: #4C4CFF; /* Ajusta al color de fondo deseado */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    overflow: auto; /* Permite scroll si es necesario */
}

.games-container {
    display: flex;
    flex-wrap: wrap; /* Permite que los elementos se ajusten en filas */
    justify-content: space-around; /* Distribuye el espacio alrededor de los elementos */
    align-items: center; /* Alinea verticalmente */
    width: 100%; /* Usa todo el ancho disponible */
    max-width: 960px; /* Máximo ancho del contenedor */
    margin: 20px; /* Margen alrededor del contenedor */
    gap: 40px; /* Aumenta el espacio entre las cajas */
}

.game-box {
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    width: 300px; /* Ancho de cada caja */
    height: 200px; /* Altura de cada caja */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
}

.game-box h2 {
    background: linear-gradient(145deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2));
    padding: 5px 10px;
    font-size: 20px;
    border-radius: 2px;
}

.game-box {
    transition: transform 0.3s ease; /* Agrega una transición suave */
}

.game-box:hover {
    transform: scale(1.05); /* Agrandar el recuadro al pasar el mouse */
    cursor: pointer; /* Cambia el cursor a una mano para indicar clic */
}


  </style>



  <body>
  <div class="games-container">
        <!-- Fila Superior -->
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
        <!-- Fila Inferior -->
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
        <div class="game-box" style="background-image: url('https://img.freepik.com/psd-gratis/fondo-banner-blanco-juegos_23-2150390433.jpg?size=626&ext=jpg&ga=GA1.1.867424154.1712275200&semt=ais');">
            <h2>Juego Electrónico</h2>
        </div>
    </div>


    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
