<?php 
/*
Datos importantes que se van a recolectar


*/
namespace Helpers;

class Cfdi 
{
  public static function importCfdi3($file = '')
  {
    $xml = simplexml_load_file($file); 
    $ns = $xml->getNamespaces(true);
    $xml->registerXPathNamespace('c', $ns['cfdi']);
    if(isset($ns['tfd']))
    {
      $xml->registerXPathNamespace('t', $ns['tfd']);
    }
    
    foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
      echo "Comprobante";
      var_dump($cfdiComprobante);
      /*
      Fecha
      Subtotal
      Total
      Tipo de comprobante
      Metodo de pago
      */
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
      echo "Emisor";
      var_dump($Emisor);
      /*
      RFC
      Nombre
      */
    } 

          /* foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
            echo "Domicilio Fiscal";
            var_dump($DomicilioFiscal);
          }  */

          /* foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
            echo "Expedido en";
            var_dump($ExpedidoEn);
          }  */

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
      echo "Receptor";
      var_dump($Receptor);
      /*
      Rfc
      Nombre
      */
    } 

    /* foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
      echo "Domicilio";
      var_dump($ReceptorDomicilio);
    }  */

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
      echo "Concepto";
      var_dump($Concepto);
      /*
      Cantidad
      Descripcion
      ValorUnitario
      Importe
      */
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
      echo "Traslado";
      var_dump($Traslado) ;
      /*
      Impuesto = 002
      Importe
      */
    } 
    
    /* if(isset($ns['tfd']))
    {
      foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
        echo "tfd";
        var_dump($tfd);
      } 
    } */
  }

  public static function importCfdiPago()
  {

  }
}