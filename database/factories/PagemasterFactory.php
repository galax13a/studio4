<?php

namespace Database\Factories;

use App\Models\Pagemaster;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PagemasterFactory extends Factory
{
    protected $model = Pagemaster::class;

    public function definition()
    {
      
        return [
            
            'name' => $this->faker->randomElement(["Big7", "Big7", "BongaCams", "Cam4", "Camsoda","Chaturbate","cherry.tv","Lolypop","Fancentro","Flirt4Free","Foxy.co","Imlive","ManyVideos","OnlyFans","LiveJasmin","Myfreecams","ModelHub","Qrush","SexPanther","nSkyPrivate","Streamate","XloveCams","StripChat","Twitter","Facebook","Twich","SoulCams","Cams","Xcams","FaceXcam", "Other"]),
            'link' => ".com",
            'logo' => "logos/pages/logo.png",
            'status' => 1
        ];
    }
}
