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
 * Display course related analytics information
 *
 * @package    report_analytics_dashboard
 * @copyright  2020 Johanna Velander <johanna@adhibit.se>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_login();
$context = context_system::instance();
/*require_capability('report/analytics_dashboard:view', $context);*/
$actionurl = new moodle_url('/report/analytics_dashboard/index.php');
$PAGE->set_context($context);
$PAGE->set_url('/report/analytics_dashboard/index.php');
$PAGE->set_title(get_string('pluginname', 'report_analytics_dashboard'));
$PAGE->set_heading(get_string('pluginname', 'report_analytics_dashboard'));

echo $OUTPUT->header();

$renderable = new report_analytics_dashboard_renderable();
$renderer = $PAGE->get_renderer('report_analytics_dashboard');

echo $renderer->render($renderable);
echo $renderer->generate_analytics_dashboard();
echo $OUTPUT->footer();