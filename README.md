CakePHP-Heat
============

CakePHP HeatMap plugin

Install:

* copy the archive into Plugin/Heat
* add CakePlugin::loadAll(); to Config/bootstrap.php
* create table by importing Confing/Schema/heat.sql
* insert the element in the layout.ctp right after opening tag <body> 

layout.ctp:

 <body>
 <?php echo $this->element('Heat.heat', array('key' => 'outlet.cz', 'duration' => 10000)); ?>
 .
 .