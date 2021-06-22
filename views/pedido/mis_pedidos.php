<?php if (isset($gestion)): ?>
	<h1>Gestionar pedidos</h1>
<?php else: ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<table class="table table-hover TableGenerica">
	<thead>
		<tr>
			<th>Nº Pedido</th>
			<th>Coste</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>acción</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($ped = $pedidos->fetch_object()):
			?>
	
			<tr>
				<td>
					<p><?= $ped->id ?></p>
				</td>
				<td>
					$ <?= $ped->coste ?> 
				</td>
				<td>
					<?= $ped->fecha ?>
				</td>
				<td>
					<?=Utils::showStatus($ped->estado)?>
				</td>
				<td>
					<a class="btn btn-success" href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><p style="color:#FFFFFF;">VER</p></a>
				</td>
			</tr>

	
		<?php endwhile; ?>
	</tbody>
</table>