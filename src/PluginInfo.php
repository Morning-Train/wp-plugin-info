<?php namespace Morningtrain\WP\PluginInfo;

use Morningtrain\WP\PluginInfo\Handlers\PluginHeadersHandler;

class PluginInfo {

	protected string $root;
	protected string $rootUrl;
    protected string $pluginFilePath;
	protected array $pluginData;
    protected string $slug;
    protected array $namedPaths = [];
    protected array $namedUrls = [];
    protected array $namedParams = [];

    protected static array $instances = [];

    /**
     * Register af PluginInfo instance
     * @param string $pluginFile
     * @return self
     */
    public static function register(string $pluginFile): self
    {
        $instance = new static($pluginFile);

        if(!isset(static::$instances[$instance->getSlug()])) {
            static::$instances[$instance->getSlug()] = $instance;
        }

        return static::$instances[$instance->getSlug()];
    }

    /**
     * Get registered PluginInfo instance
     * @param string $pluginSlug
     * @return self|null
     */
    public static function get(string $pluginSlug): ?self
    {
        return static::$instances[$pluginSlug] ?? null;
    }

    /**
     * Construct the PluginInfo instance
     * @param string $pluginFile
     */
	public function __construct(string $pluginFile)
    {
        add_action('extra_plugin_headers', [PluginHeadersHandler::class, 'addExtraPluginHeaders'], 10, 1);

        $this->pluginFilePath = wp_normalize_path($pluginFile);
		$this->root = trailingslashit(wp_normalize_path(plugin_dir_path($this->getPluginFilePath())));
        $this->rootUrl = set_url_scheme(plugin_dir_url($this->getPluginFilePath()), 'https');
		$this->pluginData = $this->extractPluginData();
	}

    /**
     * Set plugin slug - consider add it as header in plugin file instead "Plugin Slug:"
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Set a named absolute path
     * @param string $name
     * @param string $path
     * @return $this
     */
    public function setNamedPath(string $name, string $path): self
    {
        $path = wp_normalize_path($path);

        if(is_dir($path)) {
            $path = trailingslashit($path);
        }

        $this->namedPaths[$name] = $path;

        return $this;
    }

    /**
     * Set a named absolute url
     * @param string $name
     * @param string $url
     * @return $this
     */
    public function setNamedUrl(string $name, string $url): self
    {
        $this->namedUrls[$name] = $url;

        return $this;
    }

    /**
     * Set a named parameter
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setNamedParameter(string $name, mixed $value): self
    {
        $this->namedParams[$name] = $value;

        return $this;
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

		return get_plugin_data($this->getPluginFilePath());
	}

    /**
     * Get data from plugins data
     * @param string $data_name
     * @param string|null $default
     * @return string
     */
    public function getData(string $dataName, string $default = null): string
    {
        if(!isset($this->pluginData[$dataName])) {
            return $default;
        }

        return (string) $this->pluginData[$dataName];
    }

    /**
     * Get a named path
     * @param string $name
     * @return string|null
     */
    public function getNamedPath(string $name): ?string
    {
        return $this->namedPaths[$name] ?? null;
    }

    /**
     * Get a named URL
     * @param string $name
     * @return string|null
     */
    public function getNamedUrl(string $name): ?string
    {
        return $this->namedUrls[$name] ?? null;
    }

    /**
     * Get a named Parameter
     * @param string $name
     * @return mixed
     */
    public function getNamedParameter(string $name): mixed
    {
        return $this->namedParams[$name] ?? null;
    }

    /**
     * Get Plugin file path
     * @return string
     */
    public function getPluginFilePath(): string
    {
        return $this->pluginFilePath;
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
     * Get root url for the plugin with a trailing slash and https scheme
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * Base name of plugin ex. "plugin-name/plugin-name.php"
     * @return string
     */
	public function getBaseName(): string
    {
		return plugin_basename($this->getPluginFilePath());
	}

    /**
     * Get slug of plugin - Use base name if not set
     * @return string
     */
    public function getSlug(): string
    {
        if(!empty($this->slug)) {
            return $this->slug;
        }

        return $this->getData('Plugin Slug', static::getBaseName());
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
     * Get URL to plugin website
     * @return string
     */
    public function getPluginURI(): string
    {
        return $this->getData('PluginURI', '');
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
     * Get description of plugin
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData('Description', '');
    }

    /**
     * Get author html link
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->getData('Author', '');
    }

    /**
     * Get url to author website
     * @return string
     */
    public function getAuthorURI(): string
    {
        return $this->getData('AuthorURI', '');
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
    public function getRequiresWPVersion(): string
    {
        return $this->getData('RequiresWP', '');
    }

    /**
     * Get which PHP version is required at least
     * @return string
     */
    public function getRequiresPHPVersion(): string
    {
        return $this->getData('RequiresPHP', '');
    }

    /**
     * Get update URL
     * @return string
     */
    public function getUpdateURI(): string
    {
        return $this->getData('UpdateURI', '');
    }

    /**
     * Get title
     * @return array
     */
    public function getTitle(): string
    {
        return $this->getData('Title', '');
    }

    /**
     * Get author name
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->getData('AuthorName', '');
    }
}