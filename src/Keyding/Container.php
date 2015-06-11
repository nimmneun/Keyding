<?php

namespace Keyding;

/**
 * Just trying to figure out reflection basics.
 *
 * @author nimmneun
 * @since 07.06.2015 00:18
 */
class Container
{
    /**
     * @var object[] holding instantiated objects.
     */
    private $cache;

    /**
     * @var mixed[] holding args for current request.
     */
    private $args;

    /**
     * @param string $name
     * @return object|ReflectionParameter
     * @throws DependencyException
     */
    public function get($name)
    {
        if (isset($this->cache[$name]))
        {
            $object = $this->cache[$name];
        }
        else
        {
            $this->cache[$name] = $object = $this->reflect($name);
            $this->args = null;
        }

        return $object;
    }

    /**
     * @param string
     * @return ReflectionParameter
     * @throws DependencyException
     */
    private function reflect($name)
    {
        try
        {
            $class = new \ReflectionClass($name);
        }
        catch (Exception $e)
        {
            throw new DependencyException(sprintf('Failed to reflect invalid class %s', $name));
        }

        if (null === $constructor = $class->getConstructor())
        {
            if (isset($this->cache[$name]))
            {
                return $this->cache[$name];
            }
            else
            {
                $this->args[]= new $name();
                return $this->cache[$name] = new $name();
            }
        }

        if (0 === count($params = $constructor->getParameters()))
        {
            if (isset($this->cache[$name]))
            {
                return $this->cache[$name];
            }
            else
            {
                $this->args[]= new $name();
                return $this->cache[$name] = new $name();
            }
        }

        foreach ($params as $param)
        {
            if (null !== $param->getClass())
            {
                $this->reflect($param->getClass()->getName());
            }
            else
            {
                $this->args[] = $param->getName();
            }
        }

        try
        {
            $reflector = new \ReflectionClass($name);
        }
        catch (Exception $e)
        {
            throw new DependencyException(sprintf('Failed to resolve and instantiate %s', $name));
        }

        return $reflector->newInstanceArgs($this->args);
    }
}

class DependencyException extends \Exception {}
