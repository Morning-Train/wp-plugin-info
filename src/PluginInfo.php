<?php namespace Morningtrain\WP\PluginUpdater;

class PluginInfo {

	protected string $root;
	protected array $plugin_data;

	public function __construct(protected string $plugin_file)
    {
		$this->root = trailingslashit(wp_normalize_path(plugin_dir_path($this->plugin_file)));
		$this->plugin_data = $this->extractPluginData();
	}

    /**
     * Extracts plugin data from the plugin file
     * @return array
     */
	protected function extractPluginData(): array
    {
		if(!function_exists('get_plugin_data')) {
			require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		}

		return get_plugin_data($this->plugin_file);
	}

    /**
     * Get root path for the plugin
     * @return string
     */
	public function getRoot(): string
    {
		return $this->root;
	}

    /**
     * Get data from plugins data
     * @param string $data_name
     * @param string|null $default
     * @return string
     */
	public function getData(string $data_name, string $default = null): string
    {
		if(!isset($plugin_data[$data_name])) {
			return $default;
		}

		return (string) $plugin_data[$data_name];
	}

    /**
     * Base name of plugin ex. "plugin-name/plugin-name.php"
     * @return string
     */
	public function getBaseName(): string
    {
		return plugin_basename($this->plugin_file);
	}

    /**
     * Get name of plugin
     * @return string
     */
	public function getName(): string
    {
		return $this->getData('Name', '');
	}

    /**
     * Get textdomain of plugin
     * @return string
     */
	public function getTextDomain(): string
    {
		return $this->getData('TextDomain', '');
	}

    /**
     * Get version of plugin
     * @return string
     */
	public function getVersion(): string
    {
		return $this->getData('Version', '');
	}

    /**
     * Get Translations path
     * @return string
     */
    public function getDomainPath(): string
    {
        return $this->getData('DomainPath', '');
    }

    /**
     * Get which WordPress version is required at least
     * @return string
     */
    public function getRequiresWPVersion(): string {
        return $this->getData('RequiresWP', '');
    }

    /**
     * Get which PHP version is required at least
     * @return string
     */
    public function getRequiresPHPVersion(): string {
        return $this->getData('RequiresPHP', '');
    }
}