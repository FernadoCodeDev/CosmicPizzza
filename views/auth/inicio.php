<body>
    <?php include_once __DIR__ . "/../templates/header.php"; ?>
    <?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>
    <section class="Info-boxes">
        <div class="Paintings">
            <div class="ChartNo1">
                <img src="Image/Chart 1.webp" alt="Chart 1">
            </div>
            <div class="ChartNo2">
                <img src="Image/Chart 2.webp" alt="Chart 2">
            </div>
            <div class="ChartNo3">
                <img src="Image/Chart 3.webp" alt="Chart 3">
            </div>
            <div class="ChartNo4">
                <img src="Image/Chart 4.webp" alt="Chart 4">
            </div>
            <div class="ChartNo5">
                <img src="Image/Chart 5.webp" alt="Image Carousel No.5">
            </div>
        </div>
    </section>

    <!--Slider-->
    <section class="Fondo-Secundario">
        <div class="Overplay-Secundario">
            <h2>Disfruta</h2>
            <p>De un sabor cosmico</p>
        </div>

        <div class="carousel">
            <div class="carousel-images">
                <img src="Image/Image Carousel No.1.webp" alt="Image Carousel No.1" class="active">
                <img src="Image/Image Carousel No.2.webp" alt="Image Carousel No.2">
                <img src="Image/Image Carousel No.3.webp" alt="Image Carousel No.2">
                <img src="Image/Image Carousel No.4.webp" alt="Image Carousel No.2">
                <img src="Image/Image Carousel No.5.webp" alt="Image Carousel No.2">
            </div>

            <button class="prev">
                <img src="Image/Pizza Arrow Left.webp" alt="Pizza Arrow Left">
            </button>
            <button class="next">
                <img src="Image/Right Pizza Arrow.webp" alt="Right Pizza Arrow">
            </button>
        </div>
    </section>

    <?php include_once __DIR__ . "/../auth/paginatorMenu.php"; ?>
    <?php include_once __DIR__ . "/../templates/FooterPrincipal.php"; ?>
    <script src="build/js/bundle.min.js"></script>

</body>
</html>