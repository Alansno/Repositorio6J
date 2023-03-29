<?php

class Archivos{

    public function guardarArchivo($tipo_archivo,$repoDoc){
        if (strpos($tipo_archivo, "pdf")) {
            $tmp_doc=$_FILES['archivo']['tmp_name'];
            if ($tmp_doc!="") {
                move_uploaded_file($tmp_doc,"../multimedios/documentos/".$repoDoc->getArchivo());
            }
        }

        elseif (strpos($tipo_archivo, "jpeg") or strpos($tipo_archivo, "png")) {
            $tmp_img=$_FILES['archivo']['tmp_name'];
            if ($tmp_img!="") {
                move_uploaded_file($tmp_img,"../multimedios/fotos/".$repoDoc->getArchivo());
            }
        }

        else {
            if (strpos($tipo_archivo, "mp4") or strpos($tipo_archivo, "mp3")) {
                $tmp_vid=$_FILES['archivo']['tmp_name'];
                if ($tmp_vid!="") {
                    move_uploaded_file($tmp_vid,"../multimedios/videos/".$repoDoc->getArchivo());
                }
            }
        }
    }

    public function editarArchivo($archivoEncontrado){
      if (strpos($archivoEncontrado, "pdf")) {
            if (file_exists("../multimedios/documentos/".$archivoEncontrado)) {
                unlink("../multimedios/documentos/".$archivoEncontrado);
            }
      }

      elseif (strpos($archivoEncontrado, "jpg") or strpos($archivoEncontrado, "png")) {
        if (file_exists("../multimedios/documentos/".$archivoEncontrado)) {
            unlink("../multimedios/documentos/".$archivoEncontrado);
        }
      }

      else {
        if (strpos($archivoEncontrado, "mp4") or strpos($archivoEncontrado, "mkv")) {
            if (file_exists("../multimedios/documentos/".$archivoEncontrado)) {
                unlink("../multimedios/documentos/".$archivoEncontrado);
            }
        }
      }
    }

}

?>