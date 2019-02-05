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

namespace Comely\IO\Mailer;

use Comely\IO\Mailer\Agents\EmailAgentInterface;
use Comely\IO\Mailer\Agents\Sendmail;
use Comely\IO\Mailer\Messages\Message;
use Comely\IO\Mailer\Messages\Sender;
use Comely\Kernel\Extend\ComponentInterface;

/**
 * Class Mailer
 * @package Comely\IO\Mailer
 */
class Mailer implements ComponentInterface
{
    /** @var EmailAgentInterface */
    private $agent;
    /** @var Sender */
    private $defaultSender;
    /** @var string */
    private $eol;

    /**
     * Mailer constructor.
     */
    public function __construct()
    {
        $this->defaultSender = new Sender();
        $this->agent = new Sendmail();
        $this->eol = "\r\n";
    }

    /**
     * @param null|string $eol
     * @return string
     */
    public function eol(?string $eol = null): string
    {
        if ($eol) {
            $this->eol = $eol;
        }

        return $this->eol;
    }

    /**
     * @return Sender
     */
    public function sender(): Sender
    {
        return $this->defaultSender;
    }

    /**
     * @param EmailAgentInterface $agent
     * @return Mailer
     */
    public function agent(EmailAgentInterface $agent): self
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * @return Message
     */
    public function compose(): Message
    {
        return new Message($this);
    }

    /**
     * @param Message $message
     * @param string ...$emails
     * @return int
     */
    public function send(Message $message, string ...$emails): int
    {
        return $this->agent->send($message, $emails);
    }
}