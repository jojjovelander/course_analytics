<?php

require_once("token_factory.php");

class block_course_analytics extends block_base
{
    public $course;
//    private $host = "https://moodle-charts-ng.web.app";
    private $host = "{{ angular_app_location }}";
    public $libraries = "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyB7nILSkrrMM4SJn506S8dTiSpPXg7sRIk\"></script>
<link href=\"https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap\" rel=\"stylesheet\">
<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" />
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/themes/prism.css\" />
<base href=\"/\">";

    public function init()
    {
        $this->title = get_string('pluginname', 'block_course_analytics');
    }

    public function get_content()
    {
        global $USER;
        return $this->createNgEmbedTags($USER->id);
        $this->content->text = $this->createNgEmbedTags($USER->id);
/*            'd38827d33f32d775c3f1',
            '7d7e9038a1cdbceb3d53',
            'eb2635ab82f006877924',
            '8ce323b8b996e553d51e',
            '730b775af566f24bd6f9');
        return $this->content;*/
    }

    public function instance_allow_multiple()
    {
        return false;
    }

    function has_config()
    {
        return false;
    }

    private function createNgEmbedTags($userId)
    {
        $token = token_factory::generateToken($userId, $this->course);
        $ngTags = "<link rel=\"stylesheet\" href=\"$this->host/{{ styles }}\"
        ><app-root token=\"$token\">
        <script src=\"$this->host/{{ runtime }}\" defer></script>
        <script src=\"$this->host/{{ polyfills-es5 }}\" nomodule defer></script>
        <script src=\"$this->host/{{ polyfills }}\" defer></script>
        <script src=\"$this->host/{{ main }}\" defer></script>";

        return $this->libraries . $ngTags;
    }

    /*    private function createNgEmbedTags($userId, $cssVersion, $runtimeVersion, $ployfullsES5Version, $polyfillsVersion, $mainVersion)
        {
            global $COURSE;

            $token = token_factory::generateToken($userId,  $COURSE->id);
            $ngTags = "<link rel=\"stylesheet\" href=\"$this->host/styles.$cssVersion.css\">
            <app-root courseId=\"$COURSE->id\" token=\"$token\" start=\"grouped-bar-chart\">
            <script src=\"$this->host/runtime.$runtimeVersion.js\" defer></script>
            <script src=\"$this->host/polyfills-es5.$ployfullsES5Version.js\" nomodule defer></script>
            <script src=\"$this->host/polyfills.$polyfillsVersion.js\" defer></script>
            <script src=\"$this->host/main.$mainVersion.js\" defer></script>";

            return $this->libraries . $ngTags;
        }*/
}
