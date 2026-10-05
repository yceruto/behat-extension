<?php

declare(strict_types=1);

use Behat\Config\Config;
use Behat\Config\Extension;
use Behat\Config\Profile;
use Yceruto\BehatExtension\Extension\ExceptionExtension;

// Behat 4 dropped YAML configuration, so this replaces behat.yml. The PHP config API exists
// since Behat 3.20, which is why the composer constraint starts there.
return (new Config())->withProfile(
    (new Profile('default'))->withExtension(new Extension(ExceptionExtension::class)),
);
