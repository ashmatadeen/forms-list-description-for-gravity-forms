<?php
/**
 * Plugin Name:     Gravity Forms Forms List Description
 * Plugin URI:      https://webblerock.com
 * Description:     Adds a column displaying the description for each form in the admin forms listing.
 * Author:          Ash Matadeen
 * Author URI:      https://webblerock.com
 * Text Domain:     gravityforms
 * Version:         0.1.0
 *
 * @package         Gform_Formslist_Description
 */

/**
 * Class GformFormsListDescription
 */
class GformFormsListDescription {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_filter( 'gform_form_list_columns', array( $this, 'customise_gforms_admin_forms_list_add_column' ), 10, 1 );
		add_filter( 'gform_form_list_column_description', array( $this, 'customise_gforms_admin_forms_list_add_column_data' ), 10, 1 );
	}


	/**
	 * Add form description heading to admin form listing.
	 *
	 * @param array $columns the column data.
	 * @return array $columns the column data including a description column.
	 */
	public function customise_gforms_admin_forms_list_add_column( $columns ) {
		$columns['description'] = esc_html__( 'Description', 'gravityforms' );
		return $columns;
	}

	/**
	 * Add form description data to admin form listing.
	 *
	 * @param object $form the form object.
	 */
	public function customise_gforms_admin_forms_list_add_column_data( $form ) {
		$form_object = GFAPI::get_form( $form->id );
		$description = $form_object['description'];
		echo esc_html( $description );
	}
}
