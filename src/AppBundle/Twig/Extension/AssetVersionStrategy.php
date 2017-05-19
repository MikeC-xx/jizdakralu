<?php

namespace AppBundle\Twig\Extension;

use Symfony\Component\Asset\VersionStrategy\VersionStrategyInterface;

class AssetVersionStrategy implements VersionStrategyInterface
{
    /**
     * @var string
     */
    private $root;

    /**
     * @param string $root
     */
    public function __construct($root)
    {
        $this->root = $root;
    }

    /**
     * Should return the version by the given path (starts from public root)
     *
     * @param string $path
     * @return string
     */
    public function getVersion($path)
    {
        $fullPath = $this->root . '/../web/' . $path;
        if (file_exists($fullPath) && !is_dir($fullPath)) {
            $version = filemtime($fullPath);
            if (!$version) {
                $version = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            }

            return $version;
        } else {
            return false;
        }
    }

    /**
     * Determines how to apply version into the given path
     *
     * @param string $path
     * @return string
     */
    public function applyVersion($path)
    {
        $version = $this->getVersion($path);
        return $version ? sprintf('%s?v=%s', $path, $this->getVersion($path)) : $path;
    }
}
