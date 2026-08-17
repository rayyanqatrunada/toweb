@props([
    'variant' => 'full', // 'full' or 'split'
    'headline',
    'description',
    'imageUrl',
    'eyebrowText' => 'JURUSAN TEKNIK OTOMOTIF',
    'stats' => null
])

@if($variant === 'split')
    <x-frontend.hero.layout-split 
        :headline="$headline"
        :description="$description"
        :image-url="$imageUrl"
        :eyebrow-text="$eyebrowText"
        :stats="$stats"
    />
@else
    <x-frontend.hero.layout-full 
        :headline="$headline"
        :description="$description"
        :image-url="$imageUrl"
        :eyebrow-text="$eyebrowText"
        :stats="$stats"
    />
@endif
