<?php

namespace Wuwx\LaravelConnect\Nova;

use App\Nova\Resource as NovaResource;

abstract class Resource extends NovaResource
{

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = "Connect";

    public static function uriKey()
    {
        return "connect-" . parent::uriKey();
    }
}
