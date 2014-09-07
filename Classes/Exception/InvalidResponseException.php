<?php
namespace Sto\Mediaoembed\Exception;

/*                                                                        *
 * This script belongs to the TYPO3 extension "mediaoembed".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * This Exception will be thrown when the server returned a response that could not be parsed.
 */
class InvalidResponseException extends RequestException {

	/**
	 * Initializes the Exception with a default message and a default code (1303402784).
	 *
	 * @param string $response
	 */
	public function __construct($response) {
		$message = 'The server returned an invalid response that could not be parsed. The servers response was: %s';
		$message = sprintf($message, htmlspecialchars($response));
		parent::__construct($message, 1303402784);
	}
}