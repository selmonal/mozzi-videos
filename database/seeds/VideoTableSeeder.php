<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::fromYoutubeId('nK97wFQL8Uw');
        Video::fromYoutubeId('X8AurWRkRpo');
        Video::fromYoutubeId('rzc3_b_KnHc');
        Video::fromYoutubeId('34Na4j8AVgA');
        Video::fromYoutubeId('wtOrXBwJW1Q');
        Video::fromYoutubeId('gPZgp0oXyew');
        Video::fromYoutubeId('iUrzicaiRLU');
        Video::fromYoutubeId('BshxCIjNEjY');
        Video::fromYoutubeId('XEjLoHdbVeE');
        Video::fromYoutubeId('ETxmCCsMoD0');
        Video::fromYoutubeId('xFrGuyw1V8s');
        Video::fromYoutubeId('unfzfe8f9NI');
        Video::fromYoutubeId('QtxlCsVKkvY');
        Video::fromYoutubeId('oR6eKmqSEa0');
    }
}
