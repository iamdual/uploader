<?php

use PHPUnit\Framework\TestCase;

final class ImageDimensionsTest extends TestCase
{
    public function testMaxImageDimension1()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->max_dimensions(200, 50);
        $upload->check();

        $this->assertEquals($upload::ERR_MAX_DIMENSION, $upload->get_error(false));
    }

    public function testMaxImageDimension2()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->max_dimensions(210, 20);
        $upload->check();

        $this->assertEquals($upload::ERR_MAX_DIMENSION, $upload->get_error(false));
    }

    public function testMaxImageDimension3()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->max_dimensions(210, 60);
        $upload->check();

        $this->assertEquals(null, $upload->get_error(false));
    }

    public function testMaxImageDimension4()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->max_dimensions(400, 80);
        $upload->check();

        $this->assertEquals(null, $upload->get_error(false));
    }

    public function testMinImageDimension1()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->min_dimensions(300, 20);
        $upload->check();

        $this->assertEquals($upload::ERR_MIN_DIMENSION, $upload->get_error(false));
    }

    public function testMinImageDimension2()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->min_dimensions(210, 80);
        $upload->check();

        $this->assertEquals($upload::ERR_MIN_DIMENSION, $upload->get_error(false));
    }

    public function testMinImageDimension3()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->min_dimensions(210, 60);
        $upload->check();

        $this->assertEquals(null, $upload->get_error(false));
    }

    public function testMinImageDimension4()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->min_dimensions(100, 20);
        $upload->check();

        $this->assertEquals(null, $upload->get_error(false));
    }
}