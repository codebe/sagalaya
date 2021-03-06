<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Log
 */

namespace Zend\Log\Writer;

use FirePHP as FirePHPService;
use Zend\Log\Formatter\FirePhp as FirePhpFormatter;
use Zend\Log\Logger;

/**
 * @category   Zend
 * @package    Zend_Log
 * @subpackage Writer
 */
class FirePhp extends AbstractWriter
{
    /**
     * The instance of FirePhp that is used to log messages to.
     * 
     * @var FirePhp\FirePhpInterface
     */
    protected $firephp;

    /**
     * Initializes a new instance of this class.
     * 
     * @param null|FirePhp\FirePhpInterface $instance An instance of FirePhpInterface
     *        that should be used for logging
     */
    public function __construct(FirePhp\FirePhpInterface $instance = null)
    {
        $this->firephp   = $instance;
        $this->formatter = new FirePhpFormatter();
    }

    /**
     * Write a message to the log.
     *
     * @param array $event event data
     * @return void
     */
    protected function doWrite(array $event)
    {
        if (!$this->firephp->getEnabled()) {
            return;
        }

        $line = $this->formatter->format($event);

        switch ($event['priority']) {
            case Logger::EMERG:
            case Logger::ALERT:
            case Logger::CRIT:
            case Logger::ERR:
                $this->firephp->error($line);
                break;
            case Logger::WARN:
                $this->firephp->warn($line);
                break;
            case Logger::NOTICE:
            case Logger::INFO:
                $this->firephp->info($line);
                break;
            case Logger::DEBUG:
                $this->firephp->trace($line);
                break;
            default:
                $this->firephp->log($line);
                break;
        }
    }

    /**
     * Gets the FirePhp instance that is used for logging.
     * 
     * @return FirePhp\FirePhpInterface
     */
    public function getFirePhp()
    {
        // Remember: class names in strings are absolute; thus the class_exists 
        // here references the canonical name for the FirePHP class
        if (!$this->firephp instanceof FirePhp\FirePhpInterface
            && class_exists('FirePHP')
        ) {
            // FirePHPService is an alias for FirePHP; otherwise the class 
            // names would clash in this file on this line.
            $this->setFirePhp(new FirePhp\FirePhpBridge(new FirePHPService()));
        }
        return $this->firephp;
    }

    /**
     * Sets the FirePhp instance that is used for logging.
     * 
     * @param  FirePhp\FirePhpInterface $instance The FirePhp instance to set.
     * @return FirePhp
     */
    public function setFirePhp(FirePhp\FirePhpInterface $instance)
    {
        $this->firephp = $instance;
        return $this;
    }
}
