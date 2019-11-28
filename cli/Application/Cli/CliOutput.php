<?php
/**
 * Part of the Joomla! Tracker application.
 *
 * @copyright  Copyright (C) 2012 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace Application\Cli;

use Application\Cli\Output\Processor\ProcessorInterface;

/**
 * Class CliOutput
 *
 * @since       1.0
 * @deprecated  2.0  Use the `joomla/console` package instead
 */
abstract class CliOutput
{
	/**
	 * Color processing object
	 *
	 * @var    ProcessorInterface
	 * @since  1.0
	 */
	protected $processor;

	/**
	 * Constructor
	 *
	 * @param   ProcessorInterface  $processor  The output processor.
	 *
	 * @since   1.1.2
	 */
	public function __construct(ProcessorInterface $processor = null)
	{
		$this->setProcessor(($processor instanceof ProcessorInterface) ? $processor : new Output\Processor\ColorProcessor);
	}

	/**
	 * Set a processor
	 *
	 * @param   ProcessorInterface  $processor  The output processor.
	 *
	 * @return  Stdout  Instance of $this to allow chaining.
	 *
	 * @since   1.0
	 */
	public function setProcessor(ProcessorInterface $processor)
	{
		$this->processor = $processor;

		return $this;
	}

	/**
	 * Get a processor
	 *
	 * @return  ProcessorInterface
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function getProcessor()
	{
		if ($this->processor)
		{
			return $this->processor;
		}

		throw new \RuntimeException('A ProcessorInterface object has not been set.');
	}

	/**
	 * Write a string to an output handler.
	 *
	 * @param   string   $text  The text to display.
	 * @param   boolean  $nl    True (default) to append a new line at the end of the output string.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @codeCoverageIgnore
	 */
	abstract public function out($text = '', $nl = true);
}
