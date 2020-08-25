<?php

use PHPUnit\Framework\TestCase;

final class FilePathTest extends TestCase
{
    public function testPath1()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.png", "type" => "image/png", "tmp_name" => __DIR__ . "/assets/foo.png", "error" => 0, "size" => 1]);
        $upload->path("xyz/abc");
        $upload->name("hello");

        $this->assertEquals($upload->get_name(), "hello.png");
        $this->assertEquals($upload->get_path(null, false), "xyz/abc/");
        $this->assertEquals($upload->get_path("456.png"), "xyz/abc/456.png");
    }

    public function testPath2()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
        $upload->path("animals/cats");
        $upload->name("2020/08/Tekir");

        $this->assertEquals($upload->get_name(), "2020/08/Tekir.jpg");
        $this->assertEquals($upload->get_path(null, false), "animals/cats/");
        $this->assertEquals($upload->get_path("456.jpeg"), "animals/cats/456.jpeg");
    }
}