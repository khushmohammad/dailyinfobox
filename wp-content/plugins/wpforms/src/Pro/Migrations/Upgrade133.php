<?php

namespace WPForms\Pro\Migrations;

use WPForms\Migrations\UpgradeBase;

/**
 * Class v1.3.3 upgrade for Pro.
 *
 * @since 1.7.5
 *
 * @noinspection PhpUnused
 */
class Upgrade133 extends UpgradeBase {

	/**
	 * Run upgrade.
	 *
	 * @since 1.7.5
	 *
	 * @return bool|null Upgrade result:
	 *                   true  - the upgrade completed successfully,
	 *                   false - in the case of failure,
	 *                   null  - upgrade started but not yet finished (background task).
	 */
	public function run() {

		global $wpdb;

		$entry = wpforms()->get( 'entry' );

		if ( ! $entry->table_exists() ) {
			$entry->create_table();

			return true;
		}

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching
		$column = $wpdb->get_col( "SHOW COLUMNS FROM {$wpdb->prefix}wpforms_entries LIKE 'user_uuid'" );

		if ( ! empty( $column[0] ) ) {
			return true;
		}

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange
		$wpdb->query( "ALTER TABLE {$wpdb->prefix}wpforms_entries ADD user_uuid VARCHAR(36)" );

		return true;
	}
}
