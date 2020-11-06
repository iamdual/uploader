<?php

use PHPUnit\Framework\TestCase;

final class FileNameTest extends TestCase
{
    public function testName1()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.png", "type" => "image/png", "tmp_name" => __DIR__ . "/assets/foo.png", "error" => 0, "size" => 1]);
        $upload->name("bar");

        $this->assertEquals($upload->get_name(), "bar.png");
    }

    public function testName2()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.png", "type" => "image/png", "tmp_name" => __DIR__ . "/assets/foo.png", "error" => 0, "size" => 1]);

        $this->assertEquals($upload->get_name(), "foo.png");
    }

    public function testName3()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.png", "type" => "image/png", "tmp_name" => __DIR__ . "/assets/foo.png", "error" => 0, "size" => 1]);
        $upload->name("bar.xyz", false);

        $this->assertEquals($upload->get_name(), "bar.xyz");
    }

    public function testName4()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.json", "error" => 0, "size" => 1]);
        $upload->name("foo");

        $this->assertEquals($upload->get_name(), "foo.jpg");
    }

    public function testName5()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.json", "error" => 0, "size" => 1]);
        $upload->name("foo");
        $upload->encrypt_name();

        $this->assertNotEquals($upload->get_name(), "foo.json");
        $this->assertEquals($upload->encrypt_name, false); // Because it's setting to 'true' once
    }

    public function testName6()
    {
        $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.json", "error" => 0, "size" => 1]);
        $upload->name("folder1/folder2/foo.xyz", false);

        $this->assertEquals($upload->get_name(), "folder1/folder2/foo.xyz");
    }
}
