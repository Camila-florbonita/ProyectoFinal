
<?PHP

session_start();

include "database.php";

//$id_us = $_SESSION["id_us"];
$id_us = 4;

    $query = "SELECT * from entrega WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 
    

    $query2 = "SELECT * from usuarios WHERE id_usuario = '$id_us'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);

    if($registro = mysqli_fetch_array($result))
    {
    echo '<div id="ConfC">
    <form class="formularioConfiguracion" action="ConfiguracionCuenta.php" method="post">
        <h2 class="labelConfigurar">
            Información de la cuenta
        </h2>
        <div class="contenedor">
            
            <h3 class="labelSeccion">
                Cambiar nombre
            </h3>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Nombre:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="nombre" value="', $registro2["nombre_usuario"], '">
                    </div>

                </div>

            </div>
            <h3 class="labelSeccion">
                Actualizar datos de envío
            </h3>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Dirección:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="direccion"  value="', $registro["direccion"], '">
                    </div>

                </div>

            </div>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Número exterior:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="nexterior"  value="', $registro["n_ext"], '">
                    </div>

                </div>

            </div>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Número interior:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="ninterior" value="', $registro["n_int"], '">
                    </div>

                </div>

            </div>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Número de teléfono:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="telefono" maxlength="10" minlength="10" value="', $registro["telefono"], '">
                    </div>

                </div>

            </div>
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Código postal:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="cpostal" maxlength="5" minlength="5" value="', $registro["cp"], '">
                    </div>

                </div>

            </div>
            
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">
                        Estado: 
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <select class="input" name="estado" id="estado">
                            <option value="aguascalientes">Aguascalientes</option>
                            <option value="bcnorte">Baja California Norte</option>
                            <option value="bcsur">Baja California Sur</option>
                            <option value="campeche">Campeche</option>
                            <option value="chiapas">Chiapas</option>
                            <option value="chihuahua">Chihuahua</option>
                            <option value="cdmx">Ciudad de Mexico</option>
                            <option value="coahuila">Coahuila</option>
                            <option value="colima">Colima</option>
                            <option value="durango">Durango</option>
                            <option value="edmx">Estado de Mexico</option>
                            <option value="guerrero">Guerrero</option>
                            <option value="hidalgo">Hidalgo</option>
                            <option value="jalisco">Jalisco</option>
                            <option value="michoacan">Michoacan</option>
                            <option value="morelia">Morelia</option>
                            <option value="morelos">Morelos</option>
                            <option value="nayarit">Nayarit</option>
                            <option value="nleon">Nuevo Leon</option>
                            <option value="oaxaca">Oaxaca</option>
                            <option value="puebla">Puebla</option>
                            <option value="queretaro">Queretaro</option>
                            <option value="quintanar">Quintana Roo</option>
                            <option value="slpotosi">San Luis Potosi</option>
                            <option value="sinaloa">Sinaloa</option>
                            <option value="sonora">Sonora</option>
                            <option value="tabasco">Tabasco</option>
                            <option value="tamaulipas">Tamaulipas</option>
                            <option value="tlaxcala">Tlaxcala</option>
                            <option value="veracruz">Veracruz</option>
                            <option value="yucatan">Yucatan</option>
                            <option value="zacatecas">Zacatecas</option>     
                        </select>

                    </div>

                </div>
            </div>
            
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Municipio:
                    </p>

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="municipio" value="', $registro["municipio"], '">
                    </div>

                </div>
            </div>
            
            <div class="fila">
                <div class="columna">
                    <p class="labelDatos">Instrucciones de entrega:
                    </p>                

                </div>
                <div class="columna">
                    <div class="input-contenedor">
                        <input class="input" type="text" name="insdeentrega" value="', $registro["instentrega"], '">
                    </div>

                </div>
            </div>
            
            <div class="boton">
                <button class="botonGuardar" type="submit">
                    Guardar cambios
                </button>

            </div>
        </div>
    </form>
    </div>';
    }
    else
    {
        echo '<div id="confC">
        <form class="formularioConfiguracion" action="ConfiguracionCuenta.php" method="post">
            <h2 class="labelConfigurar">
                Información de la cuenta
            </h2>
            <div class="contenedor">
                
                <h3 class="labelSeccion">
                    Cambiar nombre
                </h3>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Nombre:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="nombre">
                        </div>

                    </div>

                </div>
                <h3 class="labelSeccion">
                    Actualizar datos de envío
                </h3>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Dirección:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="direccion">
                        </div>

                    </div>

                </div>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Número exterior:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="nexterior">
                        </div>

                    </div>

                </div>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Número interior:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="ninterior">
                        </div>

                    </div>

                </div>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Número de teléfono:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="telefono" maxlength="10" minlength="10">
                        </div>

                    </div>

                </div>
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Código postal:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="cpostal" maxlength="5" minlength="5">
                        </div>

                    </div>

                </div>
                
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">
                            Estado: 
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <select class="input" name="estado" id="estado">
                                <option value="aguascalientes">Aguascalientes</option>
                                <option value="bcnorte">Baja California Norte</option>
                                <option value="bcsur">Baja California Sur</option>
                                <option value="campeche">Campeche</option>
                                <option value="chiapas">Chiapas</option>
                                <option value="chihuahua">Chihuahua</option>
                                <option value="cdmx">Ciudad de Mexico</option>
                                <option value="coahuila">Coahuila</option>
                                <option value="colima">Colima</option>
                                <option value="durango">Durango</option>
                                <option value="edmx">Estado de Mexico</option>
                                <option value="guerrero">Guerrero</option>
                                <option value="hidalgo">Hidalgo</option>
                                <option value="jalisco">Jalisco</option>
                                <option value="michoacan">Michoacan</option>
                                <option value="morelia">Morelia</option>
                                <option value="morelos">Morelos</option>
                                <option value="nayarit">Nayarit</option>
                                <option value="nleon">Nuevo Leon</option>
                                <option value="oaxaca">Oaxaca</option>
                                <option value="puebla">Puebla</option>
                                <option value="queretaro">Queretaro</option>
                                <option value="quintanar">Quintana Roo</option>
                                <option value="slpotosi">San Luis Potosi</option>
                                <option value="sinaloa">Sinaloa</option>
                                <option value="sonora">Sonora</option>
                                <option value="tabasco">Tabasco</option>
                                <option value="tamaulipas">Tamaulipas</option>
                                <option value="tlaxcala">Tlaxcala</option>
                                <option value="veracruz">Veracruz</option>
                                <option value="yucatan">Yucatan</option>
                                <option value="zacatecas">Zacatecas</option>     
                            </select>

                        </div>

                    </div>
                </div>
                
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Municipio:
                        </p>

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="municipio">
                        </div>

                    </div>
                </div>
                
                <div class="fila">
                    <div class="columna">
                        <p class="labelDatos">Instrucciones de entrega:
                        </p>                

                    </div>
                    <div class="columna">
                        <div class="input-contenedor">
                            <input class="input" type="text" name="insdeentrega">
                        </div>

                    </div>
                </div>
                
                <div class="boton">
                    <button class="botonGuardar" type="submit">
                        Guardar cambios
                    </button>

                </div>
            </div>
        </form>
        </div>';
    }


?>

