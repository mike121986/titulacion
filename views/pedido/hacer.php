<div class="container">
	<div class="form-group">
		<?php if (isset($_SESSION['identity'])): ?>
			<h2>Hacer pedido</h2>
			<p>
				<a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
			</p>

			<h3>Dirección para el envio:</h3>
			<form action="<?=base_url.'pedido/add'?>" method="POST" id="frm-direccion-Pedido">
			<div class="row">
				<div class="col">
					<label for="calle">Calle</label>
					<input type="text" id="calle" name="calle" class="form-control">
				</div>
				<div class="col">
				<label for="numero">Número</label>
					<input type="text" id="numero" name="numero" class="form-control" >
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="estado">Estado</label>
					<select name="selectEstado" id="selectEstado" class="form-control selectEstado">    
					<option value="0">Seleccione un estado</option>
						<?php while ($estado = $edo->fetch_object()) :?>
							<option value="<?=$estado->idEstado?>"><?=$estado->estado?></option>
						<?php endwhile;?>
                    </select>
				</div>
				<div class="col">
					<label for="municipio">Municipio</label>
					<select name="selectMunicipio" id="selectMunicipio" class="form-control selectMunicipio">
						<option>Large select</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="cp">Cp</label>
					<input type="text" name="cp" id="cp" class="form-control">
				</div>
				<div class="col">
					<label for="atencion">horario antención</label>
					<input type="text" id="atencion" class="form-control" name="atencion"/>				
				</div>
			</div>
			<!-- <div class="row"> -->
			<div class="form-group">
				<label for="referencia">Referencias</label>
				<textarea class="form-control" id="referencia" name="referencia" rows="3"></textarea>
			</div>

			<input type="submit" class="btn btn-success" id="enviarInfoPedido" value="Confirmar pedido" />
		<!-- 	</div> -->
				<!-- <label for="provincia">Provincia</label>
				<input type="text" class="form-control" name="provincia" required />

				<label for="ciudad">Ciudad</label>
				<input type="text" class="form-control" name="localidad" required />

				<label for="direccion">Dirección</label>
				<input type="text" class="form-control" name="direccion" required />

				<input type="submit" value="Confirmar pedido" /> -->
			</form>
		<?php else: ?>
			<h1>Necesitas estar identificado</h1>
			<p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
		<?php endif; ?>
	</div>
</div>



