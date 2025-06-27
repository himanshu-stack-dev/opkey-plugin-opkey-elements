<?php

namespace BreakdanceCustomElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;

\Breakdance\Elements\PresetSections\PresetSectionsController::getInstance()->register(
    "BreakdanceCustomElements\\Video",
    c(
        "video",
        "Video",
        [c(
        "video",
        "Video",
        [],
        ['type' => 'video', 'layout' => 'vertical', 'videoOptions' => ['providers' => ['youtube', 'vimeo', 'dailymotion']]],
        false,
        false,
        [],
      ), c(
        "ratio",
        "Ratio",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['text' => '16:9', 'label' => 'Label', 'value' => '56.25%'], ['text' => '16:10', 'label' => 'Label', 'value' => '62.5%'], ['text' => '4:3', 'value' => '75%'], ['text' => '1:1', 'value' => '100%'], ['text' => '21:9', 'value' => '42.85%'], ['text' => '3:2', 'value' => '66.67%'], ['text' => 'Custom', 'value' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "custom_width",
        "Custom width",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['path' => 'content.video.ratio', 'operand' => 'equals', 'value' => 'custom']],
        false,
        false,
        [],
      ), c(
        "custom_height",
        "Custom height",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['path' => 'content.video.ratio', 'operand' => 'equals', 'value' => 'custom']],
        false,
        false,
        [],
      ), c(
        "title",
        "Title",
        [],
        ['type' => 'text', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['preset' => ['slug' => 'BreakdanceCustomElements\\Video']]],
        false,
        false,
        [],
      ),
    true,
    null
);

