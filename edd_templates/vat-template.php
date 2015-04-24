<?php

/*
Description: Part of the Lyquidity WordPress theme.
Author: Bill Seddon
Author URI: http://www.lyquidity.com
Copyright: Lyquidity Solutions Limited 2013 and later
License: Lyquidity Commercial
*/

namespace lyquidity\edd_vat;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Modified by Lyquidity to add quantity support and to add extra fields support
 *
 * EDD 1.7 supports quantities but these are not displayed in the PDF receipts. 
 * I've attached an example of the type of support that could be implemented.
 * The 'template_colors' file has been augmented to add a quantities column in 
 * the products list if quantities are supported.  It should be backwards compatible
 * as the call to 'edd_item_quanities_enabled()' is tested for existence before
 * being used.  Quantities are not displayed if the function does not exist.
 *
 * The attached template also adds support for extending the list of receipt
 * information output.  In our case we want to be able to collect from the user
 * their VAT Id (if in the EU) and a purchase identifier. These are options we've
 * added to the purchase form.  
 *
 * Rather than hard code these fields into a template, the template has been 
 * augmented with a filter:
 *
 * $offset = apply_filters( 'eddpdfi_pdf_template_extra_fields', 0, 'color', $eddpdfi_pdf, $eddpdfi_payment, $eddpdfi_payment_meta, $eddpdfi_buyer_info, $colors);
 * 
 * function pdf_extra($offset, $template_name, $eddpdfi_pdf, $eddpdfi_payment, $eddpdfi_payment_meta, $eddpdfi_buyer_info, $colors)
 * {
 *   // Output some fields and accumulate the offset in $my_offset
 *   return $offset + $my_offset;
 * }
 *
 * As you can see various payment fields are passed in and the filter will return
 * an offset. This is the amount of vertical space used by the extra fields.
 * This is used in the call to SetXY() to reposition the top of the purchases table.
 * 
 * $eddpdfi_pdf->SetXY( 61, 120 + $offset );
 *
 * This implementation is not going to apply to all templates because it passes
 * the $colors array to the filter.  This works in the colors template because
 * colors have been nicely packaged into an array.  However it could be adapted
 * to work in the other templates with very little effort.
 *
 * Different Colored PDF Invoice Template
 *
 * Builds and renders the different colored PDF invoice template .
 *
 * @since 1.0
 *
 * @uses HTML2PDF
 * @uses TCPDF
 *
 * @param object $eddpdfi_pdf PDF Invoice Object
 * @param object $eddpdfi_payment Payment Data Object
 * @param array $eddpdfi_payment_meta Payment Meta
 * @param array $eddpdfi_buyer_info Buyer Info
 * @param string $eddpdfi_payment_gateway Payment Gateway
 * @param string $eddpdfi_payment_method Payment Method
 * @param string $company_name Company Name
 * @param string $eddpdfi_payment_date Payment Date
 * @param string eddpdfi_payment_status Payment Status
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function eddpdfi_pdf_template_vat( $eddpdfi_pdf, $eddpdfi_payment, $eddpdfi_payment_meta, $eddpdfi_buyer_info, $eddpdfi_payment_gateway, $eddpdfi_payment_method, $address_line_2_line_height, $company_name, $eddpdfi_payment_date, $eddpdfi_payment_status ) {
	global $edd_options;

	if ( !isset( $edd_options['eddpdfi_templates'] ) ) {
		$edd_options['eddpdfi_templates'] = 'default';
	}
	
	$color = empty($edd_options['edd_vat_pdf_colors']) ? "blue" : $edd_options['edd_vat_pdf_colors'];
	
	switch ( $color ) {
		
		case 'blue':
			$colors = array(
				'body'     => array( 8, 75, 110 ),
				'emphasis' => array( 71, 155, 198 ),
				'title'    => array( 0, 127, 192 ),
				'header'   => array( 202, 226, 238 ),
				'sub'      => array( 234, 242, 245 ),
				'border'   => array( 166, 205, 226 ),
				'notes'    => array( 7, 46, 66 )
			);
		break;
		
		case 'red':
			$colors = array(
				'body'     => array( 110, 8, 8 ),
				'emphasis' => array( 198, 71, 71 ),
				'title'    => array( 192, 0, 0 ),
				'header'   => array( 238, 202, 202 ),
				'sub'      => array( 245, 243, 243 ),
				'border'   => array( 226, 166, 166 ),
				'notes'    => array( 66, 7, 7 )
			);
		break;
		
		case 'green':
			$colors = array(
				'body'     => array( 8, 110, 39 ),
				'emphasis' => array( 71, 198, 98 ),
				'title'    => array( 0, 192, 68 ),
				'header'   => array( 202, 238, 212 ),
				'sub'      => array( 243, 245, 244 ),
				'border'   => array( 166, 226, 179 ),
				'notes'    => array( 7, 66, 28 )
			);
		break;
		
		case 'orange':
			$colors = array(
				'body'     => array( 110, 54, 8 ),
				'emphasis' => array( 198, 134, 71 ),
				'title'    => array( 192, 81, 0 ),
				'header'   => array( 238, 219, 202 ),
				'sub'      => array( 245, 245, 243 ),
				'border'   => array( 226, 224,166 ),
				'notes'    => array( 65, 66, 7 )
			);
		break;
		
		case 'yellow':
			$colors = array(
				'body'     => array( 109, 110, 8 ),
				'emphasis' => array( 197, 198, 71 ),
				'title'    => array( 192, 190, 0 ),
				'header'   => array( 238, 238, 202 ),
				'sub'      => array( 245, 244, 243 ),
				'border'   => array( 226, 193,166 ),
				'notes'    => array( 66, 38, 7 )
			);
		break;
		
		case 'purple':
			$colors = array(
				'body'     => array( 66, 8, 110 ),
				'emphasis' => array( 137, 71, 198 ),
				'title'    => array( 72, 0, 192 ),
				'header'   => array( 208, 202, 238 ),
				'sub'      => array( 244, 243, 245 ),
				'border'   => array( 189, 166, 226 ),
				'notes'    => array( 35, 7, 66 )
			);
		break;
		
		case 'pink':
			$colors = array(
				'body'     => array( 110, 8, 82 ),
				'emphasis' => array( 198, 71, 152 ),
				'title'    => array( 92, 0, 65 ),
				'header'   => array( 238, 202, 232 ),
				'sub'      => array( 245, 243, 245 ),
				'border'   => array( 226, 166, 213 ),
				'notes'    => array( 66, 7, 51 )
			);
		break;
		
	}
	
	$eddpdfi_pdf->AddFont( 'opensans', '' );
	$eddpdfi_pdf->AddFont( 'opensansb', '' );

	$font = isset( $edd_options['eddpdfi_enable_char_support'] ) ? 'freesans' : 'opensans';
	$fontb = isset( $edd_options['eddpdfi_enable_char_support'] ) ? 'freesans' : 'opensansb';

	$eddpdfi_pdf->SetMargins( 8, 8, 8 );
	$eddpdfi_pdf->SetX( 8 );

	$eddpdfi_pdf->AddPage();

	$eddpdfi_pdf->Ln(5);
	$eddpdfi_logo_size = 0;

	if ( isset( $eddpdfi_logo_size ) && isset ( $edd_options['eddpdfi_logo_upload'] ) && !empty($edd_options['eddpdfi_logo_upload']) ) {
							// $file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()
		$eddpdfi_pdf->Image( $edd_options['eddpdfi_logo_upload'], 8, 10, 0, '25', '', false, 'LTR', false, 96 );
	} else {
		$eddpdfi_pdf->SetFont( $font, '', 22 );
		$eddpdfi_pdf->SetTextColor( 50, 50, 50 );
		$eddpdfi_pdf->Cell( 0, 0, $company_name, 0, 2, 'L', false );
	}

	$eddpdfi_pdf->SetFont( $font, '', 18 );
	$eddpdfi_pdf->SetTextColor( $colors['title'][0], $colors['title'][1], $colors['title'][2] );
	$eddpdfi_pdf->SetY(45);
	$eddpdfi_pdf->Cell( 0, 0, __('Invoice', 'eddpdfi'), 0, 2, 'L', false );

	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );		
	$eddpdfi_pdf->SetXY( 8, 60 );
	$eddpdfi_pdf->SetFont( $fontb, '', 10 );
	$eddpdfi_pdf->Cell( 0, 6, __('From', 'eddpdfi'), 0, 2, 'L', false );
	$eddpdfi_pdf->SetFont( $font, '', 10 );

	if( ! empty($edd_options['edd_vat_company_name']))
	{
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['edd_vat_company_name']), $edd_options['edd_vat_company_name'], 0, 2, 'L', false );
	}

	if ( ! empty( $edd_options['eddpdfi_name'] ) ) {
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['eddpdfi_name']), eddpdfi_get_settings($eddpdfi_pdf, 'name'), 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['eddpdfi_address_line1'] ) ) {
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['eddpdfi_address_line1']), eddpdfi_get_settings($eddpdfi_pdf, 'addr_line1'), 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['eddpdfi_address_line2'] ) ) {
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['eddpdfi_address_line2']), eddpdfi_get_settings($eddpdfi_pdf, 'addr_line2'), 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['eddpdfi_address_city_state_zip'] ) ) {
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['eddpdfi_address_city_state_zip']), eddpdfi_get_settings($eddpdfi_pdf, 'city_state_zip'), 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['base_country'] ) ) {
		$countries = edd_get_country_list();
		$countries['UK'] = $countries['GB'];
		$country = $countries[$edd_options['base_country']];
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($country), $country, 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['eddpdfi_email_address'] ) ) {
		$eddpdfi_pdf->SetTextColor( 41, 102, 152 );
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($edd_options['eddpdfi_email_address']), eddpdfi_get_settings($eddpdfi_pdf, 'email'), 0, 2, 'L', false );
	}
	if ( isset( $edd_options['eddpdfi_url'] ) && $edd_options['eddpdfi_url'] ) {
		$eddpdfi_pdf->SetTextColor( 41, 102, 152 );
		$eddpdfi_pdf->Cell( 0, 6, get_option('siteurl'), 0, 2, 'L', false );
	}
	if ( ! empty( $edd_options['edd_vat_number'] ) ) {
		$vat_number = maybe_unserialize($edd_options['edd_vat_number']);
		if (!empty($vat_number['number']))
		{
		//$vat_number = __(sprintf('%s ID ', apply_filters('lsl_tax_label','Tax')), 'edd_vat') . $vat_number['number'];
		$vat_number = 'VAT No. ' . $vat_number['number'];
		$eddpdfi_pdf->Cell( 0, eddpdfi_calculate_line_height($vat_number), $vat_number, 0, 2, 'L', false );
	}	}
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );

	$eddpdfi_pdf->Ln( 12 );

	$eddpdfi_pdf->Ln();
	$eddpdfi_pdf->SetXY( 60, 60 );
	$eddpdfi_pdf->SetFont( $fontb, '', 10 );	
	$eddpdfi_pdf->Cell( 0, 6, __('To', 'eddpdfi'), 0, 2, 'L', false );
	$eddpdfi_pdf->SetFont( $font, '', 10 );	
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_buyer_info['first_name'] . ' ' . $eddpdfi_buyer_info['last_name'], 0, 2, 'L', false ); 
	$eddpdfi_pdf->SetTextColor( 41, 102, 152 );
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_payment_meta['email'], 0, 2, 'L', false );
	$eddpdfi_pdf->SetTextColor( 50, 50, 50 );
	$eddpdfi_pdf->Ln( 4 );
	$eddpdfi_pdf->SetX( 60 );
	$eddpdfi_pdf->SetTextColor( $colors['emphasis'][0], $colors['emphasis'][1], $colors['emphasis'][2] );
	$eddpdfi_pdf->Cell( 30, 6, __('Invoice Date', 'eddpdfi'), 0, 0, 'L', false );
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_payment_date, 0, 2, 'L', false ); 

	$eddpdfi_pdf->SetXY( 60, 92 );

	$eddpdfi_pdf->SetTextColor( $colors['emphasis'][0], $colors['emphasis'][1], $colors['emphasis'][2] );
	$eddpdfi_pdf->Cell( 30, 6, __('Invoice ID', 'eddpdfi'), 0, 0, 'L', false );
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );
	if (function_exists('eddpdfi_get_payment_number') && isset($edd_options['edd_vat_invoice_number']))
		$eddpdfi_pdf->Cell( 0, 6, eddpdfi_get_payment_number( $eddpdfi_payment->ID ), 0, 2, 'L', false );
	else
		$eddpdfi_pdf->Cell( 0, 6, '#' . $eddpdfi_payment->ID, 0, 2, 'L', false );
	$eddpdfi_pdf->SetX( 60 );
	$eddpdfi_pdf->SetTextColor( $colors['emphasis'][0], $colors['emphasis'][1], $colors['emphasis'][2] );
	$eddpdfi_pdf->Cell( 30, 6, __('Purchase Key', 'eddpdfi'), 0, 0, 'L', false );
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_payment_meta['key'], 0, 2, 'L', false );
	$eddpdfi_pdf->SetX( 60 );
	$eddpdfi_pdf->SetTextColor( $colors['emphasis'][0], $colors['emphasis'][1], $colors['emphasis'][2] );
	$eddpdfi_pdf->Cell( 30, 6, __('Payment Status', 'eddpdfi'), 0, 0, 'L', false );
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_payment_status, 0, 2, 'L', false );
	$eddpdfi_pdf->SetX( 60 );
	$eddpdfi_pdf->SetTextColor( $colors['emphasis'][0], $colors['emphasis'][1], $colors['emphasis'][2] );
	$eddpdfi_pdf->Cell( 30, 6, __('Payment Method', 'eddpdfi'), 0, 0, 'L', false );
	$eddpdfi_pdf->SetTextColor( $colors['body'][0], $colors['body'][1], $colors['body'][2] );
	$eddpdfi_pdf->Cell( 0, 6, $eddpdfi_payment_method, 0, 2, 'L', false );

	$offset = apply_filters( 'eddpdfi_pdf_template_extra_fields', 0, 'color', $eddpdfi_pdf, $eddpdfi_payment, $eddpdfi_payment_meta, $eddpdfi_buyer_info, $colors);
	$eddpdfi_pdf->SetXY( 61, 120 + $offset );
	
	$eddpdfi_pdf->SetFillColor( $colors['header'][0], $colors['header'][1], $colors['header'][2] );
	$eddpdfi_pdf->SetDrawColor( $colors['border'][0], $colors['border'][1], $colors['border'][2] );
	$eddpdfi_pdf->SetFont( $fontb, '', 10 );
	$eddpdfi_pdf->Cell( 140, 8, __('Invoice Items', 'eddpdfi'), 1, 2, 'C', true );
	
	$eddpdfi_pdf->Ln( 0.2 );
	
	$eddpdfi_pdf->SetX( 61 );
	
	$eddpdfi_pdf->SetFillColor( $colors['sub'][0], $colors['sub'][1], $colors['sub'][2] );
	$eddpdfi_pdf->SetFont( $font, '', 9 );

	$qenabled = version_compare(EDD_VERSION, "1.9") >= 0
		? true
		: (function_exists('edd_item_quanities_enabled') ? edd_item_quanities_enabled() : false);
	$eddpdfi_pdf->Cell( $qenabled ? 95 : 102, 7, __('PRODUCT NAME', 'eddpdfi'), 'BL', 0, 'L', true );
	if( $qenabled )
	{
		$eddpdfi_pdf->Cell( 10, 7, __('#', 'eddpdfi'), 'B', 0, 0, true );
	}

	$eddpdfi_pdf->Cell( $qenabled ? 35 : 38, 7, __('PRICE', 'eddpdfi'), 'BR', 0, 'R', true );

	$eddpdfi_pdf->Ln( 0.2 );

	$eddpdfi_pdf_downloads = isset( $eddpdfi_payment_meta['cart_details'] ) ? maybe_unserialize( $eddpdfi_payment_meta['cart_details'] ) : false;

	$eddpdfi_pdf->Ln();

	if ( $eddpdfi_pdf_downloads ):

		$eddpdfi_pdf->SetX( 61 );

		$includes_taxes = edd_prices_include_tax();

		foreach( $eddpdfi_pdf_downloads as $key => $download ) {

			$eddpdfi_pdf->SetX( 61 );
			
			$eddpdfi_pdf->SetFont( $font, '', 10 );

			$eddpdfi_download_id = isset( $eddpdfi_payment_meta['cart_details'] ) ? $download['id'] : $download;
			$eddpdfi_price_override = isset( $eddpdfi_payment_meta['cart_details'] ) ? $download['price'] : null; 
			$user_info = maybe_unserialize( $eddpdfi_payment_meta['user_info'] );
			$eddpdfi_final_download_price = edd_get_download_final_price($eddpdfi_download_id, $user_info, $eddpdfi_price_override);

			if ( isset( $user_info['discount'] ) && $user_info['discount'] != 'none') {
				$eddpdfi_discount =  $user_info['discount'];
			} else { 
				$eddpdfi_discount = __('None', 'eddpdfi');
			}
			
			// $eddpdfi_total_price = html_entity_decode( edd_currency_filter( edd_format_amount( $eddpdfi_payment_meta['amount'] ) ) );
			
			$eddpdfi_download_title = html_entity_decode( get_the_title( $eddpdfi_download_id ), ENT_COMPAT, 'UTF-8' );

			if (edd_has_variable_prices($eddpdfi_download_id))
			{
				$eddpdfi_download_title .= ' - ' . edd_get_cart_item_price_name( $download );
				$options = $download['item_number']['options'];
			}

			// error_log(print_r($download,true));
			$options['is_item'] = $eddpdfi_download_id ;
			$price = edd_get_cart_item_price( $eddpdfi_download_id , $options, $includes_taxes );
			$eddpdfi_download_price  = ' ' . html_entity_decode( edd_currency_filter( edd_format_amount( $price ) ), ENT_COMPAT, 'UTF-8' );

//			$eddpdfi_download_price = ' ' . html_entity_decode( edd_currency_filter( edd_format_amount( $eddpdfi_final_download_price ) ), ENT_COMPAT, 'UTF-8' );
			
			$eddpdfi_pdf->Cell( $qenabled ? 95 : 102, 8, $eddpdfi_download_title, 'B', 0, 'L', false );
			if( $qenabled )
			{
				$quantity = is_array($download) ? $download['quantity'] : 1;
				$eddpdfi_pdf->Cell( 10, 8, $quantity, 'B', 0, 'C', false );
			}
			$eddpdfi_pdf->Cell( $qenabled ? 35 : 38, 8, $eddpdfi_download_price, 'B', 2, 'R', false );
		
		}
		
		$eddpdfi_pdf->Ln( 5 );
		$eddpdfi_pdf->SetX( 61 );
		
		$eddpdfi_pdf->SetFillColor( $colors['header'][0], $colors['header'][1], $colors['header'][2] );
		$eddpdfi_pdf->SetFont( $fontb, '', 10 );
		$eddpdfi_pdf->Cell( 140, 8, __('Invoice Totals', 'eddpdfi'), 1, 2, 'C', true );
		
		$eddpdfi_pdf->Ln( 0.2 );
		
		$eddpdfi_pdf->SetX( 61 );
		if( edd_use_taxes() ) : 
			$eddpdfi_pdf->Cell( 102, 8, __('Subtotal', 'eddpdfi'), 'B', 0, 'L', false );
			$eddpdfi_pdf->Cell( 38, 8, html_entity_decode( edd_payment_subtotal( $eddpdfi_payment->ID ), ENT_COMPAT, 'UTF-8' ), 'B', 2, 'R', false );
			$eddpdfi_pdf->SetX( 61 );
			$eddpdfi_pdf->Cell( 102, 8, __(apply_filters('lsl_tax_label','Tax'), 'eddpdfi'), 'B', 0, 'L', false );
			$eddpdfi_pdf->Cell( 38, 8, html_entity_decode( edd_payment_tax( $eddpdfi_payment->ID ), ENT_COMPAT, 'UTF-8' ), 'B', 2, 'R', false );
		endif;

		$fees = edd_get_payment_fees( $eddpdfi_payment->ID );
		if ( ! empty ( $fees ) ) :
			foreach( $fees as $fee ) :
				$eddpdfi_pdf->SetX( 61 );
				$eddpdfi_pdf->Cell( 102, 8, $fee['label'], 'B', 0, 'L', false );
				$eddpdfi_pdf->Cell( 38, 8, html_entity_decode( edd_currency_filter( $fee['amount'] ), ENT_COMPAT, 'UTF-8' ), 'B', 2, 'R', true );
			endforeach;
		endif;
		$eddpdfi_pdf->SetX( 61 );
		$eddpdfi_pdf->Cell( 102, 8, __('Discount Used', 'eddpdfi'), 'B', 0, 'L', false );
		$eddpdfi_pdf->Cell( 38, 8, $eddpdfi_discount, 'B', 2, 'R', false );

		$eddpdfi_pdf->SetX( 61 );
		$eddpdfi_pdf->SetFont( $fontb, '', 11 );
		$eddpdfi_pdf->Cell( 102, 10, __('Total Due', 'eddpdfi'), 'B', 0, 'L', false );
		$eddpdfi_pdf->Cell( 38, 10, html_entity_decode( edd_currency_filter( edd_format_amount( edd_get_payment_amount( $eddpdfi_payment->ID ) ) ), ENT_COMPAT, 'UTF-8' ), 'B', 2, 'R', false );
		
		$eddpdfi_pdf->Ln( 10 );
		
		if ( isset ( $edd_options['eddpdfi_additional_notes'] ) && !empty ( $edd_options['eddpdfi_additional_notes'] ) ) {
		
			$eddpdfi_pdf->SetX( 60 );
			$eddpdfi_pdf->SetFont( $font, '', 13 );
			$eddpdfi_pdf->Cell( 0, 6, __('Additional Notes', 'eddpdfi'), 0, 2, 'L', false );
			$eddpdfi_pdf->Ln(2);
			
			$eddpdfi_pdf->SetX( 60 );
			$eddpdfi_pdf->SetFont( $font, '', 10 );
			$eddpdfi_pdf->SetTextColor( $colors['notes'][0], $colors['notes'][1], $colors['notes'][2] );
			$eddpdfi_pdf->MultiCell( 0, 6, eddpdfi_get_settings($eddpdfi_pdf, 'notes'), 0, 'L', false );
			
		}
		
	endif;
}
add_action( 'eddpdfi_pdf_template_vat', '\lyquidity\edd_vat\eddpdfi_pdf_template_vat', 10, 10 );
