<?php

/**
 * (c) Nuna Akpaglo <princedorcis@gmail.com>.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prinx\Dotenv;

/**
 * Retrieve an environment variable.
 *
 * Look for an environment variables in the current .env file,
 * the $_ENV superglobal and using the built-in getenv function
 *
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function env(string $key = null, $default = null)
{
    $env = DotenvInstance::get();

    switch (\func_num_args()) {
        case 0:
            return \call_user_func([$env, 'all']);
        case 1:
            return \call_user_func([$env, 'get'], $key);
        default:
            return \call_user_func([$env, 'get'], $key, $default);
    }
}

/**
 * Add a temporary environment variable to the current loaded environment variables.
 *
 * @param  string $name
 * @param  mixed  $value
 * @return void
 */
function addenv(string $name, $value)
{
    $env = DotenvInstance::get();

    \call_user_func([$env, 'add'], $name, $value);
}

/**
 * Write an environment variable to the loaded .env file.
 *
 * @param  string $name
 * @param  mixed  $value
 * @return void
 */
function persistenv(string $name, $value)
{
    $env = DotenvInstance::get();

    \call_user_func([$env, 'persist'], $name, $value);
}

/**
 * Returns all the environment variables in the .env file as an array.
 *
 * @return array
 */
function allenv()
{
    $env = DotenvInstance::get();

    return \call_user_func([$env, 'all']);
}

/**
 * Returns the Dotenv instance.
 *
 * @return Dotenv
 */
function dotenv()
{
    return DotenvInstance::get();
}

/**
 * Load a specific .env file.
 *
 * @param  string $path
 * @return void
 */
function loadenv($path = null)
{
    DotenvInstance::load($path);
}
