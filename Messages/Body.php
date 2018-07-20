<?php
/**
 * This file is part of Comely package.
 * https://github.com/comelyio/comely
 *
 * Copyright (c) 2016-2018 Furqan A. Siddiqui <hello@furqansiddiqui.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/comelyio/comely/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Comely\IO\Mailer\Messages;

/**
 * Class Body
 * @package Comely\IO\Mailer\Messages
 * @property-read null|string $plain
 * @property-read null|string $html
 */
class Body
{
    /** @var null|string */
    private $plain;
    /** @var null|string */
    private $html;

    /**
     * @param string $body
     * @return Body
     */
    public function plain(string $body): self
    {
        $this->plain = $body;
        return $this;
    }

    /**
     * @param string $html
     * @return Body
     */
    public function html(string $html): self
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @param string $prop
     * @return bool|null|string
     */
    public function __get(string $prop)
    {
        switch (strtolower($prop)) {
            case "plain":
                return $this->plain;
            case "html":
                return $this->html;
            default:
                return false;
        }
    }
}