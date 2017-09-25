<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Asset;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AssetTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\Asset::getFormattedFilesizeAttribute
     * @test
     */
    public function it_can_get_the_correct_formatted_filesize_attribute()
    {
        $bytes = (new Asset(['filesize' => 10]))->formatted_filesize;
        $kilobytes = (new Asset(['filesize' => 10 * pow(1024, 1)]))->formatted_filesize;
        $megabytes = (new Asset(['filesize' => 10 * pow(1024, 2)]))->formatted_filesize;
        $gigabytes = (new Asset(['filesize' => 10 * pow(1024, 3)]))->formatted_filesize;
        $terabytes = (new Asset(['filesize' => 10 * pow(1024, 4)]))->formatted_filesize;
        $petabytes = (new Asset(['filesize' => 10 * pow(1024, 5)]))->formatted_filesize;

        $this->assertEquals('10B', $bytes);
        $this->assertEquals('10KB', $kilobytes);
        $this->assertEquals('10MB', $megabytes);
        $this->assertEquals('10GB', $gigabytes);
        $this->assertEquals('10TB', $terabytes);
        $this->assertEquals('10PB', $petabytes);
    }
}
