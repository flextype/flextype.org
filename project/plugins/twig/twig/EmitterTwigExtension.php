<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class EmitterTwigExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Register Global variables in an extension
     */
    public function getGlobals() : array
    {
        return [
            'emitter' => new EmitterTwig(),
        ];
    }
}

class EmitterTwig
{
    /**
     * Flextype Application
     */


    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Emitting event
     */
    public function emit($event)
    {
        return flextype('emitter')->emit($event);
    }

    /**
     * Emitting events in batches
     */
    public function emitBatch(array $events)
    {
        return flextype('emitter')->emitBatch($events);
    }
}
