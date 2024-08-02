namespace Drupal\college_registration;

use Drupal\Core\Database\Database;

/**
 * Class RegistrationStorage.
 */
class RegistrationStorage {

  /**
   * Create a new registration.
   */
  public function create($values) {
    $connection = Database::getConnection();
    $connection->insert('college_registration')
      ->fields([
        'first_name' => $values['first_name'],
        'last_name' => $values['last_name'],
        'email' => $values['email'],
      ])
      ->execute();
  }

  /**
   * Read all registrations.
   */
  public function read() {
    $connection = Database::getConnection();
    return $connection->select('college_registration', 'cr')
      ->fields('cr')
      ->execute()
      ->fetchAll();
  }

  /**
   * Update a registration.
   */
  public function update($id, $values) {
    $connection = Database::getConnection();
    $connection->update('college_registration')
      ->fields($values)
      ->condition('id', $id)
      ->execute();
  }

  /**
   * Delete a registration.
   */
  public function delete($id) {
    $connection = Database::getConnection();
    $connection->delete('college_registration')
      ->condition('id', $id)
      ->execute();
  }
}
