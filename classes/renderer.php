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
 * Analytics Dashboard renderer
 *
 * @package    report_analytics_dashboard
 * @copyright  2020 Johanna Velander <johanna@adhibit.se>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Analytics Dashboard renderer class
 *
 * @package    report_analytics_dashboard
 * @copyright  2020 Johanna Velander <johanna@adhibit.se>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_analytics_dashboard_renderer extends plugin_renderer_base
{
    /** @var report_analytics_dashboard_renderable instance of Analytics Dashboard renderable. */
    protected $renderable;

    /**
     * Renderer constructor.
     *
     * @param report_analytics_dashboard_renderable $renderable Analytics Dashboard renderable instance.
     */
    protected function render_report_analytics_dashboard(report_analytics_dashboard_renderable $renderable)
    {
        $this->renderable = $renderable;
    }

    /**
     * Display course related Analytics Dashboards.
     */
    public function generate_analytics_dashboard()
    {
        echo $this->renderable->report_generate_analytics_dashboard();
    }
}
