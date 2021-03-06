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
 * Provides a form to let students request a user account and associated blog. A teacher/site administrator
 * can then review the request and approve.
 */
class Teachblog_Blog_Request_Form extends Teachblog_Base_Object {
    /**
     * @var Teachblog_Blogger
     */
    protected $user;


    protected function setup() {
        add_shortcode('teachblog_blog_request_form', array($this, 'shortcode'));
    }


    public function shortcode() {
        $this->user = Teachblog_Blogger::current_user();

        return $this->request_form();
    }


    protected function request_form() {
        list($origin, $origin_hash) = Teachblog_Form::get_container_references();

        $form = new Teachblog_Template('student_content/blog_request_form', array(
            'notices' => $this->get_form_notices(),
            'successful_submission_made' => $this->check_for_successful_submission(),
            'has_blog' => $this->user->has_blog(),
            'is_user' => ($this->user->get_user_id() !== false),
            'originating_post' => $origin,
            'originating_hash' => $origin_hash
        ));
        return apply_filters('teachblog_request_form', $form);
    }


    protected function get_form_notices() {
        return (array) $this->system->student_content->blog_requests->blog_request_submissions->notices;
    }


    protected function check_for_successful_submission() {
        return (bool) $this->system->student_content->blog_requests->blog_request_submissions->success;
    }
}