            <?php
                require 'conector.php';

                $buscar = $_POST["buscar"] ?? null;
                $buscador = mysqli_query($conector, "SELECT hilos.*, usuarios.* 
                                                    FROM hilos 
                                                    JOIN usuarios 
                                                    ON usuarios.id = hilos.usuario 
                                                    WHERE hilos.nombre_Hilos
                                                    LIKE LOWER('%".$buscar."%')");

                while ($hilo = mysqli_fetch_assoc($buscador)) {    ?>
                       <?php $id2 = $hilo["ID"] ?>
                        <div class="hilos">
                        
                            <div class="informationPublic">
                                <div class="imgDiv">
                                    <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>" style="color:black;"><img src="<?php echo $hilo["image_user"]; ?>" alt="" class="pfHeader"></a>
                                </div>
                                <a href="conversacion.php?id=<?php echo $id2 ?>">
                                    <div class="txtHilo">
                                        <p class="titleHilo"><?php echo $hilo["nombre_Hilos"]; ?></p>
                                        <p><?php echo $hilo["descripcion"]; ?></p>
                                        <div class="boxInfo">
                                            <p class="date"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                            <img src="../image/fecha.png" alt="date" class="calendar">
                                        </div>
                                        <p class="nameUser"><?php echo $hilo["nombreUsuario"]; ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="comments">
                                <a href="conversacion.php?id=<?php echo $id2 ?>"><img src="../image/chateando.png" alt="comments" class="comments"></a>
                            </div>
                        </div>
            <?php } ?>
