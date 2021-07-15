<?php

namespace LF\EnvDiff;

class Config
{
    const DEFAULT_TARGET = '.env';
    const DEFAULT_DIST   = '.env.dist';

    /** @var string */
    private $dist;

    /** @var string */
    private $target;

    /** @var bool */
    private $keepOutdatedEnv;

    /** @var bool */
    private $supportLocalEnv;

    /**
     * Config constructor.
     *
     * @param string $dist
     * @param string $target
     * @param bool $keepOutdatedEnv
     * @param bool $supportLocalEnv
     */
    public function __construct($dist = self::DEFAULT_DIST, $target = self::DEFAULT_TARGET, $keepOutdatedEnv = true, $supportLocalEnv = false)
    {
        $this->dist            = $dist;
        $this->target          = $target;
        $this->keepOutdatedEnv = $keepOutdatedEnv;
        $this->supportLocalEnv = $supportLocalEnv;
    }

    /**
     * @param array $config
     *
     * @return static
     */
    public static function createFormArray(array $config = [])
    {
        if (empty($config['target'])) {
            $config['target'] = '.env';
        }
        if (empty($config['dist'])) {
            $config['dist'] = $config['target'] . '.dist';
        }
        if (!isset($config['keep-outdated'])) {
            $config['keep-outdated'] = true;
        }

        if (!isset($config['support-local-env'])) {
            $config['support-local-env'] = false;
        }

        return new static($config['dist'], $config['target'], (bool) $config['keep-outdated'], (bool) $config['support-local-env']);
    }

    /**
     * @return string
     */
    public function getDist(): string
    {
        return $this->dist;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return boolean
     */
    public function isKeepOutdatedEnv(): bool
    {
        return $this->keepOutdatedEnv;
    }

    /**
     * @return boolean
     */
    public function isSupportLocalEnv(): bool
    {
        return $this->supportLocalEnv;
    }

}
