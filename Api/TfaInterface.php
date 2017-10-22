<?php
/**
 * MageSpecialist
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magespecialist.it so we can send you a copy immediately.
 *
 * @category   MSP
 * @package    MSP_TwoFactorAuth
 * @copyright  Copyright (c) 2017 Skeeller srl (http://www.magespecialist.it)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace MSP\TwoFactorAuth\Api;

interface TfaInterface
{
    const XML_PATH_ENABLED = 'msp_securitysuite_twofactorauth/general/enabled';
    const XML_PATH_FORCED_PROVIDERS = 'msp_securitysuite_twofactorauth/general/force_providers';

    /**
     * Return true if 2FA is enabled
     * @return boolean
     */
    public function isEnabled();

    /**
     * Get provider by code
     * @param string $providerCode
     * @param bool $onlyEnabled = true
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface|null
     */
    public function getProvider($providerCode, $onlyEnabled = true);

    /**
     * Retrieve forced providers list
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface[]
     */
    public function getForcedProviders();

    /**
     * Get a user provider
     * @param \Magento\User\Api\Data\UserInterface $user
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface[]
     */
    public function getUserProviders(\Magento\User\Api\Data\UserInterface $user);

    /**
     * Get a list of providers
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface[]
     */
    public function getAllProviders();

    /**
     * Get a list of providers
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface[]
     */
    public function getAllEnabledProviders();

    /**
     * Return a list of trusted devices for given user id
     * @param int $userId
     * @return array
     */
    public function getTrustedDevices($userId);

    /**
     * Get allowed URLs
     * @return array
     */
    public function getAllowedUrls();

    /**
     * Returns a list of providers to configure/enroll
     * @param \Magento\User\Api\Data\UserInterface $user
     * @return \MSP\TwoFactorAuth\Model\ProviderInterface[]
     */
    public function getProvidersToActivate(\Magento\User\Api\Data\UserInterface $user);

    /**
     * Return true if a provider is allowed for a given user
     * @param \Magento\User\Api\Data\UserInterface $user
     * @param string $providerCode
     * @return boolean
     */
    public function getProviderIsAllowed(\Magento\User\Api\Data\UserInterface $user, $providerCode);
}
