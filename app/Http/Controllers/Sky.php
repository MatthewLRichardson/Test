<?php

namespace App\Http\Controllers;

class sky extends Controller
{
    interface FileCreationContract
{
    public function create($content);
}


class XMLFile implements FileCreationContract
{

    const REGEX_EXTENTION_LOOKOUT = '/\.[^.]+$/';
    const EXTENTION = '.xml';

    protected $path;
    protected $filename;

    public function __construct ($filename, $path = '')
    {
        $this->filename = $filename;
        $this->parseFilename();

        if (empty($this->path)) {
            $this->path = realpath(__DIR__);
        }
    }

    /**
     * If programmer mistakes and adds extention, removes it to make sure the wrong extention was not added;
     */
    private function parseFilename()
    {
        if ( strpos($this->filename, self::EXTENTION) === FALSE ) {
            $this->filename = preg_replace(self::REGEX_EXTENTION_LOOKOUT, '', $this->filename) . self::EXTENTION;
        }

        if (empty($this->filename)) {
            $this->filename = 'default-name'.self::EXTENTION;
        }
    }

    /**
     * @return mixed
     */
    public function getPath ()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     *
     * @return XMLFile
     */
    public function setPath ($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilename ()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     *
     * @return XMLFile
     */
    public function setFilename ($filename)
    {
        $this->filename = $filename;
        $this->parseFilename();
        return $this;
    }

    public function create ($content)
    {
        $file = fopen($this->path.$this->filename, 'w') or die("Unable too open file!"); //I recommend throwing an exception here!
        fwrite($file, $content);
        fclose($file);
    }

}  

}
