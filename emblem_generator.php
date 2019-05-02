<?php

class EmblemGenerator {

    private $_valid_symbols = null;
    private $_valid_borders = null;
    private $_valid_backgrounds = null;
    private $_valid_colors = array(
        array(158,11,15),  array(237,28,36),   array(255,70,70),   array(255,102,0),
        array(255,186,0),  array(255,245,118), array(159,220,71),  array(89,255,152),
        array(75,134,9),   array(0,108,33),    array(60,186,146),  array(0,115,106),
        array(1,255,255),  array(0,174,239),   array(0,84,165),    array(0,0,190),

        array(133,95,168), array(145,39,143),  array(143,35,244),  array(237,0,140),
        array(158,0,92),   array(48,0,74),     array(149,149,149), array(85,85,85),
        array(140,98,58),  array(90,56,17),    array(172,66,0),    array(255,146,187),
        array(128,89,113), array(58,66,52),    array(255,255,255), array(0,0,0)
    );

    public function getValidSymbols() { return $this->_valid_symbols; }
    public function getValidBorders() { return $this->_valid_borders; }
    public function getValidBackgrounds() { return $this->_valid_backgrounds; }
    public function getValidColors() { return $this->_valid_colors; }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     *
     */
    function __construct()
    {
        $this->_valid_symbols = array_merge(range(234, 350), range(1, 33));
        $this->_valid_borders = range(34, 133);
        $this->_valid_backgrounds = range(134, 233);
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null
     */
    private function _sanitizeSymbol()
    {
        if(isset($_GET["logo"])) {
            $symbol = $_GET["logo"];

            if(in_array($symbol, $this->_valid_symbols)) {
                return $symbol;
            }
        }

        return null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null
     */
    private function _sanitizeBorder()
    {
        if(isset($_GET["border"])) {
            $border = $_GET["border"];

            if(in_array($border, $this->_valid_borders)) {
                return $border;
            }
        }

        return null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param $color
     * @return null
     */
    private function _sanitizeColor($color)
    {
        if(isset($_GET["{$color}r"]) && isset($_GET["{$color}g"]) && isset($_GET["{$color}b"])) {
            $rgb = array(
                $_GET["{$color}r"],
                $_GET["{$color}g"],
                $_GET["{$color}b"]
            );

            if(in_array($rgb, $this->_valid_colors)) {
                return $rgb;
            }
        }

        return null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param $cache_file
     * @return bool
     */
    private function _printCachedEmblem($cache_file)
    {
        if(file_exists($cache_file)) {
            $fp = fopen($cache_file, "rb");
            header('Content-Type: image/png');
            fpassthru($fp);
            fclose($fp);
            return true;
        }

        return false;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param $symbol
     * @param $border
     * @param $background
     * @param $symbol_color
     * @param $border_color
     * @param $background_color
     */
    private function _generateEmblem($symbol, $border, $background, $symbol_color, $border_color, $background_color)
    {
        $cache_file = "cache/guildlogo_{$symbol}_{$border}" .
            "_{$symbol_color[0]}_{$symbol_color[1]}_{$symbol_color[2]}" .
            "_{$border_color[0]}_{$border_color[1]}_{$border_color[2]}" .
            "_{$background_color[0]}_{$background_color[1]}_{$background_color[2]}" .
            ".png";

        if(!$this->_printCachedEmblem($cache_file)) {
            /* load the png files */
            $symbol_image = imagecreatefrompng("img/emblems_big/{$symbol}.png");
            $border_image = imagecreatefrompng("img/emblems_big/{$border}.png");
            $background_image = imagecreatefrompng("img/emblems_big/{$background}.png");

            /* colorize */
            imagealphablending($symbol_image, false);
            imagealphablending($border_image, false);
            imagealphablending($background_image, true);
            imagefilter($symbol_image, IMG_FILTER_COLORIZE, $symbol_color[0] - 255, $symbol_color[1] - 255, $symbol_color[2] - 255);
            imagefilter($border_image, IMG_FILTER_COLORIZE, $border_color[0] - 255, $border_color[1] - 255, $border_color[2] - 255);
            imagefilter($background_image, IMG_FILTER_COLORIZE, $background_color[0] - 255, $background_color[1] - 255, $background_color[2] - 255);

            /* merge the images */
            imagecopy($background_image, $border_image, 0, 0, 0, 0, 128, 128);
            imagecopy($background_image, $symbol_image, 0, 0, 0, 0, 128, 128);
            imagesavealpha($background_image, true);

            /* output and cache */
            header('Content-Type: image/png');
            imagepng($background_image);
            imagepng($background_image, $cache_file);

            /* cleanup */
            imagedestroy($background_image);
            imagedestroy($border_image);
            imagedestroy($symbol_image);
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     *
     */
    public function printEmblem()
    {
        $symbol = $this->_sanitizeSymbol();
        $border = $this->_sanitizeBorder();
        $symbol_color = $this->_sanitizeColor("l");
        $border_color = $this->_sanitizeColor("r");
        $background_color = $this->_sanitizeColor("b");

        if(isset($symbol) && isset($border) && isset($symbol_color) && isset($border_color) && isset($background_color)) {
            $background = $border + 100;
            $this->_generateEmblem($symbol, $border, $background, $symbol_color, $border_color, $background_color);
        }

        else {
            http_response_code(404);
        }
    }
}