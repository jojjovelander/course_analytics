<?php

class block_course_analytics extends block_base
{

    public function init()
    {
        $this->title = get_string('pluginname', 'block_course_analytics');
    }

    function generate_url()
    {
        global $COURSE;
        $course = $COURSE->id;
        return "{{ domain_name }}/report/analytics_dashboard?id=" . $course;
    }

    function generate_html_link()
    {
        return "<a href=\"" . $this->generate_url() . "\">View your analytics dashboard!</a>";
    }

    public function get_content()
    {
        return $this->generate_html_link();
    }

    public function instance_allow_multiple()
    {
        return false;
    }

    function has_config()
    {
        return false;
    }


}

