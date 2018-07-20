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

namespace Comely\IO\Mailer\Exception;

/**
 * Class SMTPException
 * @package Comely\IO\Mailer\Exception
 */
class SMTPException extends MailerException
{
    /**
     * @param int $num
     * @param string $error
     * @return SMTPException
     */
    public static function connectionError(int $num, string $error): self
    {
        return new self(sprintf('Connection Error: [%1$d] %2$s', $num, $error));
    }

    /**
     * @param string $command
     * @param int $expect
     * @param int $got
     * @return SMTPException
     */
    public static function unexpectedResponse(string $command, int $expect, int $got): self
    {
        return new self(sprintf('Expected "%2$d" from "%1$s" command, got "%3$d"', $command, $expect, $got));
    }

    /**
     * @return SMTPException
     */
    public static function tlsNotAvailable(): self
    {
        return new self('TLS encryption is not available at remote SMTP server');
    }

    /**
     * @return SMTPException
     */
    public static function tlsNegotiateFailed(): self
    {
        return new self('TLS negotiation failed with remote SMTP server');
    }

    /**
     * @param string $error
     * @return SMTPException
     */
    public static function invalidRecipient(string $error): self
    {
        return new self(sprintf('Failed to set a recipient on remote SMTP server, "%1$s"', $error));
    }

    /**
     * @return SMTPException
     */
    public static function authUnavailable(): self
    {
        return new self('No supported authentication method available on remote SMTP server');
    }

    /**
     * @param string $error
     * @return SMTPException
     */
    public static function authFailed(string $error): self
    {
        return new self(sprintf('Authentication error "%1$s"', $error));
    }

    /**
     * @param int $size
     * @param int $max
     * @return SMTPException
     */
    public static function exceedsMaximumSize(int $size, int $max): self
    {
        return new self(sprintf('MIME (%1$d bytes) exceeds maximum size of %2$d', $size, $max));
    }
}