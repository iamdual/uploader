<?php

use PHPUnit\Framework\TestCase;

final class UploadTest extends TestCase
{
    public function setUp()
    {
        if (!is_writable(__DIR__ . "/assets")) {
            throw new Exception(__DIR__ . "/assets is not writable.");
        }
    }

    public function testUploadFiles()
    {
        $uploaded_files = [];

        for ($i = 1; $i <= 6; $i++) {
            $upload = new \iamdual\Uploader(["name" => "foo.jpg", "type" => "image/jpeg", "tmp_name" => __DIR__ . "/assets/foo.jpg", "error" => 0, "size" => 1]);
            $upload->must_be_image();
            $upload->path(__DIR__ . "/files");
            $upload->name("bar");

            $this->assertEquals($upload->upload("copy"), true);
            $suffix = $i > 1 ? "_{$i}" : "";
            $this->assertEquals($upload->get_name(), "bar{$suffix}.jpg");
            $uploaded_files[] = $upload->get_path($upload->get_name());
        }

        foreach ($uploaded_files as $file) {
            @unlink($file);
        }
    }
}