<?php

function editButton($controllerName, $produto_id) {
    return  '<a href="'.base_url() . $controllerName.'/create/'.$produto_id.'" class="btn btn-default" style="width: 42px;"><i class="fas fa-edit"></i></a>';
}

function deleteButton($produto_id) {
    return  '<button type="button" class="btn btn-default btn-excluir" id="'.$produto_id.'" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i></button>';
}