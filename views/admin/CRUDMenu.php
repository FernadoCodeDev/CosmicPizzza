<?php include_once __DIR__ . "/../templates/Navegacion.php" ?>

<?php if (isset($alertas) && !empty($alertas)): ?>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <?php endif; ?>

<h1>ADMINISTRADOR CRUD DEL MENÚ</h1>
<p><span class="TextElectricBlue">Crear,</span><span class="TextMustard"> Editar</span> y <span class="TextCrimsonRed">Eliminar</span> </p>


<div class="button-option">
    <a href="/Admin">
        <button class="BTGoback">Regresar</button>
    </a>

    <a href="/CreateMenu">
        <button class="BTCreate">Crear</button>
    </a>
</div>


<div id="appMenu" class="StepsCRUDMenu">
    <nav class="tabsCRUDMenu">
    
        <button class="CurrentMenu" type="button" data-stepmenu="1"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="price-tag" transform="rotate(270)">
                <path d="M20,2H14a1,1,0,0,0-.7.29L3,12.55a2,2,0,0,0,0,2.83L8.62,21a2,2,0,0,0,1.41.59h0A2,2,0,0,0,11.45,21L21.71,10.7A1,1,0,0,0,22,10V4A2,2,0,0,0,20,2ZM16.5,9A1.5,1.5,0,1,1,18,7.5,1.5,1.5,0,0,1,16.5,9Z" />
            </svg></button>

        <button type="button" data-stepmenu="2"><svg data-step="2" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M441.82,67.83l0,0C383.44,44.73,317.3,32,255.56,32,192,32,125.76,44.53,69,67.26,48.7,75.49,45.21,90,48.71,100.82L52.78,111a16,16,0,0,0,21.31,8.69c10.8-4.76,23.93-10.54,27-11.78C145.1,89.64,198.71,80,256,80c57.47,0,108.09,9.24,154.76,28.25h0c4.42,1.8,14.88,6.42,26.17,11.46a16,16,0,0,0,21.35-8.59L462,102l.34-.9C465.79,90.89,462.48,76.05,441.82,67.83Z" />
                <path d="M409.18,140.86C363.67,122.53,307.68,112,255.56,112a425,425,0,0,0-153.74,28.89c-.53.21-2.06.88-4.29,1.88a16,16,0,0,0-8,21.27c4,8.71,9.42,20.58,15.5,33.89C137.94,270,199.21,404,227.26,462A31.74,31.74,0,0,0,256,480h0a31.73,31.73,0,0,0,28.76-18.06l.06-.13,137.3-297.57a15.94,15.94,0,0,0-8.31-21.45c-2.26-.95-3.85-1.61-4.5-1.87Zm-215.1,83.07a32,32,0,1,1,29.85-29.85A32,32,0,0,1,194.08,223.93Zm64,128a32,32,0,1,1,29.85-29.85A32,32,0,0,1,258.08,351.93Zm64-112a32,32,0,1,1,29.85-29.85A32,32,0,0,1,322.08,239.93Z" />
            </svg></button>

        <button type="button" data-stepmenu="3"><svg data-step="3" viewBox="0 0 32 32" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M28.76,3.24C28.25,1.91,26.96,1,25.5,1C23.57,1,22,2.57,22,4.5c0,0.58,0.16,1.15,0.43,1.65l-2.86,2.86   C14.82,7.4,7.06,10.8,3.93,13.93c-3.9,3.9-3.9,10.24,0,14.14C5.88,30.02,8.44,31,11,31s5.12-0.98,7.07-2.92   c3.13-3.13,6.53-10.89,4.91-15.64l2.86-2.86C26.35,9.84,26.92,10,27.5,10c1.93,0,3.5-1.57,3.5-3.5C31,5.04,30.09,3.75,28.76,3.24z" />
            </svg></button>

        <button type="button" data-stepmenu="4"><svg data-step="4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.8 489.8" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <g>
                                <rect y="367.7" width="489.8" height="94.9" />
                                <rect y="183.5" width="489.8" height="84.7" />
                                <path d="M417.1,27.2L28,163.7h461.4C486.3,113.5,460.3,67.2,417.1,27.2z" />
                            </g>
                        </g>
                        <path d="M377.5,348.1c-15.9,0-30.8-6.2-42-17.4c-13.4-13.4-35.2-13.4-48.5,0c-11.2,11.2-26.1,17.4-42,17.4s-30.8-6.2-42-17.4c-13.4-13.4-35.2-13.4-48.5,0c-11.2,11.2-26.1,17.4-42,17.4s-30.8-6.2-42-17.4c-13.4-13.4-35.2-13.4-48.5,0c-4.9,4.9-12.8,4.9-17.7,0s-4.9-12.8,0-17.7c23.2-23.2,60.9-23.2,84,0c6.5,6.5,15.1,10.1,24.3,10.1s17.8-3.6,24.3-10.1c23.2-23.2,60.9-23.2,84,0c6.5,6.5,15.1,10.1,24.3,10.1c9.2,0,17.8-3.6,24.3-10.1c23.2-23.2,60.9-23.2,84,0c6.5,6.5,15.1,10.1,24.3,10.1c9.2,0,17.8-3.6,24.3-10.1c23.2-23.2,60.9-23.2,84,0c4.9,4.9,4.9,12.8,0,17.7c-4.9,4.9-12.8,4.9-17.7,0c-13.4-13.4-35.2-13.4-48.5,0C408.2,341.9,393.3,348.1,377.5,348.1z" />
                    </g>
                </g>
                </fill=>
            </svg></button>

    </nav>

  
    <div id="stepMenu-1" class="seccionCRUDMenu ShowCRUDMenu">
    <p>Promociónes cósmicas diseñadas para conquistar cualquier galaxia de antojos</p>
    <h2>Promoción</h2>
        <div class="contenedor-anuncios">
            <?php if (isset($product) && !empty($product)) { ?>
                <?php foreach ($product as $producto) { ?>
                    <?php if ($producto->tipo === 'promocion') : ?>
                        <div class="anuncioCURD">
                            <img src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->imagen); ?>">
                            <div class="contenido-anuncio">
                                <h1><?php echo htmlspecialchars($producto->nombre); ?></h1>
                                <p><?php echo htmlspecialchars($producto->descripcion); ?></p>
                                <button type="button" class="Buttom-Precio">
                                    $<?php echo htmlspecialchars($producto->precio); ?>
                                </button>
                            </div>
                            <div class="UpdateAndDelete">
                                <a href="/UpdateMenu?id=<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTUpdate">Actualizar</button>
                                </a>

                                <form action="/CRUDMenu" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTDelete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            <?php } else { ?>
                <p><?php echo $NoProduct; ?></p>
            <?php } ?>
        </div>
    </div>

    <div id="stepMenu-2" class="seccionCRUDMenu">
    <p>Pizzas intergalácticas que harán despegar tu apetito al infinito y más alla</p>
    <h2>Pizza</h2>
        <div class="contenedor-anuncios">
            <?php if (isset($product) && !empty($product)) { ?>
                <?php foreach ($product as $producto) { ?>
                    <?php if ($producto->tipo === 'pizza') : ?>
                        <div class="anuncioCURD">
                            <img src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->imagen); ?>">
                            <div class="contenido-anuncio">
                                <h1><?php echo htmlspecialchars($producto->nombre); ?></h1>
                                <p><?php echo htmlspecialchars($producto->descripcion); ?></p>
                                <button type="button" class="Buttom-Precio">
                                    $<?php echo htmlspecialchars($producto->precio); ?>
                                </button>
                            </div>
                            <div class="UpdateAndDelete">
                                <a href="/UpdateMenu?id=<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTUpdate">Actualizar</button>
                                </a>
                                
                                <form action="/CRUDMenu" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTDelete">Eliminar</button>
                                </form>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            <?php } else { ?>
                <p><?php echo $NoProduct; ?></p>
            <?php } ?>
        </div>
    </div>

    <div id="stepMenu-3" class="seccionCRUDMenu">
    <p>Sabores estelares que orbitan alrededor de tu planeta principal</p>
    <h2>Complementos</h2>
        <div class="contenedor-anuncios">
            <?php if (isset($product) && !empty($product)) { ?>
                <?php foreach ($product as $producto) { ?>
                    <?php if ($producto->tipo === 'complemento') : ?>
                        <div class="anuncioCURD">
                            <img src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->imagen); ?>">
                            <div class="contenido-anuncio">
                                <h1><?php echo htmlspecialchars($producto->nombre); ?></h1>
                                <p><?php echo htmlspecialchars($producto->descripcion); ?></p>
                                <button type="button" class="Buttom-Precio">
                                    $<?php echo htmlspecialchars($producto->precio); ?>
                                </button>
                            </div>
                            <div class="UpdateAndDelete">
                                <a href="/UpdateMenu?id=<?php echo htmlspecialchars($producto->id); ?>"> <!--Update donde se tiene que llevar estos datos-->
                                    <button class="BTUpdate">Actualizar</button>
                                </a>

                                <form action="/CRUDMenu" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTDelete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            <?php } else { ?>
                <p><?php echo $NoProduct; ?></p>
            <?php } ?>
        </div>
    </div>

    <div id="stepMenu-4" class="seccionCRUDMenu">
    <p>Grandes eclipses que te transportarán a otro universo de placer</p>
    <h2>Postres</h2>
        <div class="contenedor-anuncios">
            <?php if (isset($product) && !empty($product)) { ?>
                <?php foreach ($product as $producto) { ?>
                    <?php if ($producto->tipo === 'postre') : ?>
                        <div class="anuncioCURD">
                            <img src="ImagenBD/<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->imagen); ?>">
                            <div class="contenido-anuncio">
                                <h1><?php echo htmlspecialchars($producto->nombre); ?></h1>
                                <p><?php echo htmlspecialchars($producto->descripcion); ?></p>
                                <button type="button" class="Buttom-Precio">
                                    $<?php echo htmlspecialchars($producto->precio); ?>
                                </button>
                            </div>
                            <div class="UpdateAndDelete">
                                <a href="/UpdateMenu?id=<?php echo htmlspecialchars($producto->id); ?>"> <!--Update donde se tiene que llevar estos datos-->
                                    <button class="BTUpdate">Actualizar</button>
                                </a>

                                <form action="/CRUDMenu" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->id); ?>">
                                    <button class="BTDelete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            <?php } else { ?>
                <p><?php echo $NoProduct; ?></p>
            <?php } ?>
        </div>
    </div>


</div>

<script>
    let menu = 1;

    document.addEventListener('DOMContentLoaded', function() {
        startappMenu();
    });

    const startappMenu = () => {
        MenuSection();
        tabsCRUDMenu();
    }

    const MenuSection = () => {
        const MenuSecciones = document.querySelectorAll('.seccionCRUDMenu');
        MenuSecciones.forEach(Menuseccion => {
            Menuseccion.classList.remove('ShowCRUDMenu');
        });

        const MenuActual = document.querySelector(`#stepMenu-${menu}`);
        MenuActual.classList.add('ShowCRUDMenu');

        const MenuFormer = document.querySelector('.CurrentMenu');
        if (MenuFormer) {
            MenuFormer.classList.remove('CurrentMenu');
        }

        const Menu = document.querySelector(`[data-stepmenu="${menu}"]`);
        Menu.classList.add('CurrentMenu');
    }

    const tabsCRUDMenu = () => {
        const buttons = document.querySelectorAll('.tabsCRUDMenu button');
        buttons.forEach(bt => {
            bt.addEventListener('click', function(e) {
                menu = parseInt(e.target.dataset.stepmenu); 
                MenuSection();
            });
        });
    }
</script>

<?php include_once __DIR__ . "/../templates/FooterSecundario.php" ?>

<script src="build/js/bundle.min.js"></script>

</body>

</html>