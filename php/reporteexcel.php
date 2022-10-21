<?php
include "conexion.php";
include "estilos.php";
$i=1;
$consulta = "SELECT * FROM historial";
$resultado = $conn->query($consulta);
date_default_timezone_set('America/Mexico_City');

if (PHP_SAPI == 'cli')
	die('Este archivo solo se puede ver desde un navegador web');

/** Se agrega la libreria PHPExcel */
require_once '../lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
					 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
					 ->setTitle("Historial Excel con PHP y MySQL")
					 ->setSubject("Historial Excel con PHP y MySQL")
					 ->setDescription("Historial de alumnos")
					 ->setKeywords("Historial")
					 ->setCategory("Historial excel");
 					 $tituloReporte = 'Historial';
					 	$objPHPExcel->setActiveSheetIndex(0)
		    			->mergeCells('A'.$i.':H'.$i);
					 	$titulosColumnas = array('UID','Cuenta','Nombre','Ocupación','Guardia','Motivo','Acceso','Fecha');
// Se agregan los titulos del reporte
					 	$objPHPExcel->setActiveSheetIndex(0)
					 	->setCellValue('A'.$i,$tituloReporte)
					 	->setCellValue('A'.($i+1),  $titulosColumnas[0])
					 	->setCellValue('B'.($i+1),  $titulosColumnas[1])
					 	->setCellValue('C'.($i+1),  $titulosColumnas[2])
					 	->setCellValue('D'.($i+1),  $titulosColumnas[3])
					 	->setCellValue('E'.($i+1),  $titulosColumnas[4])
					 	->setCellValue('F'.($i+1),  $titulosColumnas[5])
					 	->setCellValue('G'.($i+1),  $titulosColumnas[6])
					 	->setCellValue('H'.($i+1),  $titulosColumnas[7]);
						 
					 	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->applyFromArray($estiloTituloReporte);
					 	$objPHPExcel->getActiveSheet()->getStyle('A'.($i+1).':'.'H'.($i+1))->applyFromArray($estiloTituloColumnas);		
					 	$i=$i+2;

					 	$tamaño=0;
 					 	while ($row=$resultado->fetch_array()){ 			
 							$sql2="SELECT * FROM registro WHERE id='".$row['usuario']."'";
 							$res = $conn->query($sql2);
 							$fila=$res->fetch_array();
							$sql3="SELECT * FROM personal WHERE id='".$row['guardia']."'";
							$res3 = $conn->query($sql3);
							$row3=$res3->fetch_array();
                     if($row['acp']==1){$as="Aceptado";}if($row['acp']==2){$as="Denegado";} 
 					 		$objPHPExcel->setActiveSheetIndex(0)
 					 		->setCellValue('A'.$i,  utf8_encode($fila['UID']))
 					 		->setCellValue('B'.$i,  utf8_encode($fila['cuenta']))
 					 		->setCellValue('C'.$i, $fila['nombre'])
 					 		->setCellValue('D'.$i, $fila['ocupacion'])
 					 		->setCellValue('E'.$i, $row3['nombre'])
 					 		->setCellValue('F'.$i, $row['motivo'])
 					 		->setCellValue('G'.$i, $as)
 					 		->setCellValue('H'.$i,  utf8_encode($row['fecha']));
 					 		$i++;
 					 		$tamaño++;
 					 	}
					 	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A".($i-$tamaño).":H".($i-1));
					 	$i=$i+2;
					 	for($i = 'A'; $i <= 'H'; $i++){

						  	$objPHPExcel->setActiveSheetIndex(0)			
						  	->getColumnDimension($i)->setAutoSize(TRUE);
						  }
// Se asigna el nombre a la hoja
					 $objPHPExcel->getActiveSheet()->setTitle('Historial');
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
					 $objPHPExcel->setActiveSheetIndex(0);
// Inmovilizar paneles 
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
					 //$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
					 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					 header('Content-Disposition: attachment;filename="Historial.xlsx"');
					 header('Cache-Control: max-age=0');
					 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
					 $objWriter->save('php://output');
					 exit;
?>