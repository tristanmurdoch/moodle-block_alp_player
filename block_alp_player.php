<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * 
 *
 * @package   block_alp_player
 * @copyright 2016 Tristan Mackay
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_alp_player extends block_base {
    public function init() {
        global $COURSE;
        $this->blockname = get_class($this);
        $this->title = get_string('pluginname', 'block_alp_player');
        $this->courseid = $COURSE->id;

    }

   public function instance_allow_multiple() {
        return false;
    }

    public function has_config() {
        return true;
    }

    public function get_content() {
        global $CFG, $COURSE, $USER;
        if ($COURSE->shortname !== null) {
            $this->content = new stdClass;
            $this->content->text = '<div class="block_alp_player"><a target="_blank" href="'.
                                   $CFG->wwwroot .'/blocks/alp_player/launch.php?id='.$COURSE->id.
                                   '"><img src="'. $CFG->wwwroot .'/blocks/alp_player/pix/echo360_logo_160x60.png"'.
                                   ' border="0" alt="Echo360"/><br/>'.get_string('launchtext', 'block_alp_player').'</a></div>';
            return $this->content;
        }

         $this->content = new stdClass;
         $this->content->text = 'No Moodle Shortname';
         $this->content->footer = '';

        return $this->content;
    }
}