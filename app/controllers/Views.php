<?php

class Views extends Control
{

  public function inicio()
  {
    $datos = [
      "title" => "Inicio"
    ];
    $this->load_view('inicio', $datos);
  }

  public function update($id)
  {
     if(empty($id)){
            exit("No se estableció el parametro 'id'");
        }else{
            echo $id[2];
        }
  }

}
