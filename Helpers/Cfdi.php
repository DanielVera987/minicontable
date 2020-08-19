<?php 
/*
Datos importantes que se van a recolectar


*/
namespace Helpers;

class Cfdi 
{
  public static function importCfdi3($file = '')
  {
    $result = [];
    $xml = simplexml_load_file($file); 
    $ns = $xml->getNamespaces(true);
    $xml->registerXPathNamespace('c', $ns['cfdi']);
    if(isset($ns['tfd']))
    {
      $xml->registerXPathNamespace('t', $ns['tfd']);
    }
    
    foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
      $result['fecha'] = strval($cfdiComprobante['Fecha']);
      $result['subtotal'] = strval($cfdiComprobante['SubTotal']);
      $result['total'] = strval($cfdiComprobante['Total']);
      $result['tipodecomprobante'] = strval($cfdiComprobante['TipoDeComprobante']);
      $result['metodopago'] = strval($cfdiComprobante['MetodoPago']);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
      $result['emisorRfc'] = strval($Emisor['Rfc']);
      $result['emisorNombre'] = strval($Emisor['Nombre']);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
      $result['receptorRfc'] = strval($Receptor['Rfc']);
      $result['receptorNombre'] = strval($Receptor['Nombre']);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
      $result['concepto'] = [
        'Cantidad' => strval($Concepto['Cantidad']),
        'Descripcion' => strval($Concepto['Descripcion']),
        'ValorUnitario' => strval($Concepto['ValorUnitario']),
        'Importe' => strval($Concepto['Importe'])
      ];
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
      $result['traslado'] = [
        'Impuesto' => strval($Traslado['Impuesto']),
        'Importe' => strval($Traslado['Importe'])
      ];
    } 

    return $result;
    
  }

  public static function importCfdiPago()
  {

  }
}