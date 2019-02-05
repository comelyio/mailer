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

namespace Comely\IO\Mailer\Agents;

use Comely\IO\Mailer\Messages\Message;

/**
 * Interface EmailAgentInterface
 * @package Comely\IO\Mailer\Agents
 */
interface EmailAgentInterface
{
    /**
     * @param Message $message
     * @param array $emails
     * @return int
     */
    public function send(Message $message, array $emails): int;
}