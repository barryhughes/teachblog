<?php
/*
	Teachblog - provides a teacher led collaborative blogging environment
	Copyright (C) 2013 Barry Hughes

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http: *www.gnu.org/licenses/>.
*/

/**
 * Allows posts to be created and edited from the front end of the website (so that students
 * need not login to the dashboard to participate).
 */
class Teachblog_Front_Editor extends Teachblog_Base_Object {
	protected $id;
	protected $owner;

	protected function setup() {
		add_shortcode('teachblog_editor', array($this, 'public_editor'));
	}


	public function public_editor() {
		$editor = new Teachblog_Template('editor');
		return $editor;
	}
}