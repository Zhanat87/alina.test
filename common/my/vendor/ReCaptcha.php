<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 11/20/15
 * Time: 4:56 PM
 */

namespace common\my\vendor;

use Captcha\Captcha;

class ReCaptcha extends Captcha
{

    /**
     * Private key
     *
     * @var string
     */
    protected $privateKey = '6Lf4ZhETAAAAAO7G5ceJ9v1uCoQ6W_nm5ouZ17DI';

    /**
     * Public key
     *
     * @var string
     */
    protected $publicKey = '6Lf4ZhETAAAAAGJWHiu_LVW-G7IHhIDwHrrJA0E5';

}