<?php
//namespace Notes;

use \Michelf\MarkdownExtra;

class Noter
{
    /**
     * Variables for path & file information
     */
    public $path;       // If $path = "C:/xampp/htdocs/API.md"
    public $dirname;    // [dirname] => C:/xampp/htdocs
    public $basename;   // [basename] => API.md
    public $extension;  // [extension] => md
    public $filename;   // [filename] => API

    /**
     * The contents of the file
     */
    public $content;
    public $markdown = "";
    public $html = null;

    /* --------------------------------------------------------------------- */
    /**
     *
     */
    public function __construct($path)
    {
        $this->path = $path;
        $this->getPathInfo();
        $this->markdown = $this->getFileContents();
        $this->markdown2html();
    }
    /* --------------------------------------------------------------------- */

    /**
     * Returns page title
     * @return string
     */
    public function getTitle()
    {
        return $this->filename;
    }

    protected function getPathInfo()
    {
        $parts = pathinfo($this->path);
        $this->dirname = isset($parts['dirname']) ? $parts['dirname'] : null;
        $this->basename = isset($parts['basename']) ? $parts['basename'] : null;
        $this->extension = isset($parts['extension']) ? $parts['extension'] : null;
        $this->filename = isset($parts['filename']) ? $parts['filename'] : null;
        return $this;
    }

    protected function getFileContents()
    {
        if (file_exists($this->path)) {
            $contents = file_get_contents($this->path);
        }

        if ($contents !== false && $contents !== null) {
            return $contents;
        }else{
            return "<div class=\"alert alert-danger\">
                <b>Error opening file!</b> Unable to open \"{$this->path}\",
                please check file permisions.</div>";
        }
    }

    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Converts the markdown to html markup
     */
    public function markdown2html()
    {
        $parser = new MarkdownExtra;
        $html = $parser->transform($this->markdown);

        $find = array('<table>');
        $replace = array('<table class="table table-bordered">');
        $this->html = str_replace($find, $replace, $html);
    }
}
