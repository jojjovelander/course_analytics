## Overview
This plugin is one of a group required to show Moodle user course analytics in a simple dashboard for research purposes.
The other plugins are:
* [Angular Dashboard](https://github.com/jojjovelander/moodle-charts)
* [Moodle Web Service Plugin](https://github.com/jojjovelander/course_statistics_webservice)
* [Moodle Dashboard Block Plugin](https://github.com/jojjovelander/course_analytics/)
* [Moodle Analytics Dashboard Report](https://github.com/jojjovelander/analytics_dashboard)

The basic workflow is as follows:
![Overview Image](https://raw.githubusercontent.com/jojjovelander/course_statistics_webservice/develop/overview.png)

## Moodle Dashboard Block Plugin
This plugin is only accessible for authenticated Moodle users and is used to generate a Moodle block.  The idea is that this block can be embedded in a Moodle course's homepage to offer users a shortcut to their usage analytics.  The plugin generates an OTP token and embeds it in the HTML for usage by an [Angular Dashboard web app](https://github.com/jojjovelander/moodle-charts) which is fetched from Firebase storage.
