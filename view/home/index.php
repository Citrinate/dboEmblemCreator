<script type="text/javascript">
    var colors = <?php echo json_encode($emblem_colors); ?>
</script>

<!--[If IE]><b>The emblem creator does not work in Internet Explorer!</b><br><br><![endif]-->
<table class="emblem-creator" width="100%">
    <tr>
        <td style="vertical-align: top; padding-right: 16px;">
            <div class="blue-background" style="width: 186px; padding-right: 9px; margin-bottom: 8px; -moz-border-radius: 7px; border-radius: 7px; ">
                <div style="background: url(img/guildlogoback.png) center center; -moz-border-radius: 3px; border-radius: 3px; border: 1px solid #b3b5b5; border-top: 0px; border-bottom: 0px;  width: 157px; height: 157px; padding: 29px 0px 0px 29px;">
                    <div id="logodiv" style="position: relative; height: 157px; background: url() no-repeat">
                        <img src="img/0p_white.png" id="logo" height="128px" width="128px" style="z-index: 3; position: absolute; top: 0px; left: 0px;">
                        <img src="img/0p_white.png" id="border" height="128px" width="128px"  style="z-index: 2; position: absolute; top: 0px; left: 0px;">
                        <img src="img/0p_white.png" id="background" height="128px" width="128px"  style="z-index: 1; position: absolute; top: 0px; left: 0px;">
                    </div>
                </div>
            </div>
            <a href="" id="emblemlink" target="_blank" style="text-decoration: none;">
                <table width="100%">
                    <tr>
                        <td class="lightblue-button-top-left"></td>
                        <td class="lightblue-button-top">Emblem Link</td>
                        <td class="lightblue-button-top-right"></td>
                    </tr>
                    <tr>
                        <td class="lightblue-button-bottom-left"></td>
                        <td class="lightblue-button-bottom"></td>
                        <td class="lightblue-button-bottom-right"></td>
                    </tr>
                </table>
            </a>
            <div class="release">Use the above link to share your emblem, or right click on it and select "Save as..." to save it.</div>
        </td>
        <td style="vertical-align: top;">
            <div class="blue-background" style="background: #374146; -moz-border-radius: 7px; border-radius: 7px;">
                <table width="100%">
                    <tr>
                        <td>
                            <div style="width: 100%; padding-bottom: 8px">
                                <table width="100%" height="121px;" style="padding: 4px; background: url(img/guild_emblem_selections_background.png);">
                                    <tr>
                                        <td>
                                            <div style="width: 368px; height: 134px; overflow: auto; padding: 4px 0px 4px 10px;">
                                                <?php foreach($emblem_symbols as $id): ?>
                                                    <img src="img/emblems_small/<?php echo $id; ?>.png" id=<?php echo $id; ?> onclick="setlogo(<?php echo $id; ?>)">
                                                <?php endforeach; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="width: 100%;">
                                <table cellspacing="0" cellpadding="0" width="100%" height="121px;" style="padding: 4px; background: url(img/guild_emblem_selections_background.png);">
                                    <tr>
                                        <td>
                                            <div style="width: 368px; height: 134px; overflow: auto; padding: 4px 0px 4px 10px;">
                                                <?php foreach($emblem_borders as $id): ?>
                                                    <img src="img/emblems_small/<?php echo $id; ?>.png" id=<?php echo $id; ?> onclick="setborder(<?php echo $id; ?>)">
                                                <?php endforeach; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td style="padding-left: 8px; vertical-align: top;">
                            <?php
                                foreach($color_swatches as $id => $title):
                                    $color_height = 17;
                                    $color_width = 17;
                                    $color_row_count = 16;
                                    $color_x = 0;
                                    $color_x_spacing = 2;
                                    $color_y = 0;
                                    $color_y_spacing = 2;
                                    $color_count = 0;
                            ?>
                                <div style="padding-bottom: 8px">
                                    <table width="326px" style="background: url(img/guildlogocolorback.png) bottom no-repeat;">
                                        <tr>
                                            <td style="font-size: 8pt; color: #fff; padding-bottom: 4px;">
                                                <?php echo $title; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="44px" style="padding-top: 4px; padding-left: 13px;">
                                                <img src="img/guildlogocolor.png" usemap="#<?php echo $id; ?>color" border="0">
                                                <map name="<?php echo $id; ?>color">
                                                    <?php foreach($emblem_colors as $color): ?>
                                                        <area shape="rect" coords="<?php echo "{$color_x},{$color_y}," . ($color_x + $color_width) . "," . ($color_y + $color_height) ; ?>" href="javascript:setcolor(<?php echo implode(",",$color) . ",'{$id}'" ; ?>)">
                                                        <?php
                                                            $color_count++;
                                                            if($color_count == $color_row_count) {
                                                                $color_count = 0;
                                                                $color_x = 0;
                                                                $color_y += $color_height + $color_y_spacing;
                                                            } else {
                                                                $color_x += $color_width + $color_x_spacing;
                                                            }
                                                        ?>
                                                    <?php endforeach; ?>
                                                </map>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                            <a href="javascript:randomize()" style="text-decoration: none;">
                                <table width="100%">
                                    <tr>
                                        <td class="lightblue-button-top-left"></td>
                                        <td class="lightblue-button-top">Generate a random emblem</td>
                                        <td class="lightblue-button-top-right"></td>
                                    </tr>
                                    <tr>
                                        <td class="lightblue-button-bottom-left"></td>
                                        <td class="lightblue-button-bottom"></td>
                                        <td class="lightblue-button-bottom-right"></td>
                                    </tr>
                                </table>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<br>
<table class="titlebar">
    <tr>
        <td class="titlebar-topleft"></td>
        <td class="titlebar-top"></td>
        <td class="titlebar-topright"></td>
    </tr>
    <tr>
        <td class="titlebar-left"></td>
        <td>Kanji Guide</td>
        <td class="titlebar-right"></td>
    </tr>
    <tr>
        <td class="titlebar-bottomleft"></td>
        <td class="titlebar-bottom"></td>
        <td class="titlebar-bottomright"></td>
    </tr>
</table>
<div class="titlebar-text" style="padding-bottom: 3px;">
    Below you'll find a list of the kanji that can be used in a guild emblem, along with the kanji written in romanji, 
    its meaning, and who the kanji is used by in the Dragon Ball universe.  In addition, you can also click on a kanji 
    below to use it as the symbol for the emblem you're currently working on.
    <br><br>
    <table class="manga-table">
        <tr>
            <td class="kanji-emblem first-row">
                <img src="img/emblems_small/234.png" onclick="setlogo(234)">
            </td>
            <td class="first-row">
                &#20096; - kame<br>
                <i>turtle</i><br>
                <b>Master Roshi</b>
            </td>
            <td class="kanji-emblem first-row">
                <img src="img/emblems_small/235.png" onclick="setlogo(235)">
            </td>
            <td class="first-row">
                &#31070; - kami<br>
                <i>god</i><br>
                <b>Kami</b>
            </td>
            <td class="kanji-emblem first-row">
                <img src="img/emblems_small/236.png" onclick="setlogo(236)">
            </td>
            <td class="first-row">
                &#24735; - go<br>
                <i>enlightenment</i><br>
                <b>Goku</b>
            </td>
            <td class="kanji-emblem first-row">
                <img src="img/emblems_small/237.png" onclick="setlogo(237)">
            </td>
            <td class="first-row">
                &#40372; - tsuru<br>
                <i>crane</i><br>
                <b>Master Shen</b>
            </td>
            <td class="kanji-emblem first-row">
                <img src="img/emblems_small/238.png" onclick="setlogo(238)">
            </td>
            <td class="first-row last-column">
                &#39764; - ma<br>
                <i>demon</i><br>
                <b>King Piccolo</b>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/239.png" onclick="setlogo(239)">
            </td>
            <td>
                &#27578; - satsu<br>
                <i>kill/murder</i><br>
                <b>Mercenary Tao</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/240.png" onclick="setlogo(240)">
            </td>
            <td>
                &#27138; - raku<br>
                <i>happy/music</i><br>
                <b>Yamcha</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/241.png" onclick="setlogo(241)">
            </td>
            <td>
                &#22825; - ten<br>
                <i>heavens</i><br>
                <b>Tien</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/242.png" onclick="setlogo(242)">
            </td>
            <td>
                &#20814; - to<br>
                <i>rabbit</i><br>
                <b>Monster Carrot</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/243.png" onclick="setlogo(243)">
            </td>
            <td class="last-column">
                &#21892; - zen<br>
                <i>good</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/244.png" onclick="setlogo(244)">
            </td>
            <td>
                &#24746; - aku<br>
                <i>evil</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/245.png" onclick="setlogo(245)">
            </td>
            <td>
                &#32854; - hijiri<br>
                <i>holy/saint/master</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/246.png" onclick="setlogo(246)">
            </td>
            <td>
                &#40845; - ryuu<br>
                <i>dragon/imperial</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/247.png" onclick="setlogo(247)">
            </td>
            <td>
                &#25126; - sen<br>
                <i>war/battle</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/248.png" onclick="setlogo(248)">
            </td>
            <td class="last-column">
                &#38450; - bou<br>
                <i>defend/protect</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/249.png" onclick="setlogo(249)">
            </td>
            <td>
                &#36229; - chou<br>
                <i>transcend/super-</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/250.png" onclick="setlogo(250)">
            </td>
            <td>
                &#24535; - kokorozashi<br>
                <i>plans/hopes</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/251.png" onclick="setlogo(251)">
            </td>
            <td>
                &#26032; - shin<br>
                <i>new</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/252.png" onclick="setlogo(252)">
            </td>
            <td>
                &#20553; - i<br>
                <i>admirable/greatness</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/253.png" onclick="setlogo(253)">
            </td>
            <td class="last-column">
                &#27683; - ki<br>
                <i>spirit/energy</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/254.png" onclick="setlogo(254)">
            </td>
            <td>
                &#23551; - kotobuki<br>
                <i>longevity/life</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/255.png" onclick="setlogo(255)">
            </td>
            <td>
                &#29275; - gyuu<br>
                <i>ox</i><br>
                <b>Ox King</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/256.png" onclick="setlogo(256)">
            </td>
            <td>
                &#39135; - shoku<br>
                <i>to eat</i><br>
                <b>Yajirobe</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/257.png" onclick="setlogo(257)">
            </td>
            <td>
                &#38646; - rei<br>
                <i>nothing/zero</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/258.png" onclick="setlogo(258)">
            </td>
            <td class="last-column">
                &#22769; - ichi<br>
                <i>I/one</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/259.png" onclick="setlogo(259)">
            </td>
            <td>
                &#24336; - ni<br>
                <i>two</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/260.png" onclick="setlogo(260)">
            </td>
            <td>
                &#21442; - san<br>
                <i>three</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/261.png" onclick="setlogo(261)">
            </td>
            <td>
                &#30334; - hyaku<br>
                <i>one hundred</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/262.png" onclick="setlogo(262)">
            </td>
            <td>
                &#21315; - sen<br>
                <i>one thousand</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/263.png" onclick="setlogo(263)">
            </td>
            <td class="last-column">
                &#19975; - man<br>
                <i>ten thousand</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/264.png" onclick="setlogo(264)">
            </td>
            <td>
                &#20740; - oku<br>
                <i>hundred million</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/265.png" onclick="setlogo(265)">
            </td>
            <td>
                &#27494; - mu/bu<br>
                <i>martial arts</i><br>
                <b>Mutaito</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/266.png" onclick="setlogo(266)">
            </td>
            <td>
                &#30333; - shiro<br>
                <i>white</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/267.png" onclick="setlogo(267)">
            </td>
            <td>
                &#40658; - kuro<br>
                <i>black</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/268.png" onclick="setlogo(268)">
            </td>
            <td class="last-column">
                &#33980; - ao<br>
                <i>blue</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/269.png" onclick="setlogo(269)">
            </td>
            <td>
                &#32005; - hong<br>
                <i>crimson/deep red</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/270.png" onclick="setlogo(270)">
            </td>
            <td>
                &#40644; - ki<br>
                <i>yellow</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/271.png" onclick="setlogo(271)">
            </td>
            <td>
                &#32209; - midori<br>
                <i>green</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/272.png" onclick="setlogo(272)">
            </td>
            <td>
                &#32043; - murasaki<br>
                <i>purple</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/273.png" onclick="setlogo(273)">
            </td>
            <td class="last-column">
                &#37504; - gin<br>
                <i>silver</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/274.png" onclick="setlogo(274)">
            </td>
            <td>
                &#37329; - kin<br>
                <i>gold</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/275.png" onclick="setlogo(275)">
            </td>
            <td>
                &#20803; - moto/yuan<br>
                <i>beginning/origin</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/276.png" onclick="setlogo(276)">
            </td>
            <td>
                &#29577; - tama/yu<br>
                <i>jewel</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/284.png" onclick="setlogo(284)">
            </td>
            <td>
                &#30495; - shin<br>
                <i>reality/truth</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/285.png" onclick="setlogo(285)">
            </td>
            <td class="last-column">
                &#22855; - ki<br>
                <i>strange</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/286.png" onclick="setlogo(286)">
            </td>
            <td>
                &#29467; - mou<br>
                <i>fierce/wild</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/287.png" onclick="setlogo(287)">
            </td>
            <td>
                &#40599; - rei<br>
                <i>lovely</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/288.png" onclick="setlogo(288)">
            </td>
            <td>
                &#27005; - raku<br>
                <i>happy/music</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/289.png" onclick="setlogo(289)">
            </td>
            <td>
                &#28961; - mu<br>
                <i>nothingness</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/24.png" onclick="setlogo(24)">
            </td>
            <td class="last-column">
                &#24859; - ai<br>
                <i>love</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/25.png" onclick="setlogo(25)">
            </td>
            <td>
                &#24107; - shi<br>
                <i>expert/master</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/26.png" onclick="setlogo(26)">
            </td>
            <td>
                &#37034; - ja<br>
                <i>wicked/unjust</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/27.png" onclick="setlogo(27)">
            </td>
            <td>
                &#34382; - tora/ko<br>
                <i>drunkard/tiger</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/28.png" onclick="setlogo(28)">
            </td>
            <td>
                &#22818; - yume<br>
                <i>dream/illusion</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/29.png" onclick="setlogo(29)">
            </td>
            <td class="last-column">
                &#33775; - hana<br>
                <i>flower</i>
            </td>
        </tr>
        <tr>
            <td class="kanji-emblem">
                <img src="img/emblems_small/30.png" onclick="setlogo(30)">
            </td>
            <td>
                &#25731; - geki<br>
                <i>attack/defeat</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/31.png" onclick="setlogo(31)">
            </td>
            <td>
                &#24525; - nin<br>
                <i>endure</i>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/32.png" onclick="setlogo(32)">
            </td>
            <td>
                &#35199;&#39277; - nishimeshi<br>
                <i>western rice</i><br>
                <b>Paella</b>
            </td>
            <td class="kanji-emblem">
                <img src="img/emblems_small/33.png" onclick="setlogo(33)">
            </td>
            <td class="last-column" colspan="3">
                &#30028;&#29579; - kaiou<br>
                <i>king of worlds</i><br>
                <b>King Kai</b>
            </td>
        </tr>
    </table>
</div>