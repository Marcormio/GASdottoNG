<table class="table">
	<thead>
		<tr>
			<th width="18%">Prodotto</th>
			<th width="13%">Prezzo</th>
			<th width="13%">Trasporto</th>
			<th width="13%">Unità di Misura</th>
			<th width="9%">Quantità Ordinata</th>
			<th width="9%">Totale Prezzo</th>
			<th width="9%">Totale Trasporto</th>
			<th width="9%">Quantità Consegnata</th>
			<th width="9%">Note</th>
		</tr>
	</thead>
	<tbody>
		<?php $summary = $order->calculateSummary() ?>

		@foreach($order->products as $product)
		<tr>
			<td>
				<input type="hidden" name="productid[]" value="{{ $product->id }}" />
				<label>{{ $product->printableName() }}</label>
			</td>
			<td>
				<div class="input-group">
					<input class="form-control" name="productprice[]" value="{{ $product->price }}" />
					<div class="input-group-addon">€</div>
				</div>
			</td>
			<td>
				<div class="input-group">
					<input class="form-control" name="producttransport[]" value="{{ $product->transport }}" />
					<div class="input-group-addon">€</div>
				</div>
			</td>
			<td><label>{{ $product->measure->printableName() }}</label></td>

			<td><label>{{ $summary->products[$product->id]['quantity'] }}</label></td>
			<td><label>{{ $summary->products[$product->id]['price'] }} €</label></td>
			<td><label>{{ $summary->products[$product->id]['transport'] }} €</label></td>
			<td><label>{{ $summary->products[$product->id]['delivered'] }}</label></td>
			<td><label>{{ $summary->products[$product->id]['notes'] }}</label></td>
		</tr>
		@endforeach
	</tbody>
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>{{ $summary->price }} €</th>
			<th>{{ $summary->transport }} €</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
</table>