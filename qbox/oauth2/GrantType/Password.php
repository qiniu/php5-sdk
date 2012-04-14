<?php

require_once(dirname(dirname(__FILE__)) . '/Exception.php');
require_once('IGrantType.php');

/**
 * Password Parameters
 */
class OAuth2_GrantType_Password implements OAuth2_GrantType_IGrantType
{
    /**
     * Defines the Grant Type
     *
     * @var string  Defaults to 'password'.
     */
    const GRANT_TYPE = 'password';

    /**
     * Adds a specific Handling of the parameters
     *
     * @return array of Specific parameters to be sent.
     * @param  mixed  $parameters the parameters array (passed by reference)
     */
    public function validateParameters(&$parameters)
    {
        if (!isset($parameters['username']))
        {
            throw new OAuth2_InvalidArgumentException(
                'The \'username\' parameter must be defined for the Password grant type',
                OAuth2_InvalidArgumentException::MISSING_PARAMETER
            );
        }
        elseif (!isset($parameters['password']))
        {
            throw new OAuth2_InvalidArgumentException(
                'The \'password\' parameter must be defined for the Password grant type',
                OAuth2_InvalidArgumentException::MISSING_PARAMETER
            );
        }
    }
}
