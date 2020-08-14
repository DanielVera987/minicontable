<?php 

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
          var_dump($cfdiComprobante);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
      var_dump($Emisor);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
      var_dump($DomicilioFiscal);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
      var_dump($ExpedidoEn);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
      var_dump($Receptor);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
      var_dump($ReceptorDomicilio);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
      var_dump($Concepto);
    } 

    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
      var_dump($Traslado) ;
    } 
    
    if(isset($ns['tfd']))
    {
      foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
        var_dump($tfd);
      } 
    }
  }

  public static function importCfdiPago()
  {

  }
}