<?php
namespace common\classes;



class Media
{
    function get_contents_directory($dir = '')
    {
        $result = [];
        $directory = [];
        $file_dir = [];
        if ($dir == '') {
            $dir = 'images/';
        }
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        if (filetype($dir . $file) == 'dir') {
                            $directory[] = "<a class='dir' href='#' path='$dir$file/'><div class='img_folder'></div><span>$file</span></a>";
                        }
                        if (filetype($dir . $file) == 'file') {
                            //Debug::prn($dir.$file);
                            $file_dir[] = "<a class='file' href='#' pathFile='$dir$file'><img src='/secure/$dir$file' class='media__img' /><span>$file</span></a>";
                        }
                    }
                }
                closedir($dh);
            }
        }

        $result['dir'] = $directory;
        $result['file'] = $file_dir;
        return $result;
    }

    function print_contents_directory($content,$pathFolder = '')
    {
        if ($pathFolder == '') {
            $pathFolder = 'images/';
            $resPathAgo = 'images/';
        }else{
            $resPathAgo = $this->get_link_back($pathFolder);

        }

        echo "<div class='media_panel'>
                <button class='media_ago btn btn-primary' pathFolder='$resPathAgo'>Назад</button>
                <button class='media_new_folder btn btn-primary' data-toggle='modal' data-target='.bs-example-modal-sm'>Создать папку</button>
                <button class='media_del btn btn-primary'>Удалить</button>
                <button class='media__uploadFiles btn btn-primary' data-toggle='modal' data-target='.bs-example-modal'>Загрузить</button>
            </div>";
        $this->print_addressbar($pathFolder);
        foreach ($content['dir'] as $dir) {
            echo $dir;
        }
        foreach ($content['file'] as $file) {
            echo $file;
        }



        echo '
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <p>Введите название папки</p>
                  <input type="text" class="media__name_folder" name="media__name_folder" id=""/>
                  <button class="media__creat_folder" pathFolder="'.$pathFolder.'">Создать</button>
                </div>
              </div>
            </div>';
    }

    function create_folder($path,$nameFolder){
        $structure = $path.$nameFolder;
        if (!mkdir($structure, 0777, true)) {
            die('Не удалось создать директории...');
        }
    }

    function get_link_back($pathAgo){
        $pathAgo = explode('/',$pathAgo);
        $array_empty = array(null);
        $result = array_diff($pathAgo, $array_empty);
        $count = count($result);
        //array_splice($result, 1);
        unset ($result[$count-1]);
        $resPathAgo = '';
        foreach($result as $p){
            $resPathAgo .= $p.'/';
        }
        return $resPathAgo;
    }

    function full_del_dir ($directory)
    {$rest = substr($directory, -1);
       if($rest == '/'){
            $dir = opendir($directory);
            while(($file = readdir($dir)))
            {
                if ( is_file ($directory."/".$file))
                {
                    unlink ($directory."/".$file);
                }
                else if ( is_dir ($directory."/".$file) &&
                    ($file != ".") && ($file != ".."))
                {
                    $this->full_del_dir ($directory."/".$file.'/');
                }
            }
            closedir ($dir);

            rmdir ($directory);
       }else{
           unlink($directory);
       }
    }

    function rename_dir($dirname,$ndir){
        $dir = explode('/',$dirname);
        array_splice($dir, -2);
        $newdir = implode("/", $dir).'/'.$ndir;
        rename($dirname,$newdir);
    }

    function print_addressbar($path){
        echo '<div id="addressbar" class="ab"><ul>';
        $path = explode('/',$path);
        array_splice($path,-1);
        $dir = '';
        foreach ($path as $p){
            echo "
            <li>
                <a class='dirAddress' href='#' path='$dir$p/'><span>$p</span><div class='block''></div></a>
            </li>";
            $dir .= $p.'/';
        }
    echo '</ul></div>';
        echo "<div class='cleared'></div>";
    }

} 