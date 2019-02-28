<?php
/**
 * SDK for AFIP Electronic Billing (wsfe1)
 * 
 * @link http://www.afip.gob.ar/fe/documentos/manual_desarrollador_COMPG_v2_10.pdf WS Specification
 *
 * @author 	Ivan Muñoz
 * @package Afip
 * @version 0.7
 **/

class UserAfipData extends AfipWebService {

	var $soap_version 	= SOAP_1_2;
	var $WSDL 			= 'wsfe-production.wsdl';
	var $URL 			= 'https://servicios1.afip.gov.ar/wsfev1/service.asmx';
	var $WSDL_TEST 		= 'wsfe.wsdl';
	var $URL_TEST 		= 'https://wswhomo.afip.gov.ar/wsfev1/service.asmx';

	/**
	 * Gets last voucher number 
	 * 
	 * Asks to Afip servers for number of the last voucher created for
	 * certain sales point and voucher type {@see WS Specification 
	 * item 4.15} 
	 *
	 * @since 0.7
	 *
	 * @param int $sales_point 	Sales point to ask for last voucher  
	 * @param int $type 		Voucher type to ask for last voucher 
	 *
	 * @return int 
	 **/
	public function getPuntosDeVenta()
	{
		$ta = $this->afip->GetServiceTA('wsfe');
		$params = ['Auth' => [
			'Token' => $ta->token,
      'Sign' => $ta->sign,
      'Cuit' => $this->afip->CUIT
      ]
    ];
		
		return $this->ExecuteRequest('FEParamGetPtosVenta', $params)->FEParamGetPtosVentaResult;
	}


}

