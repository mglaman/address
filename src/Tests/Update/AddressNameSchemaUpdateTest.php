<?php

namespace Drupal\address\Tests\Update;

use Drupal\system\Tests\Update\UpdatePathTestBase;

/**
 * Tests the update for https://www.drupal.org/node/2759939.
 *
 * @group address
 */
class AddressNameSchemaUpdateTest extends UpdatePathTestBase {

  /**
   * {@inheritdoc}
   */
  protected function setDatabaseDumpFiles() {
    $this->databaseDumpFiles = [
      __DIR__ . '/../../../tests/fixtures/update/d8.bare.address_2759939.php',
    ];
  }

  /**
   * Tests field_update_8001().
   *
   * @see field_update_8001()
   */
  public function testFieldUpdate8001() {
    // The site might be broken at the time so logging in using the UI might
    // not work, so we use the API itself.
    drupal_rewrite_settings(['settings' => ['update_free_access' => (object) [
      'value' => TRUE,
      'required' => TRUE,
    ]]]);
    // Run updates.
    $this->runUpdates();
  }

}
