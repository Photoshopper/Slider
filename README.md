# Slider module for AsgardCMS 2

Slider module implemented by using FlexSlider 2, but can be replace by any other slider.  
Module uses my own vendor package "alex/image" for uploading images.  

## Installation

1. Put a module in "Modules" folder  
2. Run commands:  
`php artisan module:migrate slider`  
`php artisan module:publish slider`  
3. Give permissions to the module.  

## Usage

`{!! Slider::render('slider_system_name') !}}`  

You can pass some parameters  

```
{!! Slider::render('slider_system_name', ['caption' => false, 'properties' => ['animation' => 'fade']], 'slider/my-own-slider') !!}
```
`caption` - hide title and text on slide (by default: true)  
`properties` - you can set the FlexSlider properties (https://github.com/woocommerce/FlexSlider/wiki/FlexSlider-Properties)  
`slider/my-own-slider` - name of own slider view  
