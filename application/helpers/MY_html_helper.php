<?php

function pdfButton($controllerName, $id)
{
    return  '<a href="' . base_url() . $controllerName . '/pdf/' . $id . '" class="btn btn-default" style="width: 42px;" target="_blank"><i class="fas fa-file-pdf"></i></a>';
}

function editButton($controllerName, $id)
{
    return  '<a href="' . base_url() . $controllerName . '/create/' . $id . '" class="btn btn-default" style="width: 42px;"><i class="fas fa-edit"></i></a>';
}

function deleteButton($id)
{
    return  '<button type="button" class="btn btn-default btn-excluir" id="' . $id . '" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i></button>';
}

function addInput($col, $label, $name, $value, $required = '', $type = 'text')
{
    return '
    <div class="col-sm-' . $col . '">
        <div class="form-group">
            <label class="' . $required . '">' . $label . '</label>
            <input type="' . $type . '" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '/>
        </div>
    </div>
  ';
}
