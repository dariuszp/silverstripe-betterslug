<?php

use Cocur\Slugify\Slugify;

class Better_Ss_Transliterator extends Object {

    /**
     * @var Slugify
     */
    protected static $slugify;

    public function toASCII($source) {
        if (!self::$slugify) {
            self::$slugify = new Slugify();
            $rulesets = $this->config()->get('rulesets');
            if (is_array($rulesets)) {
                foreach($rulesets as $name => $ruleset) {
                    if (!is_array($ruleset)) {
                        throw new \Exception('Ruleset must by an array');
                    }
                    if (!(isset($ruleset['map']) && is_array($ruleset['map']))) {
                        throw new \Exception('Ruleset map must be an array');
                    }
                    self::$slugify->addRuleset($name, $ruleset);
                    $isActive = (isset($ruleset['active']) && $ruleset['active']) ? true : false;
                    if ($isActive) {
                        self::$slugify->activateRuleset($name);
                    }
                }
            }

        }

        return self::$slugify->slugify($source);
    }

}