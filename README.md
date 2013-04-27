CakePHP HeatMap plugin
======================
Easy to use plugin for capturing mouse events and visualising them back in form of a heatmap
* version: 0.1
* author: Michal Vondracek <info@michalvondracek.cz>
* license: MIT

more at http://www.cakemag.cz

submodules
----------
* heatmap.js (http://www.patrick-wied.at/static/heatmapjs/index.html) - Patrick Wied <contact@patrick-wied.at> 
* jquery.event-playback.js (https://github.com/hmert/jquery-event-playback) - TJ Holowaychuk <tj@vision-media.ca>

Install
=======
* copy the archive into Plugin/Heat
* add CakePlugin::loadAll(); to Config/bootstrap.php
* create table by importing Config/Schema/heat.sql

Use
===
* insert the element in the layout.ctp 
* add ?heat=1 to url, and you'll see the results

layout.ctp
----------
 <body>
 <?php echo $this->element('Heat.heat', array('key' => 'michalvondracek.cz', 'duration' => 10000)); ?>
 .
 .

Parameters
==========
* **key** - the key, project key, used when saving info and vice versa when loading this key and url is used as a filter
* **duration** - in miliseconds, duration of capturing sequence, periodicity of saving (default 5000 = 5sec)

TODO
====
* change the logic from capturing the mouse movements to click
* add scroll visualising

License
=======
(The MIT License)

Copyright © 2013 Michal Vondracek <info@michalvondracek.cz>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the ‘Software’), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED ‘AS IS’, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
