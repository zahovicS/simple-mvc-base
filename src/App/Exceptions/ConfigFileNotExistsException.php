<?php

namespace Src\App\Exceptions;

/*
 _______      ___    ___ ________  _______   ________  _________  ___  ________  ________
|\  ___ \    |\  \  /  /|\   ____\|\  ___ \ |\   __  \|\___   ___\\  \|\   __  \|\   ___  \
\ \   __/|   \ \  \/  / | \  \___|\ \   __/|\ \  \|\  \|___ \  \_\ \  \ \  \|\  \ \  \\ \  \
 \ \  \_|/__  \ \    / / \ \  \    \ \  \_|/_\ \   ____\   \ \  \ \ \  \ \  \\\  \ \  \\ \  \
  \ \  \_|\ \  /     \/   \ \  \____\ \  \_|\ \ \  \___|    \ \  \ \ \  \ \  \\\  \ \  \\ \  \
   \ \_______\/  /\   \    \ \_______\ \_______\ \__\        \ \__\ \ \__\ \_______\ \__\\ \__\
    \|_______/__/ /\ __\    \|_______|\|_______|\|__|         \|__|  \|__|\|_______|\|__| \|__|
             |__|/ \|__|

*/

/**
 * 
 * Exception when the file does not exist within the configuration folder :p
 * 
 * 
 */

class ConfigFileNotExistsException extends \Exception
{
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}