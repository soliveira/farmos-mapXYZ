<?php

namespace Drupal\farm_map_xyz\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a XYZ settings form.
 */
class XyzSettingsForm extends ConfigFormbase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'farm_map_xyz.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'farm_map_xyz_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateinterface $form_state) {
    $config = $this->config(static::SETTINGS);

    // Add URl field.
    $form['xyz_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('XYZ Url'),
      '#description' => $this->t('Enter XYZ Url.'),
      '#default_value' => $config->get('xyz_url'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set('xyz_url', $form_state->getValue('xyz_url'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
