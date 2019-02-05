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

namespace Comely\IO\Mailer\Exception;

/**
 * Class MessageException
 * @package Comely\IO\Mailer\Exception
 */
class MessageException extends MailerException
{
    /**
     * @param string $key
     * @return MessageException
     */
    public static function disabledHeaderKey(string $key): self
    {
        return new self(sprintf('Use appropriate method instead to set "%1$s" header', $key));
    }

    /**
     * @param string $file
     * @return MessageException
     */
    public static function attachmentUnreadable(string $file): self
    {
        return new self(sprintf('Attached file "%1$s" is unreadable', basename($file)));
    }
}