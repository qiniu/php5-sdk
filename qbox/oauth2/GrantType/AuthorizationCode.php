<?php

require_once(dirname(dirname(__FILE__)) . '/Exception.php');
require_once('IGrantType.php');

/**
 * Authorization code  Grant Type Validator
 */
class OAuth2_GrantType_AuthorizationCode implements OAuth2_GrantType_IGrantType
{
    /**
     * Defines the Grant Type
     *
     * @var string  Defaults to 'authorization_code'.
     */
    const GRANT_TYPE = 'authorization_code';

    /**
     * Adds a specific Handling of the parameters
     *
     * @return array of Specific parameters to be sent.
     * @param  mixed  $parameters the parameters array (passed by reference)
     */
    public function validateParameters(&$parameters)
    {
        if (!isset($parameters['code']))
        {
            throw new OAuth2_InvalidArgumentException(
                'The \'code\' parameter must be defined for the Authorization Code grant type',
                OAuth2_InvalidArgumentException::MISSING_PARAMETER
            );
        }
        elseif (!isset($parameters['redirect_uri']))
        {
            throw new OAuth2_InvalidArgumentException(
                'The \'redirect_uri\' parameter must be defined for the Authorization Code grant type',
                OAuth2_InvalidArgumentException::MISSING_PARAMETER
            );
        }
    }
}
