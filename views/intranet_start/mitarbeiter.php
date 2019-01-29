<? if (sizeof($intranets) >1) : ?>
    <?= $this->render_partial('_partials/intranet_selector', array('intranets' => $intranets)) ?>
<? endif ?>


<? if ($flash['question']): ?>
    <?= $flash['question'] ?>
<? endif; ?>
		
<div class="mitte"><div class="haupttabelle">
			<div class="hauptlinks"></div>
			<div class="rechts">
				<!--<div align="center"><a href="index.php?id=144"><img src="/fileadmin/template/img/suche1.png" alt=""></a></div>
				<!--<div align="center"><a href="index.php?id=146"><img src="/fileadmin/template/img/suche2.png" alt=""></a></div>
				<br>

               	 <!--  CONTENT ELEMENT, uid:73/textpic [begin] -->
                <div id="c73" class="csc-default csc-space-after-25">
                <!--  Image block: [begin] -->
                    <div class="csc-textpic-text">
                <!--  Text: [begin] -->
                    <img src="<?=$plugin->getPluginURL().'/assets/images/Kursstart.png' ?>" alt="" border="0" width="100%">
                    <h2 class="intranet"><a href="<?=$GLOBALS['ABSOLUTE_URI_STUDIP']?>dispatch.php/my_courses" title="Zur ausf�hrlichen �bersicht" class="internal-link">Meine Angebote/Kurse/Projekte</a></h2>
                    <? foreach ($courses as $course){ ?>
                    <section class="contentbox course">
                        <a href='<?=$GLOBALS['ABSOLUTE_URI_STUDIP']. 'seminar_main.php?auswahl=' . $course['Seminar_id'] ?>'><?= $course['Name'] ?></a></section>
                        
                    <?}
                    
                    if (count($courses) > 6){
                    ?>
                        <a class="all_courses" href="#"></a>
                    <?}

                    ?>
                    <hr>
                    <!--  Text: [end] -->
                    </div>
                    <!--  Image block: [end] -->
                </div>
                <!--  CONTENT ELEMENT, uid:73/textpic [end] -->

                
                 <? foreach ($sidebarNewsTemplates as $course_id => $template) : ?>
                    <!--  CONTENT ELEMENT, uid:434/textpic [begin] -->
                        <div class="intranet_news csc-default csc-space-after-25">
                        <!--  Image block: [begin] -->
                            <div class="csc-textpic csc-textpic-intext-right csc-textpic-equalheight"><div class="csc-textpic-text">
                        <!--  Text: [begin] -->
                            <img src="<?=CourseAvatar::getAvatar($course_id)->getURl('original') ?>" alt="" border="0" width="100%" max-height='171px'>
                            <h2 class="intranet">
                                <div style = 'display:flex; flex-wrap: wrap; justify-content: space-between; margin-right: 20px;'>
                                    <a href="" title="Opens internal link in current window" class="internal-link"><?= $newsCaptions[$course_id] ?></a>
                                    <? if ($GLOBALS['perm']->have_studip_perm('dozent', $course_id)){ ?>
                                    <a href="<?=URLHelper::getLink("dispatch.php/news/edit_news/new/" . $course_id) ?>" rel="get_dialog">
                                        <?= Icon::create('add', 'clickable')?>             
                                    </a>
                                    <? } ?>
                                </div>
                            </h2>

                            <?= $this->render_partial($template, compact('widget')) ?>

                            <hr>
                        <!--  Text: [end] -->
                            </div></div>
                        <!--  Image block: [end] -->
                            </div>
                        <!--  CONTENT ELEMENT, uid:434/textpic [end] -->
                <? endforeach ?>
        
        
                   <!--  CONTENT ELEMENT, uid:75/textpic [begin] -->
<!--                <div id="c75" class="csc-default csc-space-after-25">
                  Image block: [begin] 
                    <div class="csc-textpic-text">
                  Text: [begin] 
                    <img src="<?=$plugin->getPluginURL().'/assets/images/question-mark.jpg' ?>" alt="" border="0" width="100%">
                    <h2 class="intranet"><a href="" title="" class="internal-link">Geb�udemanagement</a></h2>
                    
                    <section class="contentbox themen">
                        <a href='<?=$this->controller->url_for('start/gebaeudemanagement')?>'>Leitfaden f�r neue DozentInnen (PDF)</a>
                    </section>
                    <section class="contentbox themen">
                        <a href='<?=$this->controller->url_for('start/gebaeudemanagement')?>'>Formular xyz (DOC)</a>
                    </section>
                    <section class="contentbox themen">
                        <a href='<?=$this->controller->url_for('intranet_start/infos')?>'>Weitere Infos </a>
                    </section>
                    
                    <hr>
                    </div>                
                </div>-->
                    <!-- CONTENT ELEMENT, uid:75/textpic [end] -->
                
                <!-- Dateien -->
                 <? foreach ($folderwithfiles_array as $course_id => $folderwithfiles) : ?>
                <!--  CONTENT ELEMENT, uid:14/textpic [begin] -->
                <div id="c14" class="csc-default csc-space-after-25">
                <!--  Image block: [begin] -->
                <div class="csc-textpic-text">
                
                <!--  Text: [begin] -->
                    <img src="<?= $plugin->getPluginURL().'/assets/images/unterlagen1.png' ?>" alt="" border="0" width="100%">
                    <h2 class="intranet"> 
                        <div style = 'display:flex; flex-wrap: wrap; justify-content: space-between; margin-right: 20px;'>
                        <a href="<?=$GLOBALS['ABSOLUTE_URI_STUDIP']?>folder.php?cid=<?=$course_id?>&cmd=tree" title="Direkt in den Dateibereich wechseln" class="internal-link"><?=$filesCaptions[$course_id]?></a>
                        <? if ($GLOBALS['perm']->have_studip_perm('dozent', $course_id)){ ?>
                            <a  href="<?=$GLOBALS['ABSOLUTE_URI_STUDIP']?>folder.php?cid=<?=$course_id?>&cmd=tree">
                                <?= Icon::create('add', 'clickable')?>           
                            </a>
                        <? } ?>
                        </div>
                    </h2>
                        <?= $this->render_partial('_partials/folder_with_files', array('folderwithfiles' => $folderwithfiles, 'parentfolder' => $parentfolder, 'parent' => NULL)) ?>
                    <hr>
                <!--  Text: [end] -->
                </div>
                <!--  Image block: [end] -->
                </div>
                <!--  CONTENT ELEMENT, uid:14/textpic [end] -->
                <? endforeach ?>
     
                
  
				<h4 class="intranet">Unsere Angebote</h4>
				<table class="dsR4" cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=64" target="_blank"><img src="<?= $plugin->getPluginURL()."/assets/images/pro_gesellschaft.png" ?>" alt="" border="0" width="73" height="72"><br>
							Gesellschaft</a></div></td>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=65" target="_blank"><img src="<?= $plugin->getPluginURL()."/assets/images/pro_paedagogik.png" ?>" alt="" border="0" width="73" height="72"><br>
						P�dagogik</a></div></td>
						<td class="dsR15"><a href="https://www.kvhs-ammerland.de/index.php?id=66" target="_blank"></a><div class="zentriert"><a href="index.php?id=66"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_zielgruppen.png" ?>" alt="" border="0" width="73" height="72"><br>
							Zielgruppen</a></div></td>
					</tr>
					<tr>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=67" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_grundbildung.png" ?>" alt="" border="0" width="72" height="72"><br>
							Grundbildung</a></div></td>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=68" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_gesundheit.png" ?>" alt="" border="0" width="73" height="72"><br>
							Gesundheit</a></div></td>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=69" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_beruf.png" ?>" alt="" border="0" width="73" height="72"><br>
							Beruf</a></div></td>
					</tr>
					<tr>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=70" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_sprachen.png" ?>" alt="" border="0" width="73" height="72"><br>
							Sprachen</a></div></td>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=71" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_kultur.png" ?>" alt="" border="0" width="73" height="72"><br>
						Kultur</a></div></td>
						<td class="dsR15"><div class="zentriert"><a href="https://www.kvhs-ammerland.de/index.php?id=4" target="_blank"><img src="<?=$plugin->getPluginURL()."/assets/images/pro_beruf.png" ?>" alt="" border="0" width="73" height="72"><br>
						Projekte</a></div></td>
					</tr>
				</tbody></table>
				
			</div>
	<div class="haupt">

        <div style='width: 400px; margin:auto'>
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td class="dsR4"><div class="zentriert">
                        <a data-dialog="title=Feedback geben;width=300px; height=200px;" href="<?=$this->controller->url_for('intranet_start/feedback_chat')?>" title="Feedback"><?= Icon::create('chat2', 'clickable', ['size' => 100])?></a>
                    </div>
                    </td>
                    <td class="dsR4"><div class="zentriert">
                        <a data-dialog href="<?=$this->controller->url_for('intranet_start/feedback_form')?>" title="St�rungsmeldung" ><?= Icon::create('exclaim-circle-full', 'clickable', ['size' => 100])?></a>
                    </div>
                                </td>
                    <td class="dsR4"><div class="zentriert">
                        <a href="https://www.kvhs-ammerland.de/fileadmin/user_upload/Programmheft/6_Dozentenfortbildungen.pdf" target='_blank' title="Zu den Dozentenfortbildungen auf unserer Homepage" target='_blank'><?= Icon::create('doctoral_cap', 'clickable', ['size' => 100])?></a>
                    </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <!-- News -->
    <? foreach ($newsPosition as $course_id => $position) : ?>
        <? $template = $newsTemplates[$course_id]; ?>
        <!--  CONTENT ELEMENT, uid:434/textpic [begin] -->
		<div class="intranet_news csc-default csc-space-after-25">
		<!--  Image block: [begin] -->
			<div class="csc-textpic csc-textpic-intext-right csc-textpic-equalheight"><div class="csc-textpic-text">
		<!--  Text: [begin] -->
            <img src="<?=CourseAvatar::getAvatar($course_id)->getURl('original') ?>" alt="" border="0" width="100%" max-height='171px'>
			<h2 class="intranet">
                <div style = 'display:flex; flex-wrap: wrap; justify-content: space-between; margin-right: 20px;'>
                    <a href="" title="Opens internal link in current window" class="internal-link"><?= $newsCaptions[$course_id] ?></a>
                    <? if ($GLOBALS['perm']->have_studip_perm('dozent', $course_id)){ ?>
                    <a href="<?=URLHelper::getLink("dispatch.php/news/edit_news/new/" . $course_id) ?>" rel="get_dialog">
                        <?= Icon::create('add', 'clickable')?>             
                    </a>
                    <? } ?>
                </div>
            </h2>

            <?= $this->render_partial($template, compact('widget')) ?>
            
            <hr>
		<!--  Text: [end] -->
			</div></div>
		<!--  Image block: [end] -->
			</div>
	<!--  CONTENT ELEMENT, uid:434/textpic [end] -->
    <? endforeach ?>
		
    
    <? if (PluginManager::getInstance()->getPlugin('SchwarzesBrettWidget')) : ?>
    <!--  CONTENT ELEMENT, uid:42/textpic [begin] -->
		<div id="c42" class="csc-default csc-space-after-25">
		<!--  Image block: [begin] -->
			<div class="csc-textpic-text">
		<!--  Text: [begin] -->
            <img src="<?=$plugin->getPluginURL().'/assets/images/schwarzesbrett.jpg' ?>" alt="" border="0" width="100%">
			<h2 class="intranet"> <a href="<?=URLHelper::getLink("/plugins.php/schwarzesbrettplugin/category")?>" title="" class="internal-link">Schwarzes Brett</a>
                <a style="margin-left: 74%;" data-dialog='' href="<?=URLHelper::getLink($GLOBALS['ABSOLUTE_URI_STUDIP']. "/plugins.php/schwarzesbrettplugin/article/create", array('return_to' => $GLOBALS['ABSOLUTE_URI_STUDIP']. 'plugins.php/IntranetMitarbeiterInnen/start'))?>">
                    <?= Icon::create('add', 'clickable')?>            
                </a>      
            </h2>
                <?php 
                $schwarzesBrett = PluginManager::getInstance()->getPlugin('SchwarzesBrettWidget');
                $template = $schwarzesBrett->getPortalTemplate();
                $template = $schwarzesBrett->getContent();
                $layout = $GLOBALS['template_factory']->open('shared/index_box');
                $layout = NULL;
                echo $template;
                //echo $template->render(NULL, $layout);
                //$layout->clear_attributes();
                ?>
            <hr>
		<!--  Text: [end] -->
			</div>
		<!--  Image block: [end] -->
			</div>
	<!--  CONTENT ELEMENT, uid:42/textpic [end] -->
    <? endif ?>
    
    
    
    <? if (false && count($courses_upcoming) >0 ){ ?>
	<!--  CONTENT ELEMENT, uid:13/textpic [begin] -->
		<div id="c13" class="csc-default csc-space-after-25">
		<!--  Image block: [begin] -->
			<div class="csc-textpic-text">
		<!--  Text: [begin] -->
            <img src="<?=$plugin->getPluginURL().'/assets/images/Kursstart.png' ?>" alt="" border="0" width="100%">
			<h2 class="intranet"> <a href="index.php?id=21" title="Opens internal link in current window" class="internal-link">Kurse, die demn�chst starten</a>
                <? if ($admin){ ?>
                    <a style="margin-left: 58%;" href="<?= $this->controller->url_for('start/insertCoursebegin')?>" rel="get_dialog">
                        <?= Icon::create('add', 'clickable')?>             
                    </a>
                 <? } ?>        
            </h2>
            <? foreach ($courses_upcoming as $course){ ?>
                    <section class="contentbox">
                        
                        <? if ($admin){ ?>
                            <a href="<?= $this->controller->url_for('start/insertCoursebegin/' . $course['event_id'])?>" rel="get_dialog">
                            <img src="/assets/images/icons/blue/edit.svg" alt="edit" class="icon-role-clickable icon-shape-add" width="16" height="16">            
                            </a>
                        <? } ?>   
                        <a target='_blank'  href='<?= $course['description'] ?>'><?= $course['summary'] ?>  <?= date('d.m.Y', $course['start']) ?></a>
                        
                    </section>
                        
                    <?}?>
            <hr>
		<!--  Text: [end] -->
			</div>
		<!--  Image block: [end] -->
			</div>
	<!--  CONTENT ELEMENT, uid:13/textpic [end] -->
    <? } ?>
    
    
		
		</div></div>
		</div>

<script>
    var courses = 3;
hidecourses = "- zuklappen";
showcourses = "+ Alle Kurse anzeigen";

$(".all_courses").html( showcourses );
$(".course:not(:lt("+courses+"))").hide();

$(".all_courses").click(function (e) {
   e.preventDefault();
       if ($(".course:eq("+courses+")").is(":hidden")) {
           $(".course:hidden").show();
           $(".all_courses").html( hidecourses );
       } else {
           $(".course:not(:lt("+courses+"))").hide();
           $(".all_courses").html( showcourses );
       }
});


$(".folder_open").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).siblings('.file_download').toggle();
    $(this).siblings('.folder').toggle();
 });
</script>