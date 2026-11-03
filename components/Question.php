<?php

class Question
{
    public static function render($config)
    {
        $type = $config['type'] ?? 'text';
        $name = $config['name'];
        $label = $config['label'];
        $options = $config['options'] ?? [];

        echo "<div class='question'>";
        echo "<label>{$label}</label>";

        switch ($type) {

            case 'text':
                echo "<input type='text' name='{$name}' required>";
                break;

            case 'email':
                echo "<input type='email' name='{$name}' required>";
                break;

            case 'textarea':
                echo "<textarea name='{$name}' rows='4'></textarea>";
                break;

            case 'radio':
                foreach ($options as $option) {
                    echo "
                    <label class='radio-option'>
                        <input type='radio' name='{$name}' value='{$option}' required>
                        {$option}
                    </label>";
                }
                break;

            case 'stars':

                echo "<div class='rating'>";

                for ($i = 5; $i >= 1; $i--) {

                    echo "
                    <input type='radio'
                           id='{$name}_{$i}'
                           name='{$name}'
                           value='{$i}'>

                    <label for='{$name}_{$i}'>★</label>";
                }

                echo "</div>";

                break;
        }

        echo "</div>";
    }
}
