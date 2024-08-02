namespace Drupal\college_registration\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\college_registration\RegistrationStorage;

/**
 * Class RegistrationController.
 */
class RegistrationController extends ControllerBase {

  /**
   * List all registrations.
   */
  public function list() {
    $storage = new RegistrationStorage();
    $registrations = $storage->read();

    $rows = [];
    foreach ($registrations as $registration) {
      $rows[] = [
        'data' => [
          $registration->first_name,
          $registration->last_name,
          $registration->email,
        ],
      ];
    }

    $header = [
      $this->t('First Name'),
      $this->t('Last Name'),
      $this->t('Email'),
    ];

    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    ];
  }

}
