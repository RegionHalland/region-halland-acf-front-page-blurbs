# Front-page-plugin för ACF-blurbar på sajtens front-page

## Hur man använder Region Hallands plugin "region-halland-acf-front-page-blurbs"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-front-page-blurbs".


## Användningsområde

Denna plugin skapar en array() med med blurbar


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-acf-front-page-blurbs/blob/master/LICENSE)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-front-page-blurbs.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-front-page-blurbs.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-front-page-blurbs": "1.0.0"
},
```


## Loopa ut blurbarna via "Blade"

```sh
@php($myFrontPageBlurbs = get_region_halland_acf_front_page_blurbs())
@if(isset($myFrontPageBlurbs))
<div>
    <ul>
    @foreach ($myFrontPageBlurbs as $blurbs)
        <li>
            <div class="rh-blurb mx1 my2">
                <div>
                    <img src="{!! $blurbs['image_url'] !!}" alt="{{$blurbs['image_alt']}}">
                </div>
                <div>
                    <h3><a href="{{ $blurbs['link_url'] }}" target="{{ $blurbs['link_target'] }}">{{ $blurbs['link_title'] }}</a></h3>
                    <p>{{ $blurbs['text_content'] }}</p>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=4)
  0 => 
    array (size=8)
      'link_url' => string 'https://exempelsajt-A' (length=21)
      'link_title' => string 'Exempelsajt A' (length=13)
      'link_target' => string '' (length=0)
      'text_content' => string 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id diam in erat egestas vehicula eu accumsan ligula.' (length=116)
      'image_url' => string 'https://exempel.se/app/uploads/2019/08/nyhet_1.jpg' (length=50)
      'image_alt' => string '' (length=0)
      'image_width' => int 400
      'image_height' => int 180
  1 => 
    array (size=8)
      'link_url' => string 'https://exempelsajt-B' (length=21)
      'link_title' => string 'Exempelsajt B' (length=13)
      'link_target' => string '' (length=0)
      'text_content' => string 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.' (length=87)
      'image_url' => string 'https://exempel.se/app/uploads/2019/08/nyhet_2.jpg' (length=50)
      'image_alt' => string '' (length=0)
      'image_width' => int 400
      'image_height' => int 180
  2 => 
    array (size=8)
      'link_url' => string 'https://exempelsajt-C' (length=21)
      'link_title' => string 'Exempelsajt C' (length=13)
      'link_target' => string '' (length=0)
      'text_content' => string 'Aldu integer id metus pellentesque, suscipit mauris vel, placerat purus. Vestibulum diam elit.' (length=94)
      'image_url' => string 'https://exempel.se/app/uploads/2019/08/nyhet_3.jpg' (length=50)
      'image_alt' => string '' (length=0)
      'image_width' => int 400
      'image_height' => int 180
  3 => 
    array (size=8)
      'link_url' => string 'https://exempelsajt-D' (length=21)
      'link_title' => string 'Exempelsajt D' (length=13)
      'link_target' => string '' (length=0)
      'text_content' => string 'Mauris id consectetur lorem. Cras volutpat massa leo. Sed a enim ultricies, dapibus ex nec.' (length=91)
      'image_url' => string 'https://exempel.se/app/uploads/2019/08/nyhet_1.jpg' (length=50)
      'image_alt' => string '' (length=0)
      'image_width' => int 400
      'image_height' => int 180
```


## Versionhistorik

### 1.1.0
- Lagt till information om licensmodell
- Bifogat fil med licensmodell

### 1.0.0
- Första version