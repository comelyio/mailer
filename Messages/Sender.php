<?php
/**
 * This file is part of Comely package.
 * https://github.com/comelyio/comely
 *
 * Copyright (c) 2016-2019 Furqan A. Siddiqui <hello@furqansiddiqui.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/comelyio/comely/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Comely\IO\Mailer\Messages;

use Comely\IO\Mailer\Exception\MessageException;

/**
 * Class Sender
 * @package Comely\IO\Mailer\Messages
 * @property-read null|string $name
 * @property-read null|string $email
 */
class Sender
{
    /** @var null|string */
    private $name;
    /** @var null|string */
    private $email;

    /**
     * @param null|string $name
     * @return Sender
     */
    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $emailAddr
     * @return Sender
     */
    public function email(string $emailAddr): self
    {
        if (!filter_var($emailAddr, FILTER_VALIDATE_EMAIL)) {
            throw new MessageException('Invalid sender e-mail address');
        }

        $this->email = $emailAddr;
        return $this;
    }

    /**
     * @param string $prop
     * @return bool|null|string
     */
    public function __get(string $prop)
    {
        switch (strtolower($prop)) {
            case "name":
                return $this->name;
            case "email":
                return $this->email;
            default:
                return false;
        }
    }
}