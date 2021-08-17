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
        $this->content         =  new stdClass;
        $this->content->text   = "<a href=\"" . $this->generate_url() . "\">View your analytics dashboard!</a>";
        return $this->content;
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

