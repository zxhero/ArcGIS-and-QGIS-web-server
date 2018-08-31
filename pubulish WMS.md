#在Lizmap web client发布QGIS project

##Generate QGIS WMS project
安装lizmap plugin<br>
>    'Plugin' manu -> 'Manage and Install Plugins'

导入openstreetmap
>    'Add Vector Layer' -> 选择.osm.pdf

配置工程
>    'Project' manu -> 'Project Propertities'
>>    -> 'CRS' -> Enable 'on the fly CRS transformation'  
>>    -> 'OWS Server'
>>>   -> 填写必要的信息  
>>>   -> Enable the layers you want to publish WFS and WCS  
>>>   -> Enable CRS restrictions  
>>>   -> Enable Advertised extent  

>>    Check that the paths are saved relative in the general tab of the project properties window

>    click on 'Lizmap' under the 'web' menu and click on the 'Map' tab and tick the 'map tools' that you want in your map browser.  
>    You can set the 'Initial map extent' to the 'map canvas' option.  
>    保存后，你可以看到在qgis工程目录下有.qgs.cfg文件

##Lizmap web client configuration
登陆
>    login: admin  
>    password: admin  

配置

>    Go back to the top right corner and click on the 'admin' button and select 'My account' and click on 'Lizmap configuration' in the left  
>    Scroll down this page and you will see the 'Repository' settings. Here you can set the 'local folder' of the 'QGIS' demo as:
>>   /var/www/lizmap-web-client-release_3_0/lizmap/install/qgis/

>    Set all the 'rights' to 'admins' for now. If all goes well when you click on 'View' you should see the project as a thumbnail image.  
>    Now create a second 'Repository' with the 'local folder' set to (in my case)
>>    /home/zxhero/NUS/

>    you select the 'Project' button (top right) you should see your two projects listed one under the other.

##references
>    https://docs.3liz.com/en/publish/publish_with_ftp.html  
>    https://docs.qgis.org/2.18/en/docs/user_manual/working_with_ogc/server/index.html  
>    http://www.paulshapley.com/2016/08/qgis-serverinstalling-qgis-lizmap.html