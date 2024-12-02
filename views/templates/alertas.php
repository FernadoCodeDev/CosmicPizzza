<?php if (!empty($alertas)): ?>
    <?php foreach ($alertas as $key => $mensajes): ?>
        <?php if (is_array($mensajes)): ?>
            <?php foreach ($mensajes as $mensaje): ?>
                <div class="alerta <?php echo $key; ?>">
                    <?php echo $mensaje; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
