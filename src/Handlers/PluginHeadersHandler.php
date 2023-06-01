<?php

namespace Morningtrain\WP\PluginInfo\Handlers;

class PluginHeadersHandler {

    /**
     * Add Plugin Slug as allowed header in plugin file
     * @param array $extra_headers
     * @return array
     */
    public static function addExtraPluginHeaders(array $extra_headers): array
    {
        return array_merge(
            [
                'PluginSlug' => 'Plugin Slug',
            ],
            $extra_headers
        );
    }
}