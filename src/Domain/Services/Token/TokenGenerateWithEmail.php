<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 9:45
 */

namespace App\Domain\Services\Token;


use Ramsey\Uuid\Uuid;

class TokenGenerateWithEmail
{
    static function generate($email)
    {
        $str = \DateTime::createFromFormat('m-d-Y H:i:s', date('m-d-Y H:i:s'))->format('m-d-Y H:i:s') . $email . rand();

        return Uuid::uuid5(Uuid::NAMESPACE_URL, $str)->toString() . '-' . Uuid::uuid4()->toString();
    }
}