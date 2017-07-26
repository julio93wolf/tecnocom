<?php
	include_once('../tecnocom.class.php');
	if (isset($_GET['id_compra'])) {
		$paramCompra['id_compra']=$_GET['id_compra'];
		$datoCarrito=$tecnocom->consultar('select * from vw_compras where id_compra=:id_compra',$paramCompra);
		require_once($_SERVER['DOCUMENT_ROOT'].'/tecnocom/vendor/autoload.php');
		$subtotal=0;
		$content = '<page>';

			$content.= '<style>';
			$content.= 'img {width:100%}';
			$content.= 'table{
										border-collapse: collapse;
										margin-bottom: 50px;
									}';
			$content.= '.dato70{
										text-align: left;
										width: 70%;
									}';				
			$content.= '.dato30{
										text-align: left;
										width: 30%;
										height: 20px;
									}';
			$content.= '.title40{
										text-align: left;
										width: 40%;
									}';
			$content.= '.title20{
										text-align: left;
										width: 20%;
									}';								
			$content.= '.title15{
										text-align: left;
										width: 15%;
									}';
			$content.= '.title15l{
										text-align: right;
										width: 15%;
									}';				
			$content.= '.title10{
										text-align: center;
										width: 10%;
									}';				
			$content.= '</style>';

			$content.= '<img src="../../images/banner_tecnocom.png" alt="Logo" />';
			$content.= '<table>';
				$content.= '<tr>';
					$content.= '<td class="dato70"> Nombre: '.$datoCarrito[0]['nombre'].'</td>';
					$content.= '<td class="dato30">Fecha: '.$datoCarrito[0]['fecha'].'</td>';
				$content.= '</tr>';
				$content.= '<tr>';
					$content.= '<td class="dato70">Direccion: '.$datoCarrito[0]['domicilio'].'</td>';
					$content.= '<td class="dato30">Telefono: '.$datoCarrito[0]['telefono'].'</td>';
				$content.= '</tr>';
			$content.= '</table>';

			$content.= '<table>';
				$content.= '<tr>';
					$content.= '<th class="title10">Cantidad</th>';
					$content.= '<th class="title15">SKU</th>';
					$content.= '<th class="title40">Producto</th>';
					$content.= '<th class="title20">Modelo</th>';
					$content.= '<th class="title15l">Precio</th>';
				$content.= '</tr>';
				foreach ($datoCarrito as $key => $value) {
					$content.= '<tr>';
						$content.= '<td class="title10">'.$value['cantidad'].'</td>';
						$content.= '<td class="title15">'.$value['sku'].'</td>';
						$content.= '<td class="title40">'.$value['producto'].'</td>';
						$content.= '<td class="title20">'.$value['modelo'].'</td>';
						$content.= '<td class="title15l">'.$value['precio'].'</td>';
						$subtotal+=$value['precio']*$value['cantidad'];
					$content.= '</tr>';
				}
				$content.= '<tr>';
					$content.= '<th class="title10"></th>';
					$content.= '<th class="title10"></th>';
					$content.= '<th class="title10">Subtotal</th>';
					$content.= '<th class="title10">IVA</th>';
					$content.= '<th class="title10">Total</th>';
				$content.= '</tr>';
				$content.= '<tr>';
					$content.= '<td class="title10"></td>';
					$content.= '<td class="title10"></td>';
					$content.= '<td class="title10">'.$subtotal.'</td>';
					$content.= '<td class="title10">'.$subtotal*0.16.'</td>';
					$content.= '<td class="title10">'.$subtotal*1.16.'</td>';
				$content.= '</tr>';
			$content.= '</table>';
		$content.= '</page>';
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
		//      $html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Compra_'.$_GET['id_compra'].'.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
?>