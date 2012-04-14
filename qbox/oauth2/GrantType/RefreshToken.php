<?php

require_once(dirname(dirname(__FILE__)) . '/Exception.php');
require_once('IGrantType.php');

/**
 * Refresh Token  Parameters
 */
class OAuth2_GrantType_RefreshToken implements OAuth2_GrantType_IGrantType
{
    /**
     * Defines the Grant Type
     *
     * @var string  Defaults to 'refresh_token'.
     */
    const GRANT_TYPE = 'refresh_token';

    /**
     * Adds a specific Handling of the parameters
     *
     * @return array of Specific parameters to be sent.
     * @param  mixed  $parameters the parameters array (passed by reference)
     */
    public function validateParameters(&$parameters)
    {
        if (!isset($parameters['refresh_token']))
        {
            throw new OAuth2_InvalidArgumentException(
                'The \'refresh_token\' parameter must be defined for the refresh token grant type',
                OAuth2_InvalidArgumentException::MISSING_PARAMETER
            );
        }
    }
}
