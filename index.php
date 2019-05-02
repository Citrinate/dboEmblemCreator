<?php

class EmblemCreator
{
    // -----------------------------------------------------------------------------------------------------------------

    /**
     *
     */
    public function buildPage()
    {
        REQUIRE "emblem_generator.php";
        $emblem_generator = new EmblemGenerator();

        $emblem_symbols = $emblem_generator->getValidSymbols();
        $emblem_borders = $emblem_generator->getValidBorders();
        $emblem_colors = $emblem_generator->getValidColors();
        $color_swatches = array(
            "logo" => "Symbol Color",
            "border" => "Border Color",
            "background" => "Background Color"
        );

        REQUIRE "view/_template/header.php";
        REQUIRE "view/home/index.php";
        REQUIRE "view/_template/footer.php";
    }
}

$tool = new EmblemCreator();
$tool->buildPage();